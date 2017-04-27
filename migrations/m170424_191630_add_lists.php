<?php

use yii\db\Migration;

class m170424_191630_add_lists extends Migration
{
    public function safeUp()
    {
        $this->createTable('todo_list', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'title' => $this->string(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('todo_list');
    }
}
