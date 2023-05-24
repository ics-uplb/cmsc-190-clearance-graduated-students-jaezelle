<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_entry_cash_receipt".
 *
 * @property int $journal_receipts_id
 * @property string $date
 * @property string $jev_number
 * @property string $collecting_offices
 *
 * @property JournalDetailsCashReceipt[] $journalDetailsCashReceipts
 */
class JournalEntryCashReceipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_entry_cash_receipt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['jev_number', 'collecting_offices'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'journal_receipts_id' => 'Journal Receipts ID',
            'date' => 'Date',
            'jev_number' => 'Jev Number',
            'collecting_offices' => 'Collecting Offices',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournalDetailsCashReceipts()
    {
        return $this->hasMany(JournalDetailsCashReceipt::className(), ['journal_receipts_id' => 'journal_receipts_id']);
    }
}
