<?php

use yii\db\Migration;

class m211202_161328_update_table_shareholder extends Migration
{
    public function up()
    {
        $this->createTable('{{%shareholder}}', [
            'id' => $this->bigPrimaryKey(),
            'paid_chart_account_id' => $this->bigInteger(),
            'person_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('foreign_key02', '{{%shareholder}}', 'paid_chart_account_id', '{{%chart_accounts}}', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('foreign_key01', '{{%shareholder}}', 'person_id', '{{%person}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%shareholder}}');
    }
}
