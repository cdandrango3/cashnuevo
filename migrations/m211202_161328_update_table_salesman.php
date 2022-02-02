<?php

use yii\db\Migration;

class m211202_161328_update_table_salesman extends Migration
{
    public function up()
    {
        $this->createTable('{{%salesman}}', [
            'id' => $this->bigPrimaryKey(),
            'person_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('foreign_key01', '{{%salesman}}', 'person_id', '{{%person}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%salesman}}');
    }
}
