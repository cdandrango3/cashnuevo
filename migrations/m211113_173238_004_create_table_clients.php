<?php

use yii\db\Migration;

class m211113_173238_004_create_table_clients extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%clients}}', [
            'id' => $this->bigPrimaryKey(),
            'chart_account_id' => $this->bigInteger()->notNull(),
            'sales_person_id' => $this->bigInteger(),
            'discount' => $this->decimal(3, 2),
            'initial_balance' => $this->decimal(18, 2),
            'pvp_id' => $this->bigInteger(),
            'manual_pvp' => $this->boolean(),
            'exportation' => $this->boolean(),
            'const_center_id' => $this->bigInteger(),
            'credit' => $this->boolean(),
            'person_id' => $this->bigInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%clients}}');
    }
}
