<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KontributorPangan;

/**
 * KontributorPanganSearch represents the model behind the search form of `common\models\KontributorPangan`.
 */
class KontributorPanganSearch extends KontributorPangan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rt', 'rw', 'kode_pos', 'user_id'], 'integer'],
            [['nik', 'npwp', 'nama_lengkap', 'no_handphone', 'email', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'lat', 'lng'], 'safe'],
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
        $query = KontributorPangan::find();

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
            'rt' => $this->rt,
            'rw' => $this->rw,
            'kode_pos' => $this->kode_pos,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'no_handphone', $this->no_handphone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'kota', $this->kota])
            ->andFilterWhere(['like', 'kecamatan', $this->kecamatan])
            ->andFilterWhere(['like', 'kelurahan', $this->kelurahan])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng]);

        return $dataProvider;
    }
}
