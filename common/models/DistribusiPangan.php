<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "distribusi_pangan".
 *
 * @property int $id
 * @property int $kontributor_pangan_id
 * @property string $tanggal
 * @property string $bahan_pangan
 * @property double $stok_rata2
 * @property string $satuan_stok
 * @property double $harga_rata2
 *
 * @property KontributorPangan $kontributorPangan
 */
class DistribusiPangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'distribusi_pangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kontributor_pangan_id', 'tanggal', 'bahan_pangan', 'stok_rata2', 'satuan_stok', 'harga_rata2'], 'required'],
            [['kontributor_pangan_id'], 'integer'],
            [['tanggal'], 'safe'],
            [['stok_rata2', 'harga_rata2'], 'number'],
            [['bahan_pangan'], 'string', 'max' => 30],
            [['satuan_stok'], 'string', 'max' => 5],
            [['kontributor_pangan_id'], 'exist', 'skipOnError' => true, 'targetClass' => KontributorPangan::className(), 'targetAttribute' => ['kontributor_pangan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kontributor_pangan_id' => 'Kontributor Pangan ID',
            'tanggal' => 'Tanggal',
            'bahan_pangan' => 'Bahan Pangan',
            'stok_rata2' => 'Stok Rata2',
            'satuan_stok' => 'Satuan Stok',
            'harga_rata2' => 'Harga Rata2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontributorPangan()
    {
        return $this->hasOne(KontributorPangan::className(), ['id' => 'kontributor_pangan_id']);
    }
}
