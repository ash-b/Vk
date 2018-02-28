<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Scholarship */

$this->title = 'Update Scholarship: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Scholarships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scholarship-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
