<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_entry".
 *
 * @property string $date
 * @property string $jev_number
 * @property string $payee
 * @property string $particulars
 * @property int $check_number
 * @property int $journal_id
 * @property int $journal_type
 * @property int $posted
 *
 * @property JournalCashDetails[] $journalCashDetails
 */
class JournalEntry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_entry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'jev_number', 'payee', 'particulars', 'check_number'], 'required'],
            [['date'], 'safe'],
            [['jev_number', 'payee', 'particulars'], 'string'],
            [['check_number', 'journal_type', 'posted'], 'default', 'value' => null],
            [['check_number', 'journal_type', 'posted'], 'integer'],
            [['check_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date' => 'Date',
            'jev_number' => 'Jev Number',
            'payee' => 'Payee',
            'particulars' => 'Particulars',
            'check_number' => 'Check Number',
            'journal_id' => 'Journal ID',
            'journal_type' => 'Journal Type',
            'posted' => 'Posted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournalCashDetails()
    {
        return $this->hasMany(JournalCashDetails::className(), ['journal_id' => 'journal_id']);
    }
}
