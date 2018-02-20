<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:01 PM
 */
namespace frontend\controllers;

use common\models\Stream;
use common\models\College;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class StreamController extends Controller
{
    public function actionIndex()
    {
        if(isset($_GET['id'])){
            $stream_id=$_GET['id'];
            $colleges = College::find()->where(['substream_id' => $stream_id, 'status' => 1])->orWhere(['stream_id'=>$stream_id,'status' => 1])->all();
            $stream=Stream::find()->where(['id'=>$stream_id])->one();
            $streams=Stream::find()->where(['status'=>1])->all();
            return $this->render('view', ['colleges' => $colleges,'stream'=>$stream,'streams'=>$streams]);
        }
    }
}
