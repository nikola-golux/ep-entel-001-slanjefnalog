<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pracenje;

/**
 * PracenjeSearch represents the model behind the search form about `app\models\Pracenje`.
 */
class PracenjeSearch extends Pracenje
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tabele'], 'integer'],
            [['kada', 'odakle', 'paket', 'tabela', 'doznaka', 'ko', 'operacija', 'rez_operacije'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pracenje::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'kada' => $this->kada,
            'id_tabele' => $this->id_tabele,
        ]);

        $query->andFilterWhere(['like', 'odakle', $this->odakle])
            ->andFilterWhere(['like', 'paket', $this->paket])
            ->andFilterWhere(['like', 'tabela', $this->tabela])
            ->andFilterWhere(['like', 'doznaka', $this->doznaka])
            ->andFilterWhere(['like', 'ko', $this->ko])
            ->andFilterWhere(['like', 'operacija', $this->operacija])
            ->andFilterWhere(['like', 'rez_operacije', $this->rez_operacije]);

        return $dataProvider;
    }
}
