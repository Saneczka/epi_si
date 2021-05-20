<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\UserData;
use App\Repository\UserDataRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController.
 *
 * @Route("/userdata", name="userdata")
 */
class UserDataController extends AbstractController
{
    /**
     * Index action.
     *
     * @param \App\Repository\UserDataRepository $userdataRepository Task repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="task_index",
     * )
     */
    public function index(UserDataRepository $userdataRepository): Response
    {
        return $this->render(
            'userdata/index.html.twig',
            ['userdata' => $userdataRepository->findAll()]
        );
    }

    /**
     * Show action.
     *
     * @param \App\Entity\Album $userdata Task entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="album_show",
     *     requirements={"id": "[1-9]\d*"},
     * )
     */
    public function show(UserData $userdata): Response
    {
        return $this->render(
            'userdata/show.html.twig',
            ['userdata' => $userdata]
        );
    }
}