<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PostModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Post Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'summary',
            //'content:ntext',
            //'label_img',
            'cat.cat_name',
            'user_id',
            'user_name',
            'is_valid'=> [
                'attribute' => 'is_valid',
                'value' => function($model){
                    return ($model->is_valid == 1) ? '有效':'无效';
                },
                'filter' => ['1'=>'有效','0'=>'无效'],
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
