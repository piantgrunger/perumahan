<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rfid}}`.
 */
class m220402_065633_create_rfid_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rfid}}', [
            'id' => $this->primaryKey(),
            'no_rfid' => $this->string(150)->notNull()->unique(),
            'nama' => $this->string(150)->notNull(),
            'alamat' => $this->text()->notNull(),
            'no_hp' => $this->string(150)->notNull(),
            'tgl_expired' => $this->date(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rfid}}');
    }
}
