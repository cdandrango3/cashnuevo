<?php

use yii\db\Migration;

class m211202_161327_update_table_accounting_exercises extends Migration
{
    public function up()
    {
        $this->createTable('{{%accounting_exercises}}', [
            'id' => $this->bigPrimaryKey(),
            'institution_id' => $this->bigInteger()->notNull(),
            'date_start' => $this->date()->notNull(),
            'date_end' => $this->date()->notNull(),
            'monthly_closure' => $this->boolean(),
            'closing_day' => $this->smallInteger(),
            'is_open' => $this->boolean()->notNull()->defaultValue('1'),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('foreign_key01', '{{%accounting_exercises}}', 'institution_id', '{{%institution}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%accounting_exercises}}');
    }
}
