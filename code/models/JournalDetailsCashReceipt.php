<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_details_cash_receipt".
 *
 * @property int $details_id
 * @property int $receipts_type
 * @property int $type
 * @property string $account_code
 * @property string $account_name
 * @property string $amount
 * @property int $journal_receipts_id
 * @property int $ledger_id
 *
 * @property GeneralLedger $ledger
 * @property JournalEntryCashReceipt $journalReceipts
 */
class JournalDetailsCashReceipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_details_cash_receipt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receipts_type', 'type', 'account_code', 'account_name', 'amount'], 'required'],
            [['receipts_type', 'type', 'journal_receipts_id', 'ledger_id'], 'default', 'value' => null],
            [['receipts_type', 'type', 'journal_receipts_id', 'ledger_id'], 'integer'],
            [['account_code', 'account_name'], 'string'],
            [['amount'], 'number'],
            [['ledger_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeneralLedger::className(), 'targetAttribute' => ['ledger_id' => 'ledger_id']],
            [['journal_receipts_id'], 'exist', 'skipOnError' => true, 'targetClass' => JournalEntryCashReceipt::className(), 'targetAttribute' => ['journal_receipts_id' => 'journal_receipts_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'details_id' => 'Details ID',
            'receipts_type' => 'Receipts Type',
            'type' => 'Type',
            'account_code' => 'Account Code',
            'account_name' => 'Account Name',
            'amount' => 'Amount',
            'journal_receipts_id' => 'Journal Receipts ID',
            'ledger_id' => 'Ledger ID',
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
    public function getJournalReceipts()
    {
        return $this->hasOne(JournalEntryCashReceipt::className(), ['journal_receipts_id' => 'journal_receipts_id']);
    }
}
