<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kontributor_pangan".
 *
 * @property int $id
 * @property string $nik
 * @property string $npwp
 * @property string $nama_lengkap
 * @property string $no_handphone
 * @property string $email
 * @property string $provinsi
 * @property string $kota
 * @property string $kecamatan
 * @property string $kelurahan
 * @property int $rt
 * @property int $rw
 * @property int $kode_pos
 * @property string $lat
 * @property string $lng
 * @property int $user_id
 *
 * @property DistribusiPangan[] $distribusiPangans
 * @property Kota $kota0
 * @property Kecamatan $kecamatan0
 * @property Kelurahan $kelurahan0
 * @property SumberPangan[] $sumberPangans
 */
class KontributorPangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kontributor_pangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'npwp', 'nama_lengkap', 'no_handphone', 'email', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'rt', 'rw', 'kode_pos', 'lat', 'lng'], 'required'],
            [['rt', 'rw', 'kode_pos', 'user_id'], 'integer'],
            [['nik', 'npwp', 'nama_lengkap', 'lat', 'lng'], 'string', 'max' => 100],
            [['no_handphone'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['nik'], 'unique'],
            [['npwp'], 'unique'],
            [['no_handphone'], 'unique'],
            [['email'], 'unique'],
            [['kota'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['kota' => 'id']],
            [['kecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['kecamatan' => 'id']],
            [['kelurahan'], 'exist', 'skipOnError' => true, 'targetClass' => Kelurahan::className(), 'targetAttribute' => ['kelurahan' => 'id']],
            [['email'], 'email'],
            [['nik'], 'string', 'min' => 16],
            [['npwp'], 'string', 'min' => 15],
            [['nama_lengkap'], 'string', 'min' => 1],
            [['no_handphone'], 'string', 'min' => 12],
            [['kode_pos'], 'string', 'min' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nomor Induk Kependudukan',
            'npwp' => 'Nomor Pokok Wajib Pajak',
            'nama_lengkap' => 'Nama Lengkap',
            'no_handphone' => 'No Handphone',
            'email' => 'Email',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota / Kabupaten',
            'kecamatan' => 'Kecamatan',
            'kelurahan' => 'Desa / Kelurahan',
            'rt' => 'Rukun Tetangga',
            'rw' => 'Rukun Warga',
            'kode_pos' => 'Kode Pos',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistribusiPangans()
    {
        return $this->hasMany(DistribusiPangan::className(), ['kontributor_pangan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi0()
    {
        return $this->hasOne(Provinsi::className(), ['id' => 'provinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKota0()
    {
        return $this->hasOne(Kota::className(), ['id' => 'kota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan0()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'kecamatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahan0()
    {
        return $this->hasOne(Kelurahan::className(), ['id' => 'kelurahan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSumberPangans()
    {
        return $this->hasMany(SumberPangan::className(), ['kontributor_pangan_id' => 'id']);
    }
}
