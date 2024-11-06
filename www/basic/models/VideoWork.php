<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "VideoWork".
 *
 * @property int $id
 * @property int $video_id
 * @property string|null $time_start
 * @property string|null $time_stop
 *
 * @property VideoList $video
 */
class VideoWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'VideoWork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id'], 'required'],
            [['video_id'], 'integer'],
            [['time_start', 'time_stop'], 'safe'],
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
            'video_id' => 'Video ID',
            'time_start' => 'Time Start',
            'time_stop' => 'Time Stop',
        ];
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
