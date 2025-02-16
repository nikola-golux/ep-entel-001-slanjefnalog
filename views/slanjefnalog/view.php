<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Slanjefnalog */

//$this->title = $model->id;
$this->title = "Pregled naloga";
$this->params['breadcrumbs'][] = ['label' => 'Slanjefnalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slanjefnalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'dmn_zemlja',
            'id_entel',
            'dmn_nivo_zastita',
            'dmn_cuvaj_dana',
            'napomena',
            'datvrem_mejl',
        ],
    ]) ?>
    <p>
        <?= Html::a('Posalji email', ['sendemail', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>


</div>
