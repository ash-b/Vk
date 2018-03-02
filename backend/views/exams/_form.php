<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use trntv\filekit\widget\Upload;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Exams */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exams-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->widget(
                        \kuakling\keditor\TinyMce::className(), 
                    [
                        'enableFilemanager' => true,
                        'folderName' => ['file'=> 'File', 'image'=>'Image', 'media'=>'Media'],
                    ]
                );
    ?>
    
    
    <?php echo $form->field($model, 'images')->widget(
                  Upload::className(),
                  [
                    'url' => ['/file-storage/upload'],
                    'maxFileSize' => 5000000,
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                  ]);
    ?>
    <?php echo $form->field($model, 'pdf_file')->widget(
                  Upload::className(),
                  [
                    'url' => ['/file-storage/upload'],
                    'maxFileSize' => 5000000,
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(pdf)$/i'),
                  ]);
    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
