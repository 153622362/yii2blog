<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserModel */

$this->title = '会员管理';
$this->params['breadcrumbs'][] = ['label' => '会员信息', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-model-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
