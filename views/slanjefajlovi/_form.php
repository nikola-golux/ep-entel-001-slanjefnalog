<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Slanjefajlovi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slanjefajlovi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_slanjefnalog')->textInput() ?>

    <?= $form->field($model, 'ime_fajla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mesto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'size_MB')->textInput() ?>

    <?= $form->field($model, 'datvrem')->textInput() ?>

    <?= $form->field($model, 'datvrem_del')->textInput() ?>

    <?= $form->field($model, 'file_route')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
