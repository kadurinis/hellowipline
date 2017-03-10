<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bs */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bs-view">

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
            [
                'attribute'=>'name',
                'label'=>'Название',
                'value'=>$model->name
            ],
            [
                'attribute'=>'dev_id',
                'label'=>'Оборудование',
                'value'=>$model->devicename->dev
            ],
            [
                'attribute'=>'ant_id',
                'label'=>'Антенна',
                'value'=>$model->antennaname->name
            ]
        ],
    ]) ?>

</div>
