<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Caste */

$this->title = 'Create Caste';
$this->params['breadcrumbs'][] = ['label' => 'Castes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caste-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
