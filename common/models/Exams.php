<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "exams".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $image_path
 * @property string $image_base_url
 * @property string $pdf_path
 * @property string $pdf_base_url
 * @property string $created_at
 * @property string $updated_at
 */
class Exams extends \yii\db\ActiveRecord
{
    public $images;
    public $pdf_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exams';
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
            'pdf_file' => [
                'class' => UploadBehavior::className(),
                'attribute' => 'pdf_file',
                'pathAttribute' => 'pdf_path',
                'baseUrlAttribute' => 'pdf_base_url'
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
            [['name', 'title','description'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at','image_path', 'image_base_url', 'pdf_path', 'pdf_base_url','images','pdf_file'], 'safe'],
            [['name', 'title','image_path', 'image_base_url', 'pdf_path', 'pdf_base_url'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'description' => 'Description',
            'image_path' => 'Image Path',
            'image_base_url' => 'Image Base Url',
            'pdf_path' => 'Pdf Path',
            'pdf_base_url' => 'Pdf Base Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
