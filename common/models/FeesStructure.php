<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "fees_structure".
 *
 * @property integer $id
 * @property double $amount
 * @property integer $caste_id
 * @property integer $branch_id
 * @property integer $college_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CourseHasFees[] $courseHasFees
 * @property Course[] $courses
 * @property Branch $branch
 * @property Caste $caste
 * @property College $college
 */
class FeesStructure extends \yii\db\ActiveRecord
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
        return 'fees_structure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'caste_id', 'branch_id', 'college_id', 'status'], 'required'],
            [['amount'], 'number'],
            [['caste_id', 'branch_id', 'college_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
//            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch_id' => 'id']],
//            [['caste_id'], 'exist', 'skipOnError' => true, 'targetClass' => Caste::className(), 'targetAttribute' => ['caste_id' => 'id']],
//            [['college_id'], 'exist', 'skipOnError' => true, 'targetClass' => College::className(), 'targetAttribute' => ['college_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'caste_id' => 'Caste',
            'branch_id' => 'Branch',
            'college_id' => 'College',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseHasFees()
    {
        return $this->hasMany(CourseHasFees::className(), ['fees_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id'])->viaTable('course_has_fees', ['fees_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::className(), ['id' => 'branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaste()
    {
        return $this->hasOne(Caste::className(), ['id' => 'caste_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'college_id']);
    }
}
