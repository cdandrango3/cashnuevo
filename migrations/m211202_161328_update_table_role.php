<?php

use yii\db\Migration;

class m211202_161328_update_table_role extends Migration
{
    public function up()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->bigPrimaryKey(),
            'rolename' => $this->string(100)->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'special' => $this->string(15),
            'info' => $this->boolean(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%role}}');
    }
}
