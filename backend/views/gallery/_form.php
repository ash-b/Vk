<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use trntv\filekit\widget\Upload;
/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'attachments')->widget(
                Upload::className(),
                [
                'url' => ['/file-storage/upload'],
                'sortable' => true,
                'maxFileSize' => 10000000,
                'maxNumberOfFiles' => 10
                ]);
            ?>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>    
    <?php ActiveForm::end(); ?>

</div>
