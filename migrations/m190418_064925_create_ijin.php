<?php

use yii\db\Migration;

class m190418_064925_create_ijin extends Migration
{
    public function up()
    {
        $this->createTable("ijin",[
            "id" => $this->primaryKey(),
            "nip" => $this->string(100)->notNull(),
            'tanggal_awal' => $this->date(),
            'tanggal_akhir' => $this->date(),
            "jenis" => $this->string(100)->notNull(),
            "keterangan" => $this->text()->notNull(),
            'file' => $this->string(100),
            'status' => $this->string()->notNull()->defaultValue('Belum Diapprove'),            

            
        ]);

    }

    public function down()
    {
        $this->dropTable("ijin");
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
