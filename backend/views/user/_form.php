<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">
        <div class="col-md-6">
        <?php echo $form->field($model, 'username') ?>
        <?php echo $form->field($model, 'email') ?>
        <?php echo $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-md-6">
        <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
        <?php echo $form->field($model, 'roles')->checkboxList($roles,['class'=>'well']) ?>
        </div>
        </div>
        <div class="form-group pull-right">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
