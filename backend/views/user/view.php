<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-model-view">


    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
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
            'id:raw:ID',
            'username:raw:用户名',
            'auth_key:raw:认证码',
//            'password_hash',
//            'password_reset_token',
            'email_validate_token:email:邮箱校验码',
            'email:email:邮箱',
            'role:raw:角色',
            'status:raw:账号状态',
//            'avatar',
            'vip_lv:raw:VIP等级',
            'created_at:datetime:创建时间',
            'updated_at:datetime:更新时间',
        ],
    ]) ?>

</div>
