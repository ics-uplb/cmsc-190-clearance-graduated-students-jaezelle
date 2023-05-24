<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_date_generated".
 *
 * @property integer $id
 * @property string $start_date
 * @property string $end_date
 */
class TbDateGenerated extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_date_generated';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'start_date', 'end_date'], 'required'],
            [['id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }
}
