<?php

use yii\db\Migration;

class m211202_161327_update_table_institution_type extends Migration
{
    public function up()
    {
        $this->createTable('{{%institution_type}}', [
            'id' => $this->bigPrimaryKey(),
            'institutiontypename' => $this->string(100)->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%institution_type}}');
    }
}
