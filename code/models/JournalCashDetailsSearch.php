<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JournalCashDetails;

/**
 * JournalCashDetailsSearch represents the model behind the search form about `app\models\JournalCashDetails`.
 */
class JournalCashDetailsSearch extends JournalCashDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['details_id', 'amount', 'journal_id'], 'integer'],
            [['type', 'account_code', 'account_name'], 'safe'],
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
        $query = JournalCashDetails::find();

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
            'amount' => $this->amount,
            'journal_id' => $this->journal_id,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'account_code', $this->account_code])
            ->andFilterWhere(['like', 'account_name', $this->account_name]);

        return $dataProvider;
    }
}
