<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "college".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $address
 * @property string $image_path
 * @property string $image_base_url
 * @property string $dte_code
 * @property integer $college_type
 * @property integer $university_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property University $university
 */
class College extends \yii\db\ActiveRecord
{
    public $picture;
    public $attachments;
    
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
        'class' => UploadBehavior::className(),
        'attribute' => 'attachments',
        'multiple' => true,
        'uploadRelation' => 'collegeAttachments',
        'pathAttribute' => 'path',
        'baseUrlAttribute' => 'base_url',
        'orderAttribute' => 'order',
        'typeAttribute' => 'type',
        'sizeAttribute' => 'size',
        'nameAttribute' => 'name',
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
        return 'college';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','dte_code'], 'required'],
            [['description', 'address', 'image_path', 'image_base_url'], 'string'],
            [['university_id','status','city_id'], 'integer'],
            [['created_at', 'updated_at','picture','attachments'], 'safe'],
            [['name','college_type'], 'string', 'max' => 56],
            [['dte_code'], 'string', 'max' => 11],
            [['university_id'], 'exist', 'skipOnError' => true, 'targetClass' => University::className(), 'targetAttribute' => ['university_id' => 'id']],
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
            'address' => 'Address',
            'image_path' => 'Image Path',
            'image_base_url' => 'Image Base Url',
            'dte_code' => 'DTE Code',
            'college_type' => 'College Type',
            'university_id' => 'University',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'attachments' => 'Gallery Images',
            'city_id'=>'City'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversity()
    {
        return $this->hasOne(University::className(), ['id' => 'university_id']);
    }
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
    public function getCollegeAttachments()
    {
        return $this->hasMany(CollegeAttachment::className(), ['college_id' => 'id']);
    }
    public function getGallery()
    {
        return $this->hasMany(Gallery::className(), ['id' => 'gallery_id'])->viaTable('college_has_gallery', ['college_id' => 'id'])->from('gallery g');
    }
}
