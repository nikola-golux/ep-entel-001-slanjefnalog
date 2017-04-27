<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PracenjeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pracenje-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kada') ?>

    <?= $form->field($model, 'odakle') ?>

    <?= $form->field($model, 'paket') ?>

    <?= $form->field($model, 'tabela') ?>

    <?php // echo $form->field($model, 'id_tabele') ?>

    <?php // echo $form->field($model, 'doznaka') ?>

    <?php // echo $form->field($model, 'ko') ?>

    <?php // echo $form->field($model, 'operacija') ?>

    <?php // echo $form->field($model, 'rez_operacije') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
