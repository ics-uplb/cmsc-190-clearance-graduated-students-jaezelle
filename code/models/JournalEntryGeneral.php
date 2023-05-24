<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_entry_general".
 *
 * @property int $journal_general_id
 * @property string $date
 * @property string $jev_number
 */
class JournalEntryGeneral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_entry_general';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['jev_number'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'journal_general_id' => 'Journal General ID',
            'date' => 'Date',
            'jev_number' => 'Jev Number',
        ];
    }
}
