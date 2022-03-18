<?php

use yii\db\Migration;

class m211202_161327_update_table_bank extends Migration
{
    public function up()
    {
        $this->createTable('{{%bank}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%bank}}');
    }
}
