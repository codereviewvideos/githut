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
    public function githutAction($username)
    {
        return $this->render('githut/index.html.twig', [
            'username'   => $username,
        ]);
    }


    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profileAction($username, GitHubApi $api)
    {
        $profileData = $api->getProfile($username);

        return $this->render('githut/profile.html.twig', $profileData);
    }


    /**
     * @Route("/repos/{username}", name="repos")
     */
    public function reposAction($username, GitHubApi $api)
    {
        $repoData = $api->getRepos($username);

        return $this->render('githut/repos.html.twig', $repoData);
    }
}
