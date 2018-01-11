<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Branch */

$this->title = 'Create Branch';
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
