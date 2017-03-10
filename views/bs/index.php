<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $deviceList array pk=>value (array of all devices) */

$this->title = 'Bs';
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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute'=>'dev_id',
                'value'=>'devicename.dev',
                'filter'=>$deviceList
            ],
            [
                'attribute'=>'ant_id', // соответствие
                'value'=>'antennaname.name', // вместо ant_id использовать имя (name), которое можно получить функцией getantennaname
                'filter'=>$antennaList // задаем фильтр списком всех антенн (получено из контроллера)
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update} {delete}']
        ],
    ]); ?>
</div>
