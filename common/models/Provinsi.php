<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $id
 * @property string $nama
 *
 * @property KontributorPangan[] $kontributorPangans
 * @property Kota[] $kotas
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 2],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontributorPangans()
    {
        return $this->hasMany(KontributorPangan::className(), ['provinsi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKotas()
    {
        return $this->hasMany(Kota::className(), ['provinsi_id' => 'id']);
    }
}
