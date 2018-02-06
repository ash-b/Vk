<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeHasBranch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="college-has-branch-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model,'college_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\College::find()->where(['status'=>1])->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select College','id'=>'college'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]);
            ?>
            <?= $form->field($model,'branch_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Branch::find()->where(['status'=>1])->all(), 'id', 'name'),
                    'options' => ['placeholder' => 'Select Branch','id'=>'branch'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ]
                ]);
            ?>
            <?= $form->field($model, 'intake')->textInput() ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
            </div>
        </div>
        <div class="col-md-6"></div>
        
    </div>


    <?php ActiveForm::end(); ?>

</div>
