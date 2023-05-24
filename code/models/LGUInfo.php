<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "LGU_info".
 *
 * @property integer $LGU_id
 * @property string $LGU_name
 */
class LGUInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LGU_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LGU_id', 'LGU_name'], 'required'],
            [['LGU_id'], 'integer'],
            [['LGU_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LGU_id' => 'Lgu ID',
            'LGU_name' => 'Lgu Name',
        ];
    }
}
