<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slanjefajlovi".
 *
 * @property integer $id
 * @property integer $id_slanjefnalog
 * @property string $ime_fajla
 * @property string $mesto
 * @property integer $size_MB
 * @property string $datvrem
 * @property string $datvrem_del
 * @property string $file_route
 *
 * @property Slanjefnalog $idSlanjefnalog
 */
class Slanjefajlovi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slanjefajlovi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_slanjefnalog'], 'required'],
            [['id_slanjefnalog', 'size_MB'], 'integer'],
            [['datvrem', 'datvrem_del'], 'safe'],
            [['ime_fajla'], 'string', 'max' => 255],
            [['mesto'], 'string', 'max' => 500],
            [['file_route'], 'string', 'max' => 12],
            [['id_slanjefnalog', 'ime_fajla'], 'unique', 'targetAttribute' => ['id_slanjefnalog', 'ime_fajla'], 'message' => 'The combination of Id Slanjefnalog and Ime Fajla has already been taken.'],
            [['id_slanjefnalog'], 'exist', 'skipOnError' => true, 'targetClass' => Slanjefnalog::className(), 'targetAttribute' => ['id_slanjefnalog' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_slanjefnalog' => 'Id Slanjefnalog',
            'ime_fajla' => 'Ime Fajla',
            'mesto' => 'Mesto',
            'size_MB' => 'Size  Mb',
            'datvrem' => 'Datvrem',
            'datvrem_del' => 'Datvrem Del',
            'file_route' => 'File Route',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSlanjefnalog()
    {
        return $this->hasOne(Slanjefnalog::className(), ['id' => 'id_slanjefnalog']);
    }
}
