<?php

use yii\db\Migration;

class m170427_113945_populate extends Migration
{
    public function safeUp()
    {
        $this->insert('todo_list',
            [
                'id' => 1,
                'title' => 'Personal',
            ]);
        $this->insert('todo_list',
            [
                'id' => 2,
                'title' => 'Work',
            ]
        );

        $this->insert('task',
            [
                'id' => 1,
                'text' => 'Read a book',
                'done' => false,
                'list_id' => 1,
            ]);
        $this->insert('task',
            [
                'id' => 2,
                'text' => 'Go to LT DAY',
                'done' => false,
                'list_id' => 2,
            ]
        );
    }

    public function safeDown()
    {
        $this->truncateTable('task');
        $this->truncateTable('todo_list');
    }
}
