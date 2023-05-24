<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_holder".
 *
 * @property integer $status_holder_id
 * @property integer $last_month_status
 * @property integer $today_month_status
 * @property integer $accept_status
 * @property string $date_holder
 * @property integer $constant_id
 */
class StatusHolder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_holder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_holder_id', 'last_month_status', 'today_month_status', 'accept_status', 'date_holder', 'constant_id'], 'required'],
            [['status_holder_id', 'last_month_status', 'today_month_status', 'accept_status', 'constant_id'], 'integer'],
            [['date_holder'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_holder_id' => 'Status Holder ID',
            'last_month_status' => 'Last Month Status',
            'today_month_status' => 'Today Month Status',
            'accept_status' => 'Accept Status',
            'date_holder' => 'Date Holder',
            'constant_id' => 'Constant ID',
        ];
    }
}
