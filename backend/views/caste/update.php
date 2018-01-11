<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Caste */

$this->title = 'Update Caste: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Castes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caste-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
