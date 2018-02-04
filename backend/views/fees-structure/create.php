<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FeesStructure */

$this->title = 'Create Fees Structure';
$this->params['breadcrumbs'][] = ['label' => 'Fees Structures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fees-structure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
