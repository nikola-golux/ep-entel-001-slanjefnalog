<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Slanjefnalog */

$this->title = 'Kreiranje naloga';
$this->params['breadcrumbs'][] = ['label' => 'Slanjefnalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slanjefnalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_fajlovi' => $model_fajlovi,
    ]) ?>

</div>
