<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="college-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'description') ?>

    <?php echo $form->field($model, 'address') ?>

    <?php echo $form->field($model, 'image_path') ?>

    <?php // echo $form->field($model, 'image_base_url') ?>

    <?php // echo $form->field($model, 'dte_code') ?>

    <?php // echo $form->field($model, 'college_type') ?>

    <?php // echo $form->field($model, 'university_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>