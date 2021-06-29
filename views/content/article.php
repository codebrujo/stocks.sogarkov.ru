<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.09.2018
 * Time: 22:18
 */
/** @var \yii\web\View $this */
/** @var \app\models\tables\Articles $article */

use yii\helpers\Html;
use yii\helpers\Url;

//http://bootstrap-3.ru/examples/blog/

?>
<div class="blog-post">
    <h2 class="blog-post-title"><?= Html::decode($article->name);?></h2>
    <p class="blog-post-meta">Date</p>

    <?= Html::decode($article->content);?>

</div>

