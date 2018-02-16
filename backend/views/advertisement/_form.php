<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use trntv\filekit\widget\Upload;

/* @var $this yii\web\View */
/* @var $model common\models\Advertisement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertisement-form">
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        
        <?php echo $form->field($model, 'picture')->widget(
                  Upload::className(),
                  [
                  'url' => ['/file-storage/upload'],
                  'maxFileSize' => 5000000, 
                  ]);
        ?>
        
    </div>    
    <div class="col-md-6">
        <?php  echo  $form->field($model, 'from_date')->widget(\yii\jui\DatePicker::classname(), [
                                            'options' => ['class'=>'form-control datepicker','id'=>'from_date'],
                                            'dateFormat' =>'yyyy-MM-dd',
                                ]);
        ?>
        <?php  echo  $form->field($model, 'to_date')->widget(\yii\jui\DatePicker::classname(), [
                                            'options' => ['class'=>'form-control datepicker','id'=>'to_date'],
                                            'dateFormat' =>'yyyy-MM-dd',
                                ]);
        ?>
        <?= $form->field($model, 'status')->dropDownList(array(1 => "Yes", 0 => "No")) ?>
        <?php // $form->field($model, 'to_date')->textInput() ?>

        
    </div>
    
    <?php // $form->field($model, 'position')->textInput() ?>

    <?php // $form->field($model, 'is_mobile')->textInput() ?>

    <?php // $form->field($model, 'order_no')->textInput() ?>
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $(document).ready(function() {
        $(".datepicker" ).datepicker({
            //dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: '1947:' + year,

        });
    });    
</script>