<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CatModel */

$this->title = '创建分类';
$this->params['breadcrumbs'][] = ['label' => '分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-model-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
