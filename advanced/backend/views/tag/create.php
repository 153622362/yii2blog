<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TagModel */

$this->title = '标签管理';
$this->params['breadcrumbs'][] = ['label' => '标签管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '创建标签', 'url' => ['index']];
?>
<div class="tag-model-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
