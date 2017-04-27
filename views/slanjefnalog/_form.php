<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Sifarnik;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Slanjefnalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slanjefnalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_entel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dmn_nivo_zastita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dmn_cuvaj_dana')->textInput() ?>

    <?= $form->field($model, 'napomena')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datvrem_mejl')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
        'ajaxConversion'=>false,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]); ?>
    
    <?= $form->field($model, 'dmn_zemlja')->dropDownList(
            ArrayHelper::map(Sifarnik::find()->all(), 'domen1', 'vrednost'),
            ['prompt'=>'Izaberi zemlju'])
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
