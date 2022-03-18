<?php

use yii\db\Migration;

class m211202_161327_update_table_cost_center extends Migration
{
    public function up()
    {
        $this->createTable('{{%cost_center}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(150)->notNull(),
            'institution_id' => $this->bigInteger()->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%cost_center}}');
    }
}
