<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JournalEntryGeneral;

/**
 * JournalEntryGeneralSearch represents the model behind the search form of `app\models\JournalEntryGeneral`.
 */
class JournalEntryGeneralSearch extends JournalEntryGeneral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['journal_general_id'], 'integer'],
            [['date', 'jev_number'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = JournalEntryGeneral::find();

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
            'journal_general_id' => $this->journal_general_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['ilike', 'jev_number', $this->jev_number]);

        return $dataProvider;
    }
}
