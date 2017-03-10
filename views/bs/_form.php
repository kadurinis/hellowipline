<?php
define('CREATE_COMMAND', 'Создать');
define('UPDATE_COMMAND', 'Обновить');
define('NAME_LABEL', 'Название');
define('DEVICE_LABEL', 'Оборудование');
define('ANTENNA_LABEL', 'Антенна');
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(NAME_LABEL)->hint('Например, Воронеж, Матросова, 2А') ?>

    <?= $form->field($model, 'dev_id')->dropDownList($deviceList, ['prompt'=>''])->label(DEVICE_LABEL) ?>

    <?= $form->field($model, 'ant_id')->dropDownList($antennaList, ['prompt'=>''])->label(ANTENNA_LABEL) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? CREATE_COMMAND : UPDATE_COMMAND, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
