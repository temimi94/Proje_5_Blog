<?php

namespace App\Controller;


/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends MainController
{

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function defaultMethod()
    {
        return $this->twig->render('home.twig');
    }

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function sendMailMethod()
    {
        $twigPage = 'home.twig';
        $verif = $this->post->verifyPost();

        if ($verif !== true) {

            return $this->renderTwigErr($twigPage, $verif);
        }

        $post = $this->post->getPostArray();
    }

}