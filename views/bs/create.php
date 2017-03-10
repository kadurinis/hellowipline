<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bs */

$this->title = 'Создание БС';
$this->params['breadcrumbs'][] = ['label' => 'Bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'deviceList' => $deviceList,
        'antennaList'=> $antennaList
    ]) ?>

</div>
