<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Slanjefnalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slanjefnalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dmn_zemlja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_entel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dmn_nivo_zastita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dmn_cuvaj_dana')->textInput() ?>

    <?= $form->field($model, 'napomena')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datvrem_mejl')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
