<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery_attachment".
 *
 * @property integer $id
 * @property integer $gallery_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $order
 *
 * @property Gallery $gallery
 */
class GalleryAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id', 'path'], 'required'],
            [['gallery_id', 'size', 'order'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_id' => 'Gallery ID',
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
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }
}
