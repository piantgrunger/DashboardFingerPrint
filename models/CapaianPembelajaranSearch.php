<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CapaianPembelajaran;
use Yii;

/**
 * CapaianPembelajaranSearch represents the model behind the search form of `app\models\CapaianPembelajaran`.
 */
class CapaianPembelajaranSearch extends CapaianPembelajaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'capaian', 'unit', 'bahasa'], 'integer'],
            [['kode', 'deskripsi'], 'safe'],
            [['is_deleted'], 'boolean'],
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
        $query = CapaianPembelajaran::find()->select(['kode','capaian','unit'])->distinct();

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
            'id' => $this->id,
            'capaian' => $this->capaian,
            'unit' => $this->unit,
            'bahasa' => $this->bahasa,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andWhere('is_deleted <>true');
      
        $roles =Yii::$app->user->identity->roleSiakad;
        foreach ($roles as $role) {
            $kodeunit = $role->kodeunit;
        }
        $query->andWhere(['or',['unit'=>'UIN'],['unit'=>$kodeunit]]);

        $query->andFilterWhere(['ilike', 'kode', $this->kode])
            ->andFilterWhere(['ilike', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
