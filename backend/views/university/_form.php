<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;
use trntv\filekit\widget\Upload;


/* @var $this yii\web\View */
/* @var $model common\models\University */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="university-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-12">
    <div class="col-md-6">
    <?php echo $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(array(1 => "Yes", 0 => "No")) ?>
    
    <?php echo $form->field($model, 'picture')->widget(
      Upload::className(),
      [
      'url' => ['/file-storage/upload'],
      'maxFileSize' => 5000000, 
      ]);
     ?>

    </div>
    <div class="col-md-6"></div>

    </div>


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
