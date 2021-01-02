<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\depress\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'user_id',
            'name',
          //  'public_email:email',
           // 'gravatar_email:email',
           // 'gravatar_id',
          //  'location',
          //  'website',
          //  'bio:ntext',
          //  'timezone',
            'doctor_code',
            'b_date',
          //  'e_date',
        ],
    ]) ?>
    
     <div class="panel panel-danger">
        <div class="panel panel-info">
            <div class="panel-heading"><h4> Provider: <?= $this->title ?></h4></div>
        </div>

         
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
               // 'model2' => $model2
            ])
            ?>

        </div>


    </div>

</div>
