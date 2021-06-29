<?php
/**
  * User: Sergey
 * Date: 02.09.2018
 * Time: 20:56
 */
/** @var \yii\web\View $this */
/** @var \app\models\tables\Articles $article */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="col-6 col-sm-6 col-lg-4">
 <h2><?= Html::decode($article->name);?></h2>
 <p><?= Html::decode($article->short_descr);?></p>
 <p>
     <?= Html::a('Подробнее &raquo;',
         Url::to(['work', 'category_id' => $article->category_id, 'article_id' => $article->id])
         , ['class' => 'btn btn-default', 'role' => 'button'])
     ; ?>
 </p>
</div>

