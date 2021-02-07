<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hosxp\models\Config */

$this->title = 'Update Config: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="config-update">


<div class="container p-3 my-3 bg-default text-white">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
