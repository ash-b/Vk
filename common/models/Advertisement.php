<?php

namespace common\models;
use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "advertisement".
 *
 * @property integer $id
 * @property string $link
 * @property string $title
 * @property integer $status
 * @property string $from_date
 * @property string $to_date
 * @property string $created_at
 * @property string $image_path
 * @property string $image_base_url
 * @property integer $position
 * @property integer $is_mobile
 * @property integer $order_no
 */
class Advertisement extends \yii\db\ActiveRecord
{
    public $picture;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertisement';
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
            [['link', 'title', 'status', 'from_date', 'to_date'], 'required'],
            [['status', 'position', 'is_mobile', 'order_no'], 'integer'],
            [['from_date', 'to_date', 'created_at','image_path', 'image_base_url','picture'], 'safe'],
            [['link', 'title', 'image_path', 'image_base_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'title' => 'Title',
            'status' => 'Status',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'created_at' => 'Created At',
            'image_path' => 'Image Path',
            'image_base_url' => 'Image Base Url',
            'position' => 'Position',
            'is_mobile' => 'Is Mobile',
            'order_no' => 'Order No',
        ];
    }
}
