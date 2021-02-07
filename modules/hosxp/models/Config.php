<?php

namespace app\modules\hosxp\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property int $id
 * @property string|null $hospcode
 * @property string|null $befor_byear
 * @property string|null $byear
 * @property string|null $chwpart
 * @property string|null $amppart
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['befor_byear', 'byear'], 'safe'],
            [['hospcode'], 'string', 'max' => 5],
            [['chwpart', 'amppart'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hospcode' => 'รหัสหน่วยบริการ',
            'befor_byear' => 'Befor Byear',
            'byear' => 'Byear',
            'chwpart' => 'รหัสจังหวัด',
            'amppart' => 'รหัสอำเภอ',
        ];
    }
}
