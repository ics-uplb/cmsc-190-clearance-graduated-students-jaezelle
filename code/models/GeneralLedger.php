<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "general_ledger".
 *
 * @property int $ledger_id
 * @property string $account_code
 * @property string $account_name
 * @property int $account_code_type
 * @property int $active
 *
 * @property JournalCashDetails[] $journalCashDetails
 * @property JournalDetailsCashReceipt[] $journalDetailsCashReceipts
 * @property JournalDetailsGeneral[] $journalDetailsGenerals
 * @property TrialBalance[] $trialBalances
 */
class GeneralLedger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'general_ledger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_code', 'account_name'], 'required'],
            [['account_code', 'account_name'], 'string'],
            [['account_code_type', 'active'], 'default', 'value' => null],
            [['account_code_type', 'active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ledger_id' => 'Ledger ID',
            'account_code' => 'Account Code',
            'account_name' => 'Account Name',
            'account_code_type' => 'Account Code Type',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournalCashDetails()
    {
        return $this->hasMany(JournalCashDetails::className(), ['ledger_id' => 'ledger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournalDetailsCashReceipts()
    {
        return $this->hasMany(JournalDetailsCashReceipt::className(), ['ledger_id' => 'ledger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournalDetailsGenerals()
    {
        return $this->hasMany(JournalDetailsGeneral::className(), ['ledger_id' => 'ledger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrialBalances()
    {
        return $this->hasMany(TrialBalance::className(), ['ledger_id' => 'ledger_id']);
    }
}
