<?php

use yii\db\Migration;

class m211202_161327_update_table_country extends Migration
{
    public function up()
    {
        $this->createTable('{{%country}}', [
            'id' => $this->bigPrimaryKey(),
            'countryname' => $this->string(100)->notNull(),
            'nationality' => $this->string(100)->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%country}}');
    }
}
