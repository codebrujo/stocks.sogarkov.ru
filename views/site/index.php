<?php

/* @var $this yii\web\View */

$this->title = 'Sergei Ogarkov';
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome!</h1>

        <p class="lead">This is Sergei Ogarkov's personal web-page.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>What is my job?</h2>

                <p>Software development is my main competency. Creating quality and powerful products is my credo.
                    My job is important part of my life and I enjoy it! More information
                    <?= Html::a('here', Url::to(['content/work'])); ?>.
                </p>

            </div>
            <div class="col-lg-4">
                <h2>Traveling</h2>

                <p>New places, new meets, new expressions give us an opportunity to look at yourself from different side,
                    open a new view on our life and values. Some my personal discoveries are <?= Html::a('here', Url::to(['content/traveling'])); ?>.

                </p>

            </div>
            <div class="col-lg-4">
                <h2>Thoughts</h2>

                <p>People and life occasions force us to scrutinize ourselves, find a reason of our success and failures.
                Why sometimes we are lucky and sometimes not? Why sometimes our relations gives so much pain or happy?
                    Some thoughts and findings <?= Html::a('here', Url::to(['content/thoughts'])); ?>.
                </p>

            </div>
        </div>

    </div>
</div>
