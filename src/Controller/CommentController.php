<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CommentController.
 *
 * @Route("/comment", name="comment")
 */
class CommentController extends AbstractController
{
    /**
     * Index action.
     *
     * @param \App\Repository\CommentRepository $commentRepository Task repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="task_index",
     * )
     */
    public function index(CommentRepository $commentRepository): Response
    {
        return $this->render(
            'comment/index.html.twig',
            ['comment' => $commentRepository->findAll()]
        );
    }

    /**
     * Show action.
     *
     * @param \App\Entity\Album $comment Task entity
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
    public function show(Comment $comment): Response
    {
        return $this->render(
            'comment/show.html.twig',
            ['comment' => $comment]
        );
    }
}