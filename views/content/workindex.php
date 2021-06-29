<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.07.2018
 * Time: 20:22
 */
/** @var \yii\web\View $this */
/** @var array $categories */
/** @var array $articles */
/** @var \app\models\tables\Categories $currentCategory */
/** @var \app\models\tables\Articles $currentArticle */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Work';
if (is_null($currentCategory)){
    $this->params['breadcrumbs'][] = $this->title;
}else{
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['work']];
    $this->params['breadcrumbs'][] = $currentCategory->name;
}


$this->registerCssFile('../css/style.css',  ['position' => yii\web\View::POS_BEGIN]);
$this->registerJsFile('../js/typed.min.js',  ['position' => yii\web\View::POS_END]);
$this->registerJsFile('../js/page.js',  ['position' => yii\web\View::POS_END]);


?>

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="list-group">
                <?php foreach ($categories as $category): ?>
                    <? $className = $category->id==$currentCategory->id ? 'list-group-item active' : 'list-group-item'; ?>
                    <?= Html::a($category->name,
                        Url::to(['work', 'category_id' => $category->id])
                        , ['class' => $className])
                    ; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>
            <?php if (is_null($currentArticle)){ ?>
                <?php if (is_null($currentCategory->id)){ ?>
                    <div class="type-wrap-container">
                        <div class="type-wrap iwindow">
                            <span id="typed6" style="white-space:pre;"></span>
                        </div>
                    </div>
                    <h3>О разделе</h3>
                    <p>
                        На протяжении последних двух десятков лет я занимаюсь руководством проектами, постановкой задач,
                        проектированием архитектуры и разработкой информационных систем в
                        области финансов, HR, логистики и автотранспорта. Непрерывно совершенствуя свои навыки в области IT
                        с 1999 года, мною были внедрены десятки крупных и средних решений собственной разработки, продуктов, разработанных командой под моим руководством, а также решений сторонних производителей.
                        Вспомогательным результатом работы с платформой 1С стало глубокое изучение особенностей взаимодействия информационных систем и СУБД.
                        Это дало возможность разрабатывать подходы и реализовывать низкоуровневые технологии, значительно повышающие производительность приложений.
                        Начиная с 2014 года веду разработку приложений на JAVA, а с 2015 года начал работу со стеком web-технологий.
                        Для кого-то такое заявление может показаться удивительным, но именно работа с бизнес-заказчиками и необходимость решать
                        самые разнообразные бизнес-задачи с использованием платформы 1С, подтолкнули меня к изучению как JAVA так и Web-стека. Увы, универсальных решений нет,
                        попытки вендора закрыть все возможные направления в одной среде 1С, привели к созданию громоздких, неповоротливых и дорогостоящих типовых решений,
                        внедрения которых в некоторых случаях заканчиваются неудачей либо стоят существенных операционных затрат в поддержке.
                        Каждая технологическая среда должна решать свои задачи, а опытный менеджер проектов должен знать и уместно использовать каждую из них.
                    </p>
                    <p>Накопив за прошедшие годы огромный багаж знаний в области технологий внедрения, разработки и управления, я посвящаю этот сайт систематизации своего опыта,
                        сгруппировав его по направлениям и оформив в виде историй наиболее интересных внедрений.
                        Учитывая этическую сторону взаимоотношений в компаниях, я постарался не использовать реальные имена участников.</p>
                <?php } ?>
            <div class="row">
                <?php foreach ($articles as $article): ?>
                <?= $this->render(
                    '_articleCard.php',
                    ['article' => $article]
                )
                ?>
                <?php endforeach; ?>
            </div>
            <?php }else{ ?>
                <?= $this->render(
                    'article.php',
                    ['article' => $currentArticle]
                );
            }?>
        </div>
    </div>
    <hr>
</div>



