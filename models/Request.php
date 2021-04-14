<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int $category
 * @property string $photo_before
 * @property int $date
 * @property string|null $photo_after
 * @property string|null $reason
 * @property int $status
 * @property int $owner
 *
 * @property Category $category0
 * @property Status $status0
 * @property User $owner0
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'category', 'photo_before', 'date', 'status', 'owner'], 'required'],
            [['name', 'text', 'photo_before', 'photo_after', 'reason'], 'string'],
            [['category', 'date', 'status', 'owner'], 'integer'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status' => 'id']],
            [['owner'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
            'category' => 'Category',
            'photo_before' => 'Photo Before',
            'date' => 'Date',
            'photo_after' => 'Photo After',
            'reason' => 'Reason',
            'status' => 'Status',
            'owner' => 'Owner',
        ];
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[Owner0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner0()
    {
        return $this->hasOne(User::className(), ['id' => 'owner']);
    }
}
