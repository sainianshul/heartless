<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notes_category}}`.
 */
class m250209_115325_create_notes_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notes_categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'created_by_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);
    
        $this->addForeignKey(
            'fk_notes_categories_created_by_id',
            '{{%notes_categories}}',
            'created_by_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

      
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notes_categories}}');
    }
}
