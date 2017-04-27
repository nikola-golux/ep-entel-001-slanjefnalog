<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slanjefnalog".
 *
 * @property integer $id
 * @property string $dmn_zemlja
 * @property string $id_entel
 * @property string $dmn_nivo_zastita
 * @property integer $dmn_cuvaj_dana
 * @property string $napomena
 * @property string $datvrem_mejl
 *
 * @property Slanjefajlovi[] $slanjefajlovis
 */
class Slanjefnalog extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slanjefnalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dmn_zemlja', 'id_entel', 'dmn_nivo_zastita'], 'required'],
            [['dmn_cuvaj_dana'], 'integer'],
            [['datvrem_mejl'], 'safe'],
            [['dmn_zemlja'], 'string', 'max' => 20],
            [['id_entel'], 'string', 'max' => 80],
            [['dmn_nivo_zastita'], 'string', 'max' => 1],
            [['napomena'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dmn_zemlja' => 'Zemlja',
            'id_entel' => 'Korisnik',
            'dmn_nivo_zastita' => 'Nivo bezbednosti',
            'dmn_cuvaj_dana' => 'Koliko dana cuvati podatke na serveru?',
            'napomena' => 'Napomena',
            'datvrem_mejl' => 'Datum postavke podataka na server',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlanjefajlovis()
    {
        return $this->hasMany(Slanjefajlovi::className(), ['id_slanjefnalog' => 'id']);
    }
}
