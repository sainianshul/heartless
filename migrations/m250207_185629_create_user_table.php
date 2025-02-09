<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m250207_185629_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
        'id' => $this->primaryKey(),
        'username' => $this->string()->notNull(),
        'password' => $this->string()->notNull(),
        'email' => $this->string()->notNull(),
        'authKey' => $this->string()->notNull(),
        'accessToken' => $this->string()->notNull(),    
        'role_id' => $this->integer()->notNull()->defaultValue(10),
        'status_id' => $this->integer()->notNull(),
        'is_email_verified' => $this->integer()->defaultValue(0)->notNull(),
        'created_at' => $this->integer()->notNull(),
        'updated_at' => $this->integer()->notNull(),
        ]); }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
