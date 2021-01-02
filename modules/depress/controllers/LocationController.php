<?php

namespace app\modules\depress\controllers;

use yii\rest\ActiveController;
use app\modules\depress\models\Location;





/**
 * LocationController implements the CRUD actions for Location model.
 */
class LocationController extends ActiveController
{
   
    public $modelClass = 'app\modules\depress\models\Location';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    
   
}
