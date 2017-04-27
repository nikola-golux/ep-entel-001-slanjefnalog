<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pracenje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pracenje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kada')->textInput() ?>

    <?= $form->field($model, 'odakle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tabela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tabele')->textInput() ?>

    <?= $form->field($model, 'doznaka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ko')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operacija')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rez_operacije')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
