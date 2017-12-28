<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;
/**
 * This is the model class for table "university".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $status
 * @property string $image_path
 * @property string $image_base_url
 * @property integer $created_at
 * @property integer $updated_at
 */
class University extends \yii\db\ActiveRecord
{

public $picture;
    public function behaviors()
    {
        return [
        'picture' => [
        'class' => UploadBehavior::className(),
        'attribute' => 'picture',
        'pathAttribute' => 'image_path',
        'baseUrlAttribute' => 'image_base_url'
        ],
        [
        'class' => TimestampBehavior::className(),
        'createdAtAttribute' => 'created_at',
        'updatedAtAttribute' => 'updated_at',
        'value' => new Expression('NOW()'),
        ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['created_at','updated_at','picture'], 'safe'],
            [['image_path', 'image_base_url'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'image_path' => 'Image Path',
            'image_base_url' => 'Image Base Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
