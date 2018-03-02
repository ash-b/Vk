<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Exams */

$this->title = 'Create Exams';
$this->params['breadcrumbs'][] = ['label' => 'Exams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exams-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
