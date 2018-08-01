<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $id
 * @property string $kota_id
 * @property string $nama
 *
 * @property Kota $kota
 * @property Kelurahan[] $kelurahans
 * @property KontributorPangan[] $kontributorPangans
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kota_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 7],
            [['kota_id'], 'string', 'max' => 4],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['kota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['kota_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kota_id' => 'Kota ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKota()
    {
        return $this->hasOne(Kota::className(), ['id' => 'kota_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahans()
    {
        return $this->hasMany(Kelurahan::className(), ['kecamatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontributorPangans()
    {
        return $this->hasMany(KontributorPangan::className(), ['kecamatan' => 'id']);
    }
}
