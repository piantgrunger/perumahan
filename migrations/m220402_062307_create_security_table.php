<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%security}}`.
 */
class m220402_062307_create_security_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%security}}', [
            'id' => $this->primaryKey(),
            'nik' => $this->string(50)->notNull()->unique(),
            'nama' => $this->string(50)->notNull(),
            'alamat' => $this->text()->notNull(),
            'no_hp' => $this->string(50)->notNull(),
            'tempat_lahir' => $this->string(50),
            'tanggal_lahir' => $this->date(),
            'jenis_kelamin' => $this->string(50),
            'agama' => $this->string(50),
            'tanggal_masuk' => $this->date()->notNull(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%security}}');
    }
}
