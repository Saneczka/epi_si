<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AlbumController.
 *
 * @Route("/album", name="album")
 */
class AlbumController extends AbstractController
{
    /**
     * Index action.
     *
     * @param \App\Repository\AlbumRepository $albumRepository Task repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="task_index",
     * )
     */
    public function index(AlbumRepository $albumRepository): Response
    {
        return $this->render(
            'album/index.html.twig',
            ['album' => $albumRepository->findAll()]
        );
    }

    /**
     * Show action.
     *
     * @param \App\Entity\Album $album Task entity
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
    public function show(Album $album): Response
    {
        return $this->render(
            'album/show.html.twig',
            ['album' => $album]
        );
    }
}