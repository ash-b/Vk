<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course_has_fees".
 *
 * @property integer $course_id
 * @property integer $fees_id
 *
 * @property FeesStructure $fees
 * @property Course $course
 */
class CourseHasFees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_has_fees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'fees_id'], 'required'],
            [['course_id', 'fees_id'], 'integer'],
            [['fees_id'], 'exist', 'skipOnError' => true, 'targetClass' => FeesStructure::className(), 'targetAttribute' => ['fees_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'fees_id' => 'Fees ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFees()
    {
        return $this->hasOne(FeesStructure::className(), ['id' => 'fees_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }
}
