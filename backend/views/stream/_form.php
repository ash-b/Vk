<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

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

    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'status')->dropDownList(array(1 => "Yes", 0 => "No")) ?>

        <?php   
            $streams= \common\models\Stream::find()->where(['parent_stream'=>0])->all();
            foreach ($streams as $stream){
                $data[$stream->id]=$stream->name;
            }
            echo $form->field($model, 'parent_stream')->widget(Select2::classname(), [
                'data' => $data,
                'language' => 'de',
                'options' => ['placeholder' => 'Select Stream'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
        ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
