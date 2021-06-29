<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.07.2018
 * Time: 18:28
 */

namespace app\controllers;


use app\models\tables\Articles;
use app\models\tables\Categories;
use yii\web\Controller;

class ContentController extends Controller
{
    public function actionWork($category_id = 0, $article_id=0)
    {
        $categories = Categories::getByChapterID(1);
        $currentCategory = new Categories();

        if ($category_id>0){
            $currentCategory = Categories::findOne($category_id);
        }

        $currentArticle = null;

        if ($article_id>0){
            $currentArticle = Articles::findOne($article_id);
        }

        $articles = [];
        if (!is_null($currentCategory)){
            $articles = Articles::getByCategory($currentCategory->id);
        }


        return $this->render('workindex',
            [
                'categories' => $categories,
                'currentCategory' => $currentCategory,
                'articles' => $articles,
                'currentArticle' => $currentArticle,
            ]
        );
    }

}