<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\University;
use common\models\City;
use trntv\filekit\widget\Upload;
/* @var $this yii\web\View */
/* @var $model common\models\College */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="college-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12">
    <div class="col-md-6">
    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'picture')->widget(
      Upload::className(),
      [
      'url' => ['/file-storage/upload'],
      'maxFileSize' => 5000000, 
      ]);
     ?>

       <?php echo $form->field($model, 'attachments')->widget(
        Upload::className(),
        [
        'url' => ['/file-storage/upload'],
        'sortable' => true,
        'maxFileSize' => 10000000,
        'maxNumberOfFiles' => 5
        ]);
        ?>


    <?= $form->field($model, 'status')->dropDownList(array(1 => "Yes", 0 => "No")) ?>
    </div>
    
    <div class="col-md-6">
    <?php echo $form->field($model, 'address')->textarea(['rows' => 2]) ?>
    
    <?php echo $form->field($model, 'dte_code')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'college_type')->dropDownList(array('Private' => "Private", 'Government' => "Government",'Autonomous'=>'Autonomous')) ?>


    <?= $form->field($model, 'university_id')->dropDownList(
      ArrayHelper::map(University::find()->where(['status'=>1])->all(), 'id', 'name'), 
      ['prompt'=>'--Select University--','class' => 'form-control']);
      ?>

       <?= $form->field($model, 'city_id')->dropDownList(
      ArrayHelper::map(City::find()->where(['status'=>1])->all(), 'id', 'name'), 
      ['prompt'=>'--Select City--','class' => 'form-control']);
      ?>


    
    </div>
    </div>


<div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
