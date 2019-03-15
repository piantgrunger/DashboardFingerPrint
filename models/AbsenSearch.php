<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Absen;

/**
 * AbsenSearch represents the model behind the search form of `app\models\Absen`.
 */
class AbsenSearch extends Absen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'jam_masuk', 'jam_keluar', 'absen_datang', 'absen_keluar'], 'safe'],
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
    public function search($params, $lokasi)
    {
        $query = Absen::find()
        ->innerJoin("pegawai", "pegawai.nip = absen.nip")
        ->innerJoin("m_unit", "pegawai.unit_kerja = m_unit.id")
        ;

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


        $query->orderBy(new \yii\db\Expression(' case when jam_keluar="00:00:00" then jam_masuk else jam_keluar end desc'));

        // grid filtering conditions
        $query->andFilterWhere([
            'jam_masuk' => $this->jam_masuk,
            'jam_keluar' => $this->jam_keluar,
        ]);

        if (!is_null($lokasi)) {
            $query->andWhere(['or', ['absen_datang' =>$lokasi],['absen_keluar' =>$lokasi]]);
        }
        $query->andWhere(new \yii\db\Expression(" date_format(jam_masuk,'%y-%m-%d' ) = date_format(now(),'%y-%m-%d' )  "));

        $query->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'absen_datang', $this->absen_datang])
            ->andFilterWhere(['like', 'absen_keluar', $this->absen_keluar]);

        return $dataProvider;
    }
}
