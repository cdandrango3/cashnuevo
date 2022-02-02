<?php

use yii\db\Migration;

class m211113_173238_024_create_table_product_institution extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_institution}}', [
            'id' => $this->bigPrimaryKey(),
            'product_id' => $this->bigInteger()->notNull(),
            'institution_id' => $this->bigInteger()->notNull(),
            'productcrm_id' => $this->bigInteger(),
            'cost' => $this->decimal(10, 2)->notNull()->defaultValue('0'),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

        $this->addForeignKey('product_institution_id_product_foreign', '{{%product_institution}}', 'product_id', '{{%product}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('product_institution_id_institution_foreign', '{{%product_institution}}', 'institution_id', '{{%institution}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%product_institution}}');
    }
}
