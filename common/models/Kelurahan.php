<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kelurahan".
 *
 * @property string $id
 * @property string $kecamatan_id
 * @property string $nama
 *
 * @property Kecamatan $kecamatan
 * @property KontributorPangan[] $kontributorPangans
 */
class Kelurahan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelurahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kecamatan_id', 'nama'], 'required'],
            [['id'], 'string', 'max' => 10],
            [['kecamatan_id'], 'string', 'max' => 7],
            [['nama'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['kecamatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['kecamatan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kecamatan_id' => 'Kecamatan ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'kecamatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontributorPangans()
    {
        return $this->hasMany(KontributorPangan::className(), ['kelurahan' => 'id']);
    }
}
