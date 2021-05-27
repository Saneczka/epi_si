<?php
/**
 * Image controller.
 */

namespace App\Controller;

use App\Entity\Image;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ImageController.
 *
 * @Route("/image")
 */
class ImageController extends AbstractController
{
    /**
     * Index action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request        HTTP request
     * @param \App\Repository\AlbumRepository            $imageRepository Image repository
     * @param \Knp\Component\Pager\PaginatorInterface   $paginator      Paginator
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     name="image_index",
     * )
     */
    public function index(Request $request, ImageRepository $imageRepository, PaginatorInterface $paginator): Response
{
    $pagination = $paginator->paginate(
        $imageRepository->queryAll(),
        $request->query->getInt('page', 1),
        ImageRepository::PAGINATOR_ITEMS_PER_PAGE
    );

    return $this->render(
        'image/index.html.twig',
        ['pagination' => $pagination]
    );
}

    /**
     * Show action.
     *
     * @param \App\Entity\Image $image Image entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="image_show",
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