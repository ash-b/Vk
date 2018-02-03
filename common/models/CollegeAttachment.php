<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "college_attachment".
 *
 * @property integer $id
 * @property integer $college_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $order
 *
 * @property College $college
 */
class CollegeAttachment extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
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
        return 'college_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['college_id', 'path'], 'required'],
            [['college_id', 'size', 'order'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [['college_id'], 'exist', 'skipOnError' => true, 'targetClass' => College::className(), 'targetAttribute' => ['college_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'college_id' => 'College ID',
            'path' => 'Path',
            'base_url' => 'Base Url',
            'type' => 'Type',
            'size' => 'Size',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'college_id']);
    }
}
