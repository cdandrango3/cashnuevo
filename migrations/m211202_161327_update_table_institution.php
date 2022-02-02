<?php

use yii\db\Migration;

class m211202_161327_update_table_institution extends Migration
{
    public function up()
    {
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
            'users_id' => $this->integer()->notNull(),
            'institution_type_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('now()'),
            'deleted_at' => $this->timestamp(),
            'contractdate' => $this->date(),
            'city_id' => $this->bigInteger()->notNull(),
        ]);

        $this->addForeignKey('institution_id_users_foreign', '{{%institution}}', 'users_id', '{{%users}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('institution_id_institutiontype_foreign', '{{%institution}}', 'institution_type_id', '{{%institution_type}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%institution}}');
    }
}
