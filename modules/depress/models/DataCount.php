<?php

namespace app\modules\depress\models;

use Yii;

/**
 * This is the model class for table "data_count".
 *
 * @property int $id
 * @property int|null $data_count
 * @property string|null $date_count
 * @property int|null $process_id
 */
class DataCount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_count';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_count', 'process_id'], 'integer'],
            [['date_count'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_count' => 'Data Count',
            'date_count' => 'Date Count',
            'process_id' => 'Process ID',
        ];
    }
}
