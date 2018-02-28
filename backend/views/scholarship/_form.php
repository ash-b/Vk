<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
/* @var $this yii\web\View */
/* @var $model common\models\Scholarship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scholarship-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
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
                    ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
