<?php

namespace AppBundle\Controller;

use AppBundle\Service\GitHubApi;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GitHutController extends Controller
{
    /**
     * @Route("/{username}", name="githut", defaults={ "username": "codereviewvideos" })
     */
    public function githutAction($username, GitHubApi $api)
    {
        $api->getRepos($username);

        return $this->render('githut/index.html.twig', [
            'username'   => $username,
        ]);
    }


    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profileAction($username)
    {
        $profileData = $this->get('github_api')->getProfile($username);

        return $this->render('githut/profile.html.twig', $profileData);
    }


    /**
     * @Route("/repos/{username}", name="repos")
     */
    public function reposAction($username)
    {
        $repoData = $this->get('github_api')->getRepos($username);

        return $this->render('githut/repos.html.twig', $repoData);
    }
}
