<?php

use yii\db\Migration;

class m211202_161327_update_table_person_bank_info extends Migration
{
    public function up()
    {
        $this->createTable('{{%person_bank_info}}', [
            'id' => $this->bigPrimaryKey(),
            'bank_id' => $this->bigInteger()->notNull(),
            'bank_account_type_id' => $this->bigInteger()->notNull(),
            'bank_account_number' => $this->string(30)->notNull(),
            'reference' => $this->text(),
            'person_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('foreign_key01', '{{%person_bank_info}}', 'bank_id', '{{%bank}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key02', '{{%person_bank_info}}', 'bank_account_type_id', '{{%bank_account_type}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key03', '{{%person_bank_info}}', 'person_id', '{{%person}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%person_bank_info}}');
    }
}
