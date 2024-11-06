<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statistica}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%VideoWork}}`
 * - `{{%actions}}`
 */
class m241106_031430_create_statistica_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%statistica}}', [
            'id' => $this->primaryKey(),
            'users_id' => $this->integer()->notNull(),
            'video_id' => $this->integer()->notNull(),
            'action_id' => $this->integer()->notNull(),
            'time' => $this->integer()->notNull(),
        ]);

        // creates index for column `users_id`
        $this->createIndex(
            '{{%idx-statistica-users_id}}',
            '{{%statistica}}',
            'users_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-statistica-users_id}}',
            '{{%statistica}}',
            'users_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `video_id`
        $this->createIndex(
            '{{%idx-statistica-video_id}}',
            '{{%statistica}}',
            'video_id'
        );

        // add foreign key for table `{{%VideoWork}}`
        $this->addForeignKey(
            '{{%fk-statistica-video_id}}',
            '{{%statistica}}',
            'video_id',
            '{{%VideoWork}}',
            'id',
            'CASCADE'
        );

        // creates index for column `action_id`
        $this->createIndex(
            '{{%idx-statistica-action_id}}',
            '{{%statistica}}',
            'action_id'
        );

        // add foreign key for table `{{%actions}}`
        $this->addForeignKey(
            '{{%fk-statistica-action_id}}',
            '{{%statistica}}',
            'action_id',
            '{{%actions}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-statistica-users_id}}',
            '{{%statistica}}'
        );

        // drops index for column `users_id`
        $this->dropIndex(
            '{{%idx-statistica-users_id}}',
            '{{%statistica}}'
        );

        // drops foreign key for table `{{%VideoWork}}`
        $this->dropForeignKey(
            '{{%fk-statistica-video_id}}',
            '{{%statistica}}'
        );

        // drops index for column `video_id`
        $this->dropIndex(
            '{{%idx-statistica-video_id}}',
            '{{%statistica}}'
        );

        // drops foreign key for table `{{%actions}}`
        $this->dropForeignKey(
            '{{%fk-statistica-action_id}}',
            '{{%statistica}}'
        );

        // drops index for column `action_id`
        $this->dropIndex(
            '{{%idx-statistica-action_id}}',
            '{{%statistica}}'
        );

        $this->dropTable('{{%statistica}}');
    }
}
