<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PracenjeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pracenjes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pracenje-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pracenje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kada',
            'odakle',
            'paket',
            'tabela',
            // 'id_tabele',
            // 'doznaka',
            // 'ko',
            // 'operacija',
            // 'rez_operacije',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
