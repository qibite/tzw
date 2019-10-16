<?php

use yii\helpers\Html;
use yii\grid\GridView, yii\grid\DataColumn;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'author_id',
            [
                'attribute' => 'author_id',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->author->name;
                },
                'format' => 'raw',
            ],
            'write_at',
            'title',
            [
                'class' => DataColumn::class,
                'header' => 'book\'s author',
                'content' => function ($model)
                {
                    return Html::a('book\'s author', ['authors/index', 'AuthorsSearch[id]' => $model->author_id]);
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
