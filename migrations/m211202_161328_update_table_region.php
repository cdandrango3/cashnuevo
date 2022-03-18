<?php

use yii\db\Migration;

class m211202_161328_update_table_region extends Migration
{
    public function up()
    {
        $this->createTable('{{%region}}', [
            'id' => $this->bigPrimaryKey(),
            'region' => $this->string(25)->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%region}}');
    }
}
