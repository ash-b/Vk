<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FeesStructureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fees Structures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fees-structure-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?= Html::a('Create Fees Structure', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'amount',
            [
                'attribute' => 'caste_id',
                'filter' => ArrayHelper::map(\common\models\Caste::find()->all(), 'id', 'name'),
                'value' => function ($model) {
                    $caste= \common\models\Caste::find()->where(['id'=>$model->caste_id])->one();
                    if(!empty($caste)){
                        $name=$caste->name;
                    }else{
                        $name="";
                    }
                    return $name;
                },
            ],
            [
                'attribute' => 'branch_id',
                'filter' => ArrayHelper::map(\common\models\Branch::find()->all(), 'id', 'name'),
                'value' => function ($model) {
                    $branch= \common\models\Branch::find()->where(['id'=>$model->branch_id])->one();
                    if(!empty($branch)){
                        $name=$branch->name;
                    }else{
                        $name="";
                    }
                    return $name;
                },
            ],
            [
                'attribute' => 'college_id',
                'filter' => ArrayHelper::map(\common\models\College::find()->all(), 'id', 'name'),
                'value' => function ($model) {
                    $college= \common\models\College::find()->where(['id'=>$model->college_id])->one();
                    if(!empty($college)){
                        $name=$college->name;
                    }else{
                        $name="";
                    }
                    return $name;
                },
            ],
            [
                'attribute' => 'status',
                'filter' => array(1 => "Yes", 0 => "No"),
                'value' => function ($model) {
                    return $model->status ? 'Yes' : 'No';
                },
            ],
            //'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
