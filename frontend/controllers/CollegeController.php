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

class CollegeController extends Controller
{
    public function actionIndex()
    {
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $college = College::find()->where(['id' => $id, 'status' => 1])->one();
            $college_attachments= \common\models\CollegeAttachment::find()->where(['college_id'=>$college->id])->all();
            $streams=Stream::find()->where(['status'=>1])->andWhere(['parent_stream'=>0])->all();
            return $this->render('view', ['college' => $college,'college_attachments'=>$college_attachments,'streams'=>$streams]);
        }
    }
}
