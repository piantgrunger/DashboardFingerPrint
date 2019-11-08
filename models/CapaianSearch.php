<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Capaian;

/**
 * CapaianSearch represents the model behind the search form of `app\models\Capaian`.
 */
class CapaianSearch extends Capaian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_capaian'], 'number'],
            [['nama_capaian'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Capaian::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'kode_capaian' => $this->kode_capaian,
        ]);

        $query->andFilterWhere(['ilike', 'nama_capaian', $this->nama_capaian]);

        return $dataProvider;
    }
}
