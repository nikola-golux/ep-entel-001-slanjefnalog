<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pracenje".
 *
 * @property integer $id
 * @property string $kada
 * @property string $odakle
 * @property string $paket
 * @property string $tabela
 * @property integer $id_tabele
 * @property string $doznaka
 * @property string $ko
 * @property string $operacija
 * @property string $rez_operacije
 */
class Pracenje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pracenje';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kada'], 'safe'],
            [['id_tabele'], 'integer'],
            [['odakle', 'paket', 'tabela', 'doznaka', 'ko', 'operacija', 'rez_operacije'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kada' => 'Kada',
            'odakle' => 'Odakle',
            'paket' => 'Paket',
            'tabela' => 'Tabela',
            'id_tabele' => 'Id Tabele',
            'doznaka' => 'Doznaka',
            'ko' => 'Ko',
            'operacija' => 'Operacija',
            'rez_operacije' => 'Rez Operacije',
        ];
    }
}
