<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trial_balance".
 *
 * @property int $tb_id
 * @property double $amount_debit
 * @property int $ledger_id
 * @property double $amount_credit
 * @property int $active
 *
 * @property TbTotalAmount[] $tbTotalAmounts
 * @property GeneralLedger $ledger
 */
class TrialBalance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trial_balance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount_debit', 'amount_credit'], 'number'],
            [['ledger_id', 'active'], 'default', 'value' => null],
            [['ledger_id', 'active'], 'integer'],
            [['ledger_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeneralLedger::className(), 'targetAttribute' => ['ledger_id' => 'ledger_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tb_id' => 'Tb ID',
            'amount_debit' => 'Amount Debit',
            'ledger_id' => 'Ledger ID',
            'amount_credit' => 'Amount Credit',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbTotalAmounts()
    {
        return $this->hasMany(TbTotalAmount::className(), ['tb_id' => 'tb_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLedger()
    {
        return $this->hasOne(GeneralLedger::className(), ['ledger_id' => 'ledger_id']);
    }
}
