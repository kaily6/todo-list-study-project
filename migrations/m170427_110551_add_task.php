<?php

use yii\db\Migration;

class m170427_110551_add_task extends Migration
{
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'text' => $this->text(),
            'done' => $this->boolean()->defaultValue(false),
            'list_id' => $this->integer()->unsigned(),
        ]);
        $this->createIndex(
            'idx-task-list_id',
            'task',
            'list_id'
        );

        $this->addForeignKey(
            'fk-task-list_id',
            'task',
            'list_id',
            'todo_list',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-task-list_id', 'task');
        $this->dropIndex('idx-task-list_id', 'task');
        $this->dropTable('task');
    }
}
