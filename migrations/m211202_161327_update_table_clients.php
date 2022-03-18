<?php

use yii\db\Migration;

class m211202_161327_update_table_clients extends Migration
{
    public function up()
    {
        $this->createTable('{{%clients}}', [
            'id' => $this->bigPrimaryKey(),
            'chart_account_id' => $this->bigInteger()->notNull(),
            'sales_person_id' => $this->bigInteger(),
            'discount' => $this->decimal(3, 2),
            'initial_balance' => $this->decimal(18, 2),
            'pvp_id' => $this->bigInteger(),
            'manual_pvp' => $this->boolean(),
            'exportation' => $this->boolean(),
            'cost_center_id' => $this->bigInteger(),
            'credit' => $this->boolean(),
            'person_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('foreign_key02', '{{%clients}}', 'chart_account_id', '{{%chart_accounts}}', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('foreign_key03', '{{%clients}}', 'pvp_id', '{{%pvp}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key01', '{{%clients}}', 'person_id', '{{%person}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%clients}}');
    }
}
