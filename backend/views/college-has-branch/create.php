<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CollegeHasBranch */

$this->title = 'Create College Has Branch';
$this->params['breadcrumbs'][] = ['label' => 'College Has Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-has-branch-create">

    <h1><?=Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
