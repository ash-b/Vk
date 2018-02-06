<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CollegeHasBranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'College Has Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-has-branch-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?= Html::a('Create College Has Branch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute'=>'college_id',
              'filter' => Html::activeDropDownList($searchModel, 'college_id', ArrayHelper::map(\common\models\College::find()->where(['status'=>1])->all(), 'id', 'name'),['class'=>'form-control','prompt' => '']),
              'value'=> 'college.name'
            ],
            [
              'attribute'=>'branch_id',
              'filter' => Html::activeDropDownList($searchModel, 'branch_id', ArrayHelper::map(\common\models\College::find()->where(['status'=>1])->all(), 'id', 'name'),['class'=>'form-control','prompt' => '']),
              'value'=> 'branch.name'
            ],
            
            'intake',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
