<?php

use yii\db\Migration;

class m211113_173238_011_create_table_permission extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%permission}}', [
            'id' => $this->bigPrimaryKey(),
            'permissionname' => $this->string(100)->notNull(),
            'slug' => $this->string(100)->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%permission}}');
    }
}
