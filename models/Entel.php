<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entel".
 *
 * @property integer $id
 * @property string $Last_name
 * @property string $First_name
 * @property string $user_name
 */
class Entel extends \yii\db\ActiveRecord
{
    //public $ime_i_prezime = $this->First_name." ".$this->Last_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Last_name', 'First_name', 'user_name'], 'string', 'max' => 100],
            [['ime_i_prezime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Last_name' => 'Last Name',
            'First_name' => 'First Name',
            'user_name' => 'User Name',
        ];
    }
}
