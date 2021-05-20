<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\ImageType;
use App\Repository\ImageTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AlbumController.
 *
 * @Route("/imagetype", name="imagetype")
 */
class ImageTypeController extends AbstractController
{
    /**
     * Index action.
     *
     * @param \App\Repository\ImageTypeRepository $imagetypeRepository Task repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="task_index",
     * )
     */
    public function index(ImageTypeRepository $imagetypeRepository): Response
    {
        return $this->render(
            'imagetype/index.html.twig',
            ['imagetype' => $imagetypeRepository->findAll()]
        );
    }

    /**
     * Show action.
     *
     * @param \App\Entity\ImageType $imagetype Task entity
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
    public function show(ImageType $imagetype): Response
    {
        return $this->render(
            'imagetype/show.html.twig',
            ['imagetype' => $imagetype]
        );
    }
}