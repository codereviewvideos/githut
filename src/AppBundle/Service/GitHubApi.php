<?php

namespace AppBundle\Service;

class GitHubApi
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    public function getProfile($username)
    {
        $data = $this->httpClient->get('https://api.github.com/users/' . $username);

        return [
            'avatar_url'  => $data['avatar_url'],
            'name'        => $data['name'],
            'login'       => $data['login'],
            'details'     => [
                'company'   => $data['company'],
                'location'  => $data['location'],
                'joined_on' => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y'),
            ],
            'blog'        => $data['blog'],
            'social_data' => [
                "Public Repos" => $data['public_repos'],
                "Followers"    => $data['followers'],
                "Following"    => $data['following'],
            ]
        ];
    }


    public function getRepos($username)
    {
        $data = $this->httpClient->get('https://api.github.com/users/' . $username . '/repos');

        return [
            'repo_count' => count($data),
            'most_stars' => array_reduce($data, function ($mostStars, $currentRepo) {
                return $currentRepo['stargazers_count'] > $mostStars ? $currentRepo['stargazers_count'] : $mostStars;
            }, 0),
            'repos' => $data
        ];
    }

}