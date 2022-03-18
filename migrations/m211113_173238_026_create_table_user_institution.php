<?php

use yii\db\Migration;

class m211113_173238_026_create_table_user_institution extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_institution}}', [
            'id' => $this->bigPrimaryKey(),
            'uses_id' => $this->bigInteger()->notNull(),
            'institution_id' => $this->bigInteger()->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

        $this->addForeignKey('user_institution_id_users_foreign', '{{%user_institution}}', 'uses_id', '{{%users}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('user_institution_id_institution_foreign', '{{%user_institution}}', 'institution_id', '{{%institution}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%user_institution}}');
    }
}
