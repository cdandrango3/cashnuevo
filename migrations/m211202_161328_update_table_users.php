<?php

use yii\db\Migration;

class m211202_161328_update_table_users extends Migration
{
    public function up()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->bigPrimaryKey(),
            'username' => $this->string()->notNull(),
            'remember_token' => $this->text(),
            'forgotpassword_guid' => $this->text(),
            'email' => $this->text()->notNull(),
            'password' => $this->text()->notNull(),
            'email_verified_at' => $this->timestamp(),
            'auth_key' => $this->string(50),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'consumer' => $this->boolean()->notNull()->defaultValue('1'),
            'role_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
            'person_id' => $this->bigInteger()->notNull(),
        ]);

        $this->createIndex('users_email_unique', '{{%users}}', 'email', true);
        $this->addForeignKey('users_id_role_foreign', '{{%users}}', 'role_id', '{{%role}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
