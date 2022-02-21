<?php

use yii\db\Migration;
use League\Csv\Reader;

/**
 * Handles the creation of table `{{%kabupaten}}`.
 */
class m220221_152853_create_kabupaten_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kabupaten}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(100)->notNull(),
            'id_propinsi' => $this->integer()->notNull(),
        ]);

        // path tempat file csv berada
        $propinsi = Yii::getAlias('@app/migrations/kabupaten.csv');
        // baca file csv menggunakan library league\csv
        $reader = Reader::createFromPath($propinsi);
        // insert data provinsi kedalam tabel provinsi
        foreach ($reader as $index => $row) {
            $this->insert('kabupaten', [
                'id' => (int)$row[0],
                'id_propinsi' => (int)$row[1],
                'nama' => $row[2],
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kabupaten}}');
    }
}
