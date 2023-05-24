<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JournalDetailsGeneral;

/**
 * JournalDetailsGeneralSearch represents the model behind the search form of `app\models\JournalDetailsGeneral`.
 */
class JournalDetailsGeneralSearch extends JournalDetailsGeneral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['details_id', 'type', 'general_journal_id', 'ledger_id'], 'integer'],
            [['account_name', 'account_code'], 'safe'],
            [['amount'], 'number'],
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
        $query = JournalDetailsGeneral::find();

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
            'details_id' => $this->details_id,
            'type' => $this->type,
            'amount' => $this->amount,
            'general_journal_id' => $this->general_journal_id,
            'ledger_id' => $this->ledger_id,
        ]);

        $query->andFilterWhere(['ilike', 'account_name', $this->account_name])
            ->andFilterWhere(['ilike', 'account_code', $this->account_code]);

        return $dataProvider;
    }
}
