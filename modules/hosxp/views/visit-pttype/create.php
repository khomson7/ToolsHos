<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hosxp\models\VisitPttype */

$this->title = 'Create Visit Pttype';
$this->params['breadcrumbs'][] = ['label' => 'Visit Pttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-pttype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
