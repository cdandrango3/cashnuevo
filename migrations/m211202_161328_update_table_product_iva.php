<?php

use yii\db\Migration;

class m211202_161328_update_table_product_iva extends Migration
{
    public function up()
    {
        $this->createTable('{{%product_iva}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(250)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%product_iva}}');
    }
}
