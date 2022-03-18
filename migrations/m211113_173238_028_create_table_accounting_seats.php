<?php

use yii\db\Migration;

class m211113_173238_028_create_table_accounting_seats extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%accounting_seats}}', [
            'id' => $this->bigPrimaryKey(),
            'date' => $this->date()->notNull()->defaultExpression('CURRENT_DATE'),
            'institution_id' => $this->bigInteger()->notNull(),
            'description' => $this->text()->notNull(),
            'nodeductible' => $this->boolean(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

        $this->addForeignKey('foreign_key01', '{{%accounting_seats}}', 'institution_id', '{{%institution}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%accounting_seats}}');
    }
}
