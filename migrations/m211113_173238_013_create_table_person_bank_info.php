<?php

use yii\db\Migration;

class m211113_173238_013_create_table_person_bank_info extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%person_bank_info}}', [
            'id' => $this->bigPrimaryKey(),
            'bank_id' => $this->bigInteger()->notNull(),
            'bank_account_type_id' => $this->bigInteger()->notNull(),
            'bank_account_number' => $this->string(30)->notNull(),
            'reference' => $this->text(),
            'person_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%person_bank_info}}');
    }
}
