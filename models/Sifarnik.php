<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sifarnik".
 *
 * @property integer $id
 * @property string $domen
 * @property string $domen1
 * @property integer $redosled
 * @property string $vrednost
 * @property string $napomena_eng
 * @property string $napomena
 */
class Sifarnik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sifarnik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'redosled'], 'integer'],
            [['domen1'], 'required'],
            [['domen', 'domen1', 'vrednost'], 'string', 'max' => 100],
            [['napomena_eng', 'napomena'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domen' => 'Domen',
            'domen1' => 'Domen1',
            'redosled' => 'Redosled',
            'vrednost' => 'Vrednost',
            'napomena_eng' => 'Napomena Eng',
            'napomena' => 'Napomena',
        ];
    }
}
