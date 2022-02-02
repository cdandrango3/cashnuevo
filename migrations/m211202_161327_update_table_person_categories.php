<?php

use yii\db\Migration;

class m211202_161327_update_table_person_categories extends Migration
{
    public function up()
    {
        $this->createTable('{{%person_categories}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
            'institution_id' => $this->bigInteger()->notNull(),
        ]);

        $this->addForeignKey('foreign_key01', '{{%person_categories}}', 'institution_id', '{{%institution}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%person_categories}}');
    }
}
