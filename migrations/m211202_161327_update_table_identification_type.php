<?php

use yii\db\Migration;

class m211202_161327_update_table_identification_type extends Migration
{
    public function up()
    {
        $this->createTable('{{%identification_type}}', [
            'id' => $this->bigPrimaryKey(),
            'identificationtypename' => $this->string(100)->notNull(),
            'equifaxcode' => $this->string(2),
            'bydefault' => $this->boolean()->notNull()->defaultValue(''),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%identification_type}}');
    }
}
