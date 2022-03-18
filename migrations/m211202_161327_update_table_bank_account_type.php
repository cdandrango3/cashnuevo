<?php

use yii\db\Migration;

class m211202_161327_update_table_bank_account_type extends Migration
{
    public function up()
    {
        $this->createTable('{{%bank_account_type}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(100)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%bank_account_type}}');
    }
}
