<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction_number".
 *
 * @property string $transaction_number_id
 * @property integer $transaction_number_value
 */
class TransactionNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaction_number_value'], 'required'],
            [['transaction_number_value'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaction_number_id' => 'Transaction Number ID',
            'transaction_number_value' => 'Transaction Number Value',
        ];
    }
}
