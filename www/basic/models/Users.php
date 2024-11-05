<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $uuid
 *
 * @property VideoList[] $videoLists
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'uuid'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
            [['uuid'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'uuid' => 'Uuid',
        ];
    }

    /**
     * Gets query for [[VideoLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideoLists()
    {
        return $this->hasMany(VideoList::class, ['user_id' => 'id']);
    }
}
