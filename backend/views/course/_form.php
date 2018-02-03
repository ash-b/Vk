<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
        <div class="col-md-6">
            <?php // echo $form->errorSummary($model); ?>

            <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?php echo $form->field($model, 'status')->dropDownList([1 => "Yes", 2 => "No"],['prompt'=>'Select Status'])?>

            <?php //echo $form->field($model, 'created_at')->textInput() ?>

            <?php //echo $form->field($model, 'updated_at')->textInput() ?>
        </div>
        <div class="col-md-6">
            <label class="control-label" for="business-category">Category*</label>
            <?php 

                $value = '';
                $feesarray = common\models\CourseHasFees::find()->where(['=', 'course_id', $model->id])->all();
                if(!empty($feesarray)){
                    foreach($feesarray as $fa) {
                        $fees= \common\models\FeesStructure::find()->andWhere(['id'=>$fa->fees_id])->one();
                        if (!empty($fees)) {
                            $value[] = $fees->id;
                        }
                    }
                }

            ?>
            <div class="">        
                <?php echo Select2::widget([
                  'name' => "fees_structure",
                  'value' => $value,
                  'data' => ArrayHelper::map(\common\models\FeesStructure::find()->where(['status'=>1])->all(), 'id', 'amount'),
                  'options' => ['multiple' => true    , 'placeholder' => 'Select Fees Structure','id'=>'fees-id'],
                  'pluginOptions' => ['allowClear' => true],
              ]);
              ?>
              <br>
          </div>
        </div>
    </div>    
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
