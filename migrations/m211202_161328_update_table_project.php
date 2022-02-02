<?php

use yii\db\Migration;

class m211202_161328_update_table_project extends Migration
{
    public function up()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->bigPrimaryKey(),
            'code' => $this->string(150)->notNull(),
            'slug' => $this->string(150)->notNull(),
            'institution_id' => $this->bigInteger()->notNull(),
            'type_account' => $this->string(150)->notNull(),
            'bigparent_id' => $this->bigInteger(),
            'parent_id' => $this->bigInteger(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%project}}');
    }
}
