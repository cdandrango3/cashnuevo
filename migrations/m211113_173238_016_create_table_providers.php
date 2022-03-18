<?php

use yii\db\Migration;

class m211113_173238_016_create_table_providers extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%providers}}', [
            'id' => $this->bigPrimaryKey(),
            'paid_chart_account_id' => $this->bigInteger()->notNull(),
            'recurrent_chart_account_id' => $this->bigInteger(),
            'cost_center_id' => $this->bigInteger(),
            'initial_balance' => $this->decimal(18, 2),
            'related_cia' => $this->boolean(),
            'manufacter' => $this->boolean(),
            'retention_ir_id' => $this->bigInteger(),
            'retention_iva_id' => $this->integer(),
            'person_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%providers}}');
    }
}
