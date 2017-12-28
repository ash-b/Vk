<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Stream */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stream-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
    <div class="col-md-6">
        
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(array(1 => "Yes", 0 => "No")) ?>
    </div>
    <div class="col-md-6">
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
