<?php

use yii\db\Migration;

class m211202_161327_update_table_city extends Migration
{
    public function up()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->bigPrimaryKey(),
            'province_id' => $this->bigInteger()->notNull(),
            'cityname' => $this->string(100)->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('city_id_province_foreign', '{{%city}}', 'province_id', '{{%province}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%city}}');
    }
}
