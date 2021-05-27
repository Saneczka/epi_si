<?php
/**
 * Album controller.
 */

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AlbumController.
 *
 * @Route("/album")
 */
class AlbumController extends AbstractController
{
    /**
     * Index action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request        HTTP request
     * @param \App\Repository\AlbumRepository            $albumRepository Album repository
     * @param \Knp\Component\Pager\PaginatorInterface   $paginator      Paginator
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     name="album_index",
     * )
     */
    public function index(Request $request, AlbumRepository $albumRepository, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $albumRepository->queryAll(),
            $request->query->getInt('page', 1),
            AlbumRepository::PAGINATOR_ITEMS_PER_PAGE
        );

        return $this->render(
            'album/index.html.twig',
            ['pagination' => $pagination]
        );
    }

    /**
     * Show action.
     *
     * @param \App\Entity\Album $album Album entity
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