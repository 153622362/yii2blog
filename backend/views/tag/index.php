<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '标签管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-model-index">



    <p>
        <?= Html::a('创建标签', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tag_name',
            'post_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
