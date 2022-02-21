<?php

use yii\db\Migration;
use League\Csv\Reader;

/**
 * Handles the creation of table `{{%propinsi}}`.
 */
class m220221_150810_create_propinsi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%propinsi}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(100)->notNull(),
        ]);

         
        // path tempat file csv berada
        $propinsi = Yii::getAlias('@app/migrations/propinsi.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($propinsi);
        // insert data provinsi kedalam tabel provinsi
        foreach ($reader as $index => $row) {
            $this->insert('propinsi', [
            'id' => (int)$row[0],
            'nama' => $row[1],
        ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%propinsi}}');
    }
}
