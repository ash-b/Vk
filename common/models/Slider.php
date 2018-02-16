<?php

namespace common\models;
use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;
/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $name
 * @property string $slider_image
 */
class Slider extends \yii\db\ActiveRecord
{
    public $picture;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }
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
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id'], 'integer'],
            [['name','image_path', 'image_base_url'], 'string', 'max' => 255],
            [['created_at', 'updated_at','picture'], 'safe'],
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
            'picture' => 'Slider Image',
        ];
    }
}
