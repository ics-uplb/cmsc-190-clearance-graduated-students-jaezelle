<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "financial_position".
 *
 * @property int $financial_position_id
 * @property int $ledger_id
 * @property int $major_code
 */
class FinancialPosition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'financial_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ledger_id', 'major_code'], 'default', 'value' => null],
            [['ledger_id', 'major_code'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'financial_position_id' => 'Financial Position ID',
            'ledger_id' => 'Ledger ID',
            'major_code' => 'Major Code',
        ];
    }
}
