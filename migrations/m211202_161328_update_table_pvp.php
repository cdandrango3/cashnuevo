<?php

use yii\db\Migration;

class m211202_161328_update_table_pvp extends Migration
{
    public function up()
    {
        $this->createTable('{{%pvp}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string()->notNull(),
            'institution_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('foreign_key01', '{{%pvp}}', 'institution_id', '{{%institution}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%pvp}}');
    }
}
