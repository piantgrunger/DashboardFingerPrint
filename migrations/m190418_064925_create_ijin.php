<?php

use yii\db\Migration;

class m190418_064925_create_ijin extends Migration
{
    public function up()
    {
        $this->createTable("ijin",[
            "id" => $this->primaryKey(),
            "nip" => $this->string(100)->notNull(),
            'tanggal' => $this->date(),
            "keterangan" => $this->string(100)->notNull(),
            'file' => $this->string(100),
            

            
        ]);

    }

    public function down()
    {
        echo "m190418_064925_create_ijin cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
