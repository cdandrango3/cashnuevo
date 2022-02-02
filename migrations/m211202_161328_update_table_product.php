<?php

use yii\db\Migration;

class m211202_161328_update_table_product extends Migration
{
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->bigPrimaryKey(),
            'name' => $this->string(250)->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'institution_id' => $this->bigInteger()->notNull(),
            'category' => $this->string(258),
            'product_type_id' => $this->bigInteger()->notNull(),
            'brand' => $this->string(250),
            'purpose' => $this->string(250),
            'product_iva_id' => $this->bigInteger()->notNull(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
