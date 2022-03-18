<?php

use yii\db\Migration;

class m211202_161327_update_table_permission_role extends Migration
{
    public function up()
    {
        $this->createTable('{{%permission_role}}', [
            'id' => $this->bigPrimaryKey(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'id_permission' => $this->integer()->notNull(),
            'id_role' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
        ]);

        $this->addForeignKey('permission_role_id_permission_foreign', '{{%permission_role}}', 'id_permission', '{{%permission}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('permission_role_id_role_foreign', '{{%permission_role}}', 'id_role', '{{%role}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%permission_role}}');
    }
}
