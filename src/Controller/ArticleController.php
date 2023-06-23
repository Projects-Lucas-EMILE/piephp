<?php

namespace Controller;

use Core\Controller;
use Model\ArticleModel;

class ArticleController extends Controller
{
    public function articlesAction()
    {
        $articleModel = new ArticleModel();
        $result = $articleModel->findAll([]);
        $this->render('articles', ['articles' => $result]);
    }
}
