<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Universities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?php echo Html::a('Create University', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status ? 'Yes' : 'No';
                },
                'filter' => array(1 => "Yes", 0 => "No"),
            ],
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
