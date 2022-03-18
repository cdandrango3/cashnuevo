<?php

use yii\db\Migration;

class m211202_161327_update_table_employee extends Migration
{
    public function up()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->bigPrimaryKey(),
            'manager' => $this->boolean(),
            'intern' => $this->boolean(),
            'person_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('foreign_key01', '{{%employee}}', 'person_id', '{{%person}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%employee}}');
    }
}
