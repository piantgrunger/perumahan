<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%check_in}}`.
 */
class m220406_151559_create_check_in_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%check_in}}', [
            'id' => $this->primaryKey(),
            'id_security' => $this->integer()->notNull(),
            'time' => $this->dateTime()->notNull(),
            'latitude' => $this->string()->notNull(),
            'longitude' => $this->string()->notNull(),
            'file_check_in' => $this->text()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%check_in}}');
    }
}
