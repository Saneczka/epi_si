<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\Image;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AlbumController.
 *
 * @Route("/image", name="image")
 */
class ImageController extends AbstractController
{
    /**
     * Index action.
     *
     * @param \App\Repository\ImageRepository $imageRepository Task repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="task_index",
     * )
     */
    public function index(ImageRepository $imageRepository): Response
    {
        return $this->render(
            'image/index.html.twig',
            ['image' => $imageRepository->findAll()]
        );
    }

    /**
     * Show action.
     *
     * @param \App\Entity\Image $image Task entity
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
    public function show(Image $image): Response
    {
        return $this->render(
            'image/show.html.twig',
            ['image' => $image]
        );
    }
}