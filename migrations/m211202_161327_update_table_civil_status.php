<?php

use yii\db\Migration;

class m211202_161327_update_table_civil_status extends Migration
{
    public function up()
    {
        $this->createTable('{{%civil_status}}', [
            'id' => $this->bigPrimaryKey(),
            'civilstatusname' => $this->string(150)->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%civil_status}}');
    }
}
