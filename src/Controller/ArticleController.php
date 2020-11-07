<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleFormType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="new_article")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleFormType::class , $article );
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $formInfo = $form->getData();
            $formInfo->setCreatedOn(new DateTime());
            $formInfo->setStatus(Article::STATUS_PENDING);
            $formInfo->setLastAction(Article::ACTION_CREATED);
            $formInfo->setLastActionDate(new DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($formInfo);
            $em->flush();

            return $this->render('article_created.twig');
        }


        return $this->render('new_article.twig', [
            'form' => $form->createView()
        ]);
    }
}
