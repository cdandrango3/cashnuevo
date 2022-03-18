<?php

use yii\db\Migration;

class m211202_161327_update_table_permission extends Migration
{
    public function up()
    {
        $this->createTable('{{%permission}}', [
            'id' => $this->bigPrimaryKey(),
            'permissionname' => $this->string(100)->notNull(),
            'slug' => $this->string(100)->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%permission}}');
    }
}
