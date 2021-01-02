<?php

namespace app\modules\depress\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $country
 * @property string $city
 * @property float $latitude
 * @property float $longitude
 * @property float $altitude
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'city', 'latitude', 'longitude', 'altitude'], 'required'],
            [['latitude', 'longitude', 'altitude'], 'number'],
            [['country'], 'string', 'max' => 25],
            [['city'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'city' => 'City',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
        ];
    }
}
