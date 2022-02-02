<?php

use yii\db\Migration;

class m211202_161328_update_table_providers extends Migration
{
    public function up()
    {
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
        ]);

        $this->addForeignKey('foreign_key02', '{{%providers}}', 'paid_chart_account_id', '{{%chart_accounts}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key03', '{{%providers}}', 'cost_center_id', '{{%cost_center}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key01', '{{%providers}}', 'person_id', '{{%person}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%providers}}');
    }
}
