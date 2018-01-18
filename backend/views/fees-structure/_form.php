<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\FeesStructure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fees-structure-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'amount')->textInput() ?>
        <?php
            $value = '';
            $array = common\models\Caste::find()->where(['=', 'id', $model->caste_id])->one();
            if (!empty($array)) {
                $value[] =$array->id;
            }
            echo $form->field($model,'caste_id')->widget(Select2::classname(), [
                                                'value' => $value,
                                                'data' => ArrayHelper::map(\common\models\Caste::find()->where(['status'=>1])->all(), 'id', 'name'),
                                                'options' => ['placeholder' => 'Select Caste','id'=>'caste'],
                                                'pluginOptions' => [
                                                    'allowClear' => true,
                                                ]
                                            ]);

                  
        ?>
        <?= $form->field($model, 'status')->dropDownList(array(1 => "Yes", 0 => "No")) ?>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-12"></div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
