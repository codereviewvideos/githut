<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller
{
    /**
     * @Route("/{username}", name="githut", defaults={ "username": "codereviewvideos" })
     */
    public function githutAction(Request $request, $username)
    {
        try {
            $this->get('github_api')->getRepos($username);
        } catch (\Exception $e) {

            $this->get('logger')->error('This does not appear to be a valid username on GitHub', [
                'username' => $username
            ]);
        }

        return $this->render('githut/index.html.twig', [
            'username'   => $username,
        ]);
    }


    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profileAction(Request $request, $username)
    {
        try {
            $profileData = $this->get('github_api')->getProfile($username);
        } catch (\Exception $e) {

            return $this->render('githut/no_profile.html.twig');
        }

        return $this->render('githut/profile.html.twig', $profileData);
    }


    /**
     * @Route("/repos/{username}", name="repos")
     */
    public function reposAction(Request $request, $username)
    {
        try {
            $repoData = $this->get('github_api')->getRepos($username);
        } catch (\Exception $e) {

            return $this->render('githut/no_repos.html.twig');
        }

        return $this->render('githut/repos.html.twig', $repoData);
    }
}