<?php

use yii\db\Migration;

class m211113_173238_025_create_table_province extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%province}}', [
            'id' => $this->bigPrimaryKey(),
            'provincename' => $this->string(100)->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'country_id' => $this->bigInteger()->notNull(),
            'region_id' => $this->bigInteger(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

        $this->addForeignKey('province_id_country_foreign', '{{%province}}', 'country_id', '{{%country}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('province_id_region_foreign', '{{%province}}', 'region_id', '{{%region}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%province}}');
    }
}
