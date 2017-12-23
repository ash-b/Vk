<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */
$this->title = Yii::t('backend', 'Edit account')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
    <div class="col-md-6">
    	
    <?php echo $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'email') ?>
    </div>
    <div class="col-md-6">
    <?php echo $form->field($model, 'password')->passwordInput() ?>

    <?php echo $form->field($model, 'password_confirm')->passwordInput() ?>
    	
    </div>
    </div>



    <div class="form-group pull-right">
        <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
