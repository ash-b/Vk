<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\University */

$this->title = 'Update University: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="university-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
