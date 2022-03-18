<?php

use yii\db\Migration;

class m211202_161327_update_table_email_config extends Migration
{
    public function up()
    {
        $this->createTable('{{%email_config}}', [
            'id' => $this->bigPrimaryKey(),
            'configemailtype' => $this->string(50)->notNull(),
            'driver' => $this->string(15)->notNull(),
            'server' => $this->string(100)->notNull(),
            'port' => $this->integer()->notNull(),
            'email' => $this->string(200)->notNull(),
            'password' => $this->text()->notNull(),
            'encryptationtype' => $this->string(10),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%email_config}}');
    }
}
