<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "college_has_branch".
 *
 * @property integer $id
 * @property integer $college_id
 * @property integer $branch_id
 * @property integer $intake
 *
 * @property Branch $branch
 * @property College $college
 */
class CollegeHasBranch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'college_has_branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['college_id', 'branch_id', 'intake'], 'required'],
            [['college_id', 'branch_id', 'intake'], 'integer'],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch_id' => 'id']],
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
            'college_id' => 'College',
            'branch_id' => 'Branch',
            'intake' => 'Intake',
        ];
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
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'college_id']);
    }
}
