<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Sifarnik;
use app\models\Entel;
use kartik\datecontrol\DateControl;


/* @var $this yii\web\View */
/* @var $model app\models\Slanjefnalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slanjefnalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dmn_zemlja')->dropDownList(
        ArrayHelper::map(Sifarnik::find()->where(['domen' => zemlja])->all(), 'domen1', 'vrednost'),
        ['prompt'=>'Izaberi zemlju']);
    ?>

    <?= $form->field($model, 'dmn_nivo_zastita')->dropDownList(
        ArrayHelper::map(Sifarnik::find()->where(['domen' => 'nivo_zastita'])->all(), 'vrednost', 'napomena'),
        ['prompt'=>'Nivo zastite']);
    ?>

    <?= $form->field($model, 'dmn_cuvaj_dana')->dropDownList(
        ArrayHelper::map(Sifarnik::find()->where(['domen' => 'cuvaj_dana'])->all(), 'vrednost', 'napomena'),
        ['prompt'=>'Izaberite koliko dana treba da se cuva fajl']);
    ?>

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

    <?= $form->field($model_fajlovi, 'ime_fajla')->fileInput(['maxlength' => 255]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
