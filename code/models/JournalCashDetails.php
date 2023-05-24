<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_cash_details".
 *
 * @property int $details_id
 * @property string $type
 * @property string $account_code
 * @property string $account_name
 * @property string $amount
 * @property int $journal_id
 * @property int $ledger_id
 * @property int $journal_type
 *
 * @property GeneralLedger $ledger
 * @property JournalEntry $journal
 */
class JournalCashDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_cash_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'account_code', 'account_name', 'amount'], 'required'],
            [['type', 'account_code', 'account_name'], 'string'],
            [['amount'], 'number'],
            [['ledger_id', 'journal_type'], 'default', 'value' => null],
            [['ledger_id', 'journal_type'], 'integer'],
            [['ledger_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeneralLedger::className(), 'targetAttribute' => ['ledger_id' => 'ledger_id']],
            [['journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => JournalEntry::className(), 'targetAttribute' => ['journal_id' => 'journal_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'details_id' => 'Details ID',
            'type' => 'Type',
            'account_code' => 'Account Code',
            'account_name' => 'Account Name',
            'amount' => 'Amount',
            'journal_id' => 'Journal ID',
            'ledger_id' => 'Ledger ID',
            'journal_type' => 'Journal Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLedger()
    {
        return $this->hasOne(GeneralLedger::className(), ['ledger_id' => 'ledger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournal()
    {
        return $this->hasOne(JournalEntry::className(), ['journal_id' => 'journal_id']);
    }
}
