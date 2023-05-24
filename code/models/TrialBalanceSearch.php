<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrialBalance;

/**
 * TrialBalanceSearch represents the model behind the search form about `app\models\TrialBalance`.
 */
class TrialBalanceSearch extends TrialBalance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tb_id', 'ledger_id'], 'integer'],
            [['amount_debit', 'amount_credit'], 'number'],
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
        $query = TrialBalance::find();

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
            'tb_id' => $this->tb_id,
            'amount_debit' => $this->amount_debit,
            'ledger_id' => $this->ledger_id,
            'amount_credit' => $this->amount_credit,
        ]);

        return $dataProvider;
    }
}
