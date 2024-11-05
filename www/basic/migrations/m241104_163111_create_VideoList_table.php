<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%VideoList}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m241104_163111_create_VideoList_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%VideoList}}', [
            'id' => $this->primaryKey(),
            '    name' => $this->string(50)->notNull(),
            'length' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-VideoList-user_id}}',
            '{{%VideoList}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-VideoList-user_id}}',
            '{{%VideoList}}',
            'user_id',
            '{{%users}}',
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
            '{{%fk-VideoList-user_id}}',
            '{{%VideoList}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-VideoList-user_id}}',
            '{{%VideoList}}'
        );

        $this->dropTable('{{%VideoList}}');
    }
}
