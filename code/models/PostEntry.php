<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_entry".
 *
 * @property int $post_id
 * @property int $journal_id
 *
 * @property JournalEntry $journal
 */
class PostEntry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_entry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['journal_id'], 'default', 'value' => null],
            [['journal_id'], 'integer'],
            [['journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => JournalEntry::className(), 'targetAttribute' => ['journal_id' => 'journal_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'journal_id' => 'Journal ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournal()
    {
        return $this->hasOne(JournalEntry::className(), ['journal_id' => 'journal_id']);
    }
}
