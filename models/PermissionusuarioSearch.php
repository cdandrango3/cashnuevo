<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Permissionusuario;

/**
 * PermissionusuarioSearch represents the model behind the search form about `app\models\Permissionusuario`.
 */
class PermissionusuarioSearch extends Permissionusuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_users', 'id_modulo', 'id_submodulos', 'id'], 'integer'],
            [['agregar', 'modificar', 'eliminar', 'acceder', 'entregar', 'generar', 'aprobar', 'configurar'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Permissionusuario::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_users' => $this->id_users,
            'id_modulo' => $this->id_modulo,
            'agregar' => $this->agregar,
            'modificar' => $this->modificar,
            'eliminar' => $this->eliminar,
            'acceder' => $this->acceder,
            'entregar' => $this->entregar,
            'generar' => $this->generar,
            'aprobar' => $this->aprobar,
            'configurar' => $this->configurar,
            'id_submodulos' => $this->id_submodulos,
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}
