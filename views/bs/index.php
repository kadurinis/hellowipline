<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $deviceList array pk=>value (array of all devices) */

$this->title = 'Тестовое задание';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'export' => false,
        'columns' => [
            'name',
            [
                'attribute' => 'dev_id',
                'value' => function ($model) use ($deviceList) {
                    return ArrayHelper::getValue($deviceList, $model->dev_id);
                },
                'filter' => $deviceList
            ],
            [
                'attribute' => 'ant_id', // соответствие
                // вместо ant_id использовать имя (name), которое можно получить функцией getantennaname
                'value' => function ($model) use ($antennaList) {
                    return ArrayHelper::getValue($antennaList, $model->ant_id);
                },
                'filter' => $antennaList // задаем фильтр списком всех антенн (получено из контроллера)
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}']
        ],
    ]); ?>
</div>
