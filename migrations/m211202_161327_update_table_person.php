<?php

use yii\db\Migration;

class m211202_161327_update_table_person extends Migration
{
    public function up()
    {
        $this->createTable('{{%person}}', [
            'id' => $this->bigPrimaryKey(),
            'person_type_id' => $this->bigInteger()->notNull(),
            'special_taxpayer' => $this->boolean(),
            'ruc' => $this->string(13),
            'cedula' => $this->string(10),
            'name' => $this->string()->notNull(),
            'commercial_name' => $this->string(254),
            'phones' => $this->string(),
            'address' => $this->text(),
            'foreigner' => $this->boolean(),
            'categories_id' => $this->bigInteger(),
            'emails' => $this->text(),
            'associated_person' => $this->bigInteger(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
            'institution_id' => $this->bigInteger()->notNull(),
            'city_id' => $this->bigInteger(),
        ]);

        $this->addForeignKey('foreign_key05', '{{%person}}', 'person_type_id', '{{%person_types}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key02', '{{%person}}', 'categories_id', '{{%person_categories}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key04', '{{%person}}', 'associated_person', '{{%person}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key01', '{{%person}}', 'institution_id', '{{%institution}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('foreign_key03', '{{%person}}', 'city_id', '{{%city}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%person}}');
    }
}
