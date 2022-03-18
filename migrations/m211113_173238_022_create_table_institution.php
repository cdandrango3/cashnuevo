<?php

use yii\db\Migration;

class m211113_173238_022_create_table_institution extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%institution}}', [
            'id' => $this->bigPrimaryKey(),
            'ruc' => $this->string(50)->notNull(),
            'razon_social' => $this->string()->notNull(),
            'nombre_comercial' => $this->string()->notNull(),
            'numero_establecimiento' => $this->string()->notNull(),
            'obligado_contabilidad' => $this->boolean()->notNull()->defaultValue('1'),
            'contribuyemte_especial' => $this->boolean()->notNull()->defaultValue('1'),
            'exportador' => $this->boolean()->notNull()->defaultValue('1'),
            'microempresa' => $this->boolean()->notNull()->defaultValue('1'),
            'agente_retencion' => $this->boolean()->notNull()->defaultValue('1'),
            'direccion' => $this->text()->notNull(),
            'actividad_economica' => $this->text()->notNull(),
            'numero_decimales' => $this->string()->notNull(),
            'correo_notificacion' => $this->string()->notNull(),
            'logo' => $this->string()->notNull(),
            'firma' => $this->string()->notNull(),
            'garantia' => $this->string()->notNull(),
            'forma_pago' => $this->string()->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'id_users' => $this->integer()->notNull(),
            'id_institutiontype' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
            'contractdate' => $this->date(),
            'city_id' => $this->bigInteger()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('institution_id_users_foreign', '{{%institution}}', 'id_users', '{{%users}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('institution_id_institutiontype_foreign', '{{%institution}}', 'id_institutiontype', '{{%institution_type}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%institution}}');
    }
}
