<?php

use yii\db\Migration;

class m211113_173238_009_create_table_identification_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%identification_type}}', [
            'id' => $this->bigPrimaryKey(),
            'identificationtypename' => $this->string(100)->notNull(),
            'equifaxcode' => $this->string(2),
            'bydefault' => $this->boolean()->notNull()->defaultValue(''),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%identification_type}}');
    }
}
