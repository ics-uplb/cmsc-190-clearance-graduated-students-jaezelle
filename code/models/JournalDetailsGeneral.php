<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_details_general".
 *
 * @property int $details_id
 * @property string $account_name
 * @property string $account_code
 * @property int $type
 * @property string $amount
 * @property int $journal_general_id
 * @property int $ledger_id
 *
 * @property GeneralLedger $ledger
 * @property JournalEntryGeneral $journalGeneral
 */
class JournalDetailsGeneral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_details_general';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_name', 'account_code', 'type', 'amount'], 'required'],
            [['account_name', 'account_code'], 'string'],
            [['type', 'journal_general_id', 'ledger_id'], 'default', 'value' => null],
            [['type', 'journal_general_id', 'ledger_id'], 'integer'],
            [['amount'], 'number'],
            [['ledger_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeneralLedger::className(), 'targetAttribute' => ['ledger_id' => 'ledger_id']],
            [['journal_general_id'], 'exist', 'skipOnError' => true, 'targetClass' => JournalEntryGeneral::className(), 'targetAttribute' => ['journal_general_id' => 'journal_general_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'details_id' => 'Details ID',
            'account_name' => 'Account Name',
            'account_code' => 'Account Code',
            'type' => 'Type',
            'amount' => 'Amount',
            'journal_general_id' => 'Journal General ID',
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
    public function getJournalGeneral()
    {
        return $this->hasOne(JournalEntryGeneral::className(), ['journal_general_id' => 'journal_general_id']);
    }
}
