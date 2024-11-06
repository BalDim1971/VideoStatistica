<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%VideoWork}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%VideoList}}`
 */
class m241106_031135_create_VideoWork_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%VideoWork}}', [
            'id' => $this->primaryKey(),
            'video_id' => $this->integer()->notNull(),
            'time_start' => $this->timestamp(),
            'time_stop' => $this->timestamp(),
        ]);

        // creates index for column `video_id`
        $this->createIndex(
            '{{%idx-VideoWork-video_id}}',
            '{{%VideoWork}}',
            'video_id'
        );

        // add foreign key for table `{{%VideoList}}`
        $this->addForeignKey(
            '{{%fk-VideoWork-video_id}}',
            '{{%VideoWork}}',
            'video_id',
            '{{%VideoList}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%VideoList}}`
        $this->dropForeignKey(
            '{{%fk-VideoWork-video_id}}',
            '{{%VideoWork}}'
        );

        // drops index for column `video_id`
        $this->dropIndex(
            '{{%idx-VideoWork-video_id}}',
            '{{%VideoWork}}'
        );

        $this->dropTable('{{%VideoWork}}');
    }
}
