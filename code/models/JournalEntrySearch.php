<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JournalEntry;

/**
 * JournalEntrySearch represents the model behind the search form about `app\models\JournalEntry`.
 */
class JournalEntrySearch extends JournalEntry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'jev_number', 'payee', 'particulars'], 'safe'],
            [['check_number', 'journal_id', 'journal_type'], 'integer'],
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
    public function search($params, $journal_type)
    {
        $query = JournalEntry::find();

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
            //'date' => $this->date,
            //'check_number' => $this->check_number,
            //'journal_id' => $this->journal_id,
            'journal_type' => $journal_type,
        ]);

        $query->andFilterWhere(['like', 'jev_number', $this->jev_number])
            ->andFilterWhere(['like', 'payee', $this->payee])
            ->andFilterWhere(['like', 'particulars', $this->particulars]);

        return $dataProvider;
    }
}