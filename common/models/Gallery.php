<?php
    namespace common\models;
    use Yii;
    use yii\db\Expression;
    use yii\behaviors\TimestampBehavior;
    use trntv\filekit\behaviors\UploadBehavior;
    /**
     * This is the model class for table "gallery".
     *
     * @property integer $id
     * @property string $name
     *
     * @property GalleryAttachment[] $galleryAttachments
     */
    class Gallery extends \yii\db\ActiveRecord
    {
        public $attachments;

        public function behaviors()
        {
            return [

                [
                    'class' => UploadBehavior::className(),
                    'attribute' => 'attachments',
                    'multiple' => true,
                    'uploadRelation' => 'galleryAttachments',
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
            return 'gallery';
        }

        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['name'], 'required'],
                [['name'], 'string', 'max' => 255],
                [['created_at', 'updated_at','attachments'], 'safe'],
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
            ];
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getGalleryAttachments()
        {
            return $this->hasMany(GalleryAttachment::className(), ['gallery_id' => 'id']);
        }
    }
