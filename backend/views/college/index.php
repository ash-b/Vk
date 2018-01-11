<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\models\University;
use common\models\City;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CollegeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colleges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-index">

    <p class="text-right">
        <?php echo Html::a('Create College', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'college_type',
                'value' => function ($model) {
                    return $model->college_type;
                },
                'filter' => array('Private' => "Private", 'Government' => "Government",'Autonomous'=>'Autonomous'),
            ],
            [
              'attribute'=>'university_id',
              'filter' => Html::activeDropDownList($searchModel, 'university_id', ArrayHelper::map(University::find()->where(['status'=>1])->all(), 'id', 'name'),['class'=>'form-control','prompt' => '']),
              'value'=> 'university.name'
            ],
            [
              'attribute'=>'city_id',
              'filter' => Html::activeDropDownList($searchModel, 'city_id', ArrayHelper::map(City::find()->where(['status'=>1])->all(), 'id', 'name'),['class'=>'form-control','prompt' => '']),
              'value'=> 'city.name'
            ],
        

        'address:ntext',
        'dte_code',
        'college_type',

        ['class' => 'yii\grid\ActionColumn'],
    ],
    ]); ?>

</div>
