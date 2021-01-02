<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\depress\models\Profile */


?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form22', [
        'model' => $model,
    ]) ?>

</div>
