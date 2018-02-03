<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
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


            <?= $form->field($model,'status')->widget(Select2::classname(), [
                    'data' => array(1 => "Yes", 0 => "No"),
                    'options' => ['placeholder' => 'Select Status','id'=>'status-id'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]);
            ?>
        </div>

        <div class="col-md-6">
            <?php echo $form->field($model, 'address')->textarea(['rows' => 2]) ?>

            <?php echo $form->field($model, 'dte_code')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model,'college_type')->widget(Select2::classname(), [
                    'data' => array('Private' => "Private", 'Government' => "Government",'Autonomous'=>'Autonomous'),
                    'options' => ['placeholder' => 'Select College Type','id'=>'college_type-id'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]);
            ?>
            <?php  //$form->field($model, 'college_type')->dropDownList(array('Private' => "Private", 'Government' => "Government",'Autonomous'=>'Autonomous')) ?>

            <?= $form->field($model,'university_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(University::find()->where(['status'=>1])->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select University'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]);
            ?>     
            <?php /* $form->field($model, 'university_id')->dropDownList(
              ArrayHelper::map(University::find()->where(['status'=>1])->all(), 'id', 'name'), 
              ['prompt'=>'--Select University--','class' => 'form-control']); */
            ?>
            <?= $form->field($model,'city_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(City::find()->where(['status'=>1])->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select City'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]);
            ?>    
            <?php  /* $form->field($model, 'city_id')->dropDownList(
              ArrayHelper::map(City::find()->where(['status'=>1])->all(), 'id', 'name'), 
              ['prompt'=>'--Select City--','class' => 'form-control']); */
            ?>
            <label class="control-label" for="gallery">Gallery</label>
            <?php 
                $value = '';
                $galleryarray = \common\models\CollegeHasGallery::find()->where(['=', 'college_id', $model->id])->all();
                if(!empty($galleryarray)){
                    foreach($galleryarray as $ga) {
                        $gallery= \common\models\Gallery::find()->where(['id'=>$ga->gallery_id])->one();
                        if (!empty($gallery)) {
                            $value[] = $gallery->id;
                        }
                    }
                }
            ?>
            <div class="">        
                <?php echo Select2::widget([
                  'name' => "gallery",
                  'value' => $value,
                  'data' => ArrayHelper::map(\common\models\Gallery::find()->all(), 'id', 'name'),
                  'options' => ['multiple' => true , 'placeholder' => 'Select Gallery','id'=>'gallery-id'],
                  'pluginOptions' => ['allowClear' => true],
              ]);
              ?>
              <br>
            </div>
            <?= $form->field($model,'stream_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(common\models\Stream::find()->where(['status'=>1])->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select Stream'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]);
            ?>
        </div>
    </div>


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
