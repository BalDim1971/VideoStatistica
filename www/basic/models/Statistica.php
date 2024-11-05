<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statistica".
 *
 * @property int $id
 * @property int $users_id
 * @property int $video_id
 * @property int $action_id
 * @property int $time
 *
 * @property Actions $action
 * @property Users $users
 * @property VideoList $video
 */
class Statistica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users_id', 'video_id', 'action_id', 'time'], 'required'],
            [['users_id', 'video_id', 'action_id', 'time'], 'integer'],
            [['action_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actions::class, 'targetAttribute' => ['action_id' => 'id']],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['users_id' => 'id']],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => VideoList::class, 'targetAttribute' => ['video_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users_id' => 'Users ID',
            'video_id' => 'Video ID',
            'action_id' => 'Action ID',
            'time' => 'Time',
        ];
    }

    /**
     * Gets query for [[Action]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(Actions::class, ['id' => 'action_id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id' => 'users_id']);
    }

    /**
     * Gets query for [[Video]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(VideoList::class, ['id' => 'video_id']);
    }
}
