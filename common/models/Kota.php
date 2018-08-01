<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kota".
 *
 * @property string $id
 * @property string $provinsi_id
 * @property string $nama
 *
 * @property Kecamatan[] $kecamatans
 * @property KontributorPangan[] $kontributorPangans
 * @property Provinsi $provinsi
 */
class Kota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provinsi_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 4],
            [['provinsi_id'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinsi::className(), 'targetAttribute' => ['provinsi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provinsi_id' => 'Provinsi ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatans()
    {
        return $this->hasMany(Kecamatan::className(), ['kota_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontributorPangans()
    {
        return $this->hasMany(KontributorPangan::className(), ['kota' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'provinsi_id']);
    }
}
