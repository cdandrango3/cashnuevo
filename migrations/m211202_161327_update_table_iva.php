<?php

use yii\db\Migration;

class m211202_161327_update_table_iva extends Migration
{
    public function up()
    {
        $this->createTable('{{%iva}}', [
            'id' => $this->bigPrimaryKey(),
            'value' => $this->decimal(3, 2)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%iva}}');
    }
}
