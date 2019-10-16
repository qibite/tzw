<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Authors;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $list = ArrayHelper::map(Authors::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name'); ?>
    <?= $form->field($model, 'author_id')->dropDownList($list) ?>

    <?= $form->field($model, 'write_at')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
