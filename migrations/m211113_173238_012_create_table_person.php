<?php

use yii\db\Migration;

class m211113_173238_012_create_table_person extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%person}}', [
            'id' => $this->bigPrimaryKey(),
            'person_type_id' => $this->bigInteger()->notNull(),
            'special_taxpayer' => $this->boolean(),
            'ruc' => $this->string(13)->notNull(),
            'cedula' => $this->string(10),
            'name' => $this->string()->notNull(),
            'commercial_name' => $this->string(254),
            'phones' => $this->string(),
            'address' => $this->text(),
            'foreigner' => $this->boolean(),
            'category' => $this->integer(),
            'emails' => $this->text(),
            'associated_person ' => $this->bigInteger(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%person}}');
    }
}
