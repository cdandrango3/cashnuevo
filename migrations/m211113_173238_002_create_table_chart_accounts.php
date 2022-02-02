<?php

use yii\db\Migration;

class m211113_173238_002_create_table_chart_accounts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%chart_accounts}}', [
            'id' => $this->bigPrimaryKey(),
            'code' => $this->string(150)->notNull(),
            'slug' => $this->string(150)->notNull(),
            'institution_id' => $this->integer()->notNull(),
            'bigparent_id' => $this->bigInteger(),
            'parent_id' => $this->bigInteger(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%chart_accounts}}');
    }
}
