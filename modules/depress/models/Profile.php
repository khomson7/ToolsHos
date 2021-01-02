<?php

namespace app\modules\depress\models;

use Yii;

use app\models\MyActiveReccord;


class Profile extends \app\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id','data_count'], 'integer'],
            [['bio'], 'string'],
            [['b_date', 'e_date'], 'safe'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
            [['gravatar_id'], 'string', 'max' => 32],
            [['timezone'], 'string', 'max' => 40],
            [['doctor_code'], 'string', 'max' => 15],
           // [['user_id'], 'unique'],
          //  [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ชื่อผู้ใช้งาน',
            'name' => 'Name',
            'public_email' => 'Public Email',
            'gravatar_email' => 'Gravatar Email',
            'gravatar_id' => 'Gravatar ID',
            'location' => 'Location',
            'website' => 'Website',
            'bio' => 'Bio',
            'timezone' => 'Timezone',
            'doctor_code' => 'Doctor Code',
            'b_date' => 'วันที่บริการ',
            'e_date' => 'E Date',
             'data_count' => 'จำนวนรายการ',
        ];
    }
    
    public function attributeHints()
    {
        return [
            'b_date' => 'ตัวอยาง 13/05/2559',
            'e_date' => 'ตัวอย่าง 13/05/2559',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
