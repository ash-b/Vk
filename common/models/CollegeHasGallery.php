<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "college_has_gallery".
 *
 * @property integer $college_id
 * @property integer $gallery_id
 *
 * @property College $college
 * @property Gallery $gallery
 */
class CollegeHasGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'college_has_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['college_id', 'gallery_id'], 'required'],
            [['college_id', 'gallery_id'], 'integer'],
//            [['college_id'], 'exist', 'skipOnError' => true, 'targetClass' => College::className(), 'targetAttribute' => ['college_id' => 'id']],
//            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'college_id' => 'College ID',
            'gallery_id' => 'Gallery ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'college_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }
}
