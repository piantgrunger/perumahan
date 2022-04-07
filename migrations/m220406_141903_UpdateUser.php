<?php

use yii\db\Migration;

/**
 * Class m220406_141903_UpdateUser
 */
class m220406_141903_UpdateUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'id_pegawai', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220406_141903_UpdateUser cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220406_141903_UpdateUser cannot be reverted.\n";

        return false;
    }
    */
}
