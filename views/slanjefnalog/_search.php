<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SlanjefnalogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slanjefnalog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dmn_zemlja') ?>

    <?= $form->field($model, 'id_entel') ?>

    <?= $form->field($model, 'dmn_nivo_zastita') ?>

    <?= $form->field($model, 'dmn_cuvaj_dana') ?>

    <?php // echo $form->field($model, 'napomena') ?>

    <?php // echo $form->field($model, 'datvrem_mejl') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
