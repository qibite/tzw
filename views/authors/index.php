<?php

use yii\helpers\Html;
use yii\grid\GridView, yii\grid\DataColumn;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Authors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'birth',
            [
                'class' => DataColumn::class,
                'header' => 'author\'s books',
                'content' => function ($model)
                {
                    return Html::a('author\'s books', ['books/index', 'BooksSearch[author_id]' => $model->id]);
                },
                'contentOptions' => [
                    'class' => 'id-add',
                ],
                'encodeLabel' => true,
                'enableSorting' => true,
            ],
            'rate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
