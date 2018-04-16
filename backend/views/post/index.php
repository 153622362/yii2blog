<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-model-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title' => [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model){
                        return '<a href="http://yii.imooc.test'.\yii\helpers\Url::to(['post/view','id' => $model->id]).'">'.$model->title.'</a>';
                },

            ],
            'summary',
            //'content:ntext',
            //'label_img',
             'cat_id',
            // 'user_id',
            'user_name',
             'is_valid'=> [
                 'attribute' => 'is_valid',
                 'value' => function($model){
                        return ($model->is_valid == 1) ? '有效':'无效';
                 },
                 'filter' => ['1'=>'有效','0'=>'无效'],
             ],
             'created_at:datetime',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
