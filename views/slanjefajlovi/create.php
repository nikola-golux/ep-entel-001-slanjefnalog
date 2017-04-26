<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Slanjefajlovi */

$this->title = 'Create Slanjefajlovi';
$this->params['breadcrumbs'][] = ['label' => 'Slanjefajlovis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slanjefajlovi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
