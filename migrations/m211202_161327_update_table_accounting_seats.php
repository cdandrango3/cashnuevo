<?php

use yii\db\Migration;

class m211202_161327_update_table_accounting_seats extends Migration
{
    public function up()
    {
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
        ]);

        $this->addForeignKey('foreign_key01', '{{%accounting_seats}}', 'institution_id', '{{%institution}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%accounting_seats}}');
    }
}
