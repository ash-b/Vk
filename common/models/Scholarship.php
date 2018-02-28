<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "scholarship".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image_path
 * @property string $image_base_url
 * @property string $created_at
 * @property string $updated_at
 */
class Scholarship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $images;
    public static function tableName()
    {
        return 'scholarship';
    }
    public function behaviors()
    {
        return [
            'images' => [
                'class' => UploadBehavior::className(),
                'attribute' => 'images',
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
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at','image_path', 'image_base_url','images'], 'safe'],
            [['name', 'image_path', 'image_base_url'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'images'=>'Image',
            'image_path' => 'Image Path',
            'image_base_url' => 'Image Base Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
