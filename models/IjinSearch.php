<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ijin;

/**
 * IjinSearch represents the model behind the search form about `app\models\Ijin`.
 */
class IjinSearch extends Ijin
{
    /**
     * @inheritdoc
     */
    public $nama_pegawai;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nip', 'tanggal_awal','tanggal_akhir', 'keterangan', 'nama_pegawai'], 'safe'],
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
        $query = Ijin::find()
        ->innerJoin("pegawai", "pegawai.nip = ijin.nip");

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
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir,
            
        ]);

        $query->andFilterWhere(['like', 'nip', $this->nip])
        ->andFilterWhere(['like', 'pegawai.nama', $this->nama_pegawai])
  
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
