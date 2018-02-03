<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StreamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Streams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stream-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="text-right">
        <?= Html::a('Create Stream', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            [
                'attribute' => 'status',
                'filter' => array(1 => "Yes", 0 => "No"),
                'value' => function ($model) {
                    return $model->status ? 'Yes' : 'No';
                },
            ],
            [
                'attribute' => 'parent_stream',
                'filter' => ArrayHelper::map(\common\models\Stream::find()->where(['parent_stream'=>0])->all(), 'id', 'name'),
                'value' => function ($model) {
                    $stream=\common\models\Stream::find()->where(['id'=>$model->parent_stream])->one();
                    if(!empty($stream)){
                        $name=$stream->name;
                    }else{
                        $name="";
                    }
                    return $name;
                },
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
