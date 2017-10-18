<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatModel */

$this->title = '分类管理 ';
$this->params['breadcrumbs'][] = ['label' => '分类管理', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="cat-model-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
