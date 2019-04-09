<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%User}}`.
 */
class m190319_181659_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%User}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(80),
            'name' => $this->string(40),
            'password' => $this->string(80),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%User}}');
    }
}
