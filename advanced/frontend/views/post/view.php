<?php
use yii\helpers\Html;
$this->title = $data['title'];
$this->params['breadcrumbs'][] = ['label'=>'文章','url'=>['post/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="page-title">
            <h1><?=$data['title']?></h1>
            <span>作者：<?=$data['user_name']?></span>
            <span>发布时间：<?=date('Y-m-d H:m:s',$data['created_at'])?></span>
            <span>浏览：<?=isset($data['extend']['browser'])?$data['extend']['browser']:0 ?></span>
        </div>
        <div class="page-content">
            <?=$data['content']?>
        </div>

        <div class="page-tag">
            标签:
            <?php foreach ($data['tag'] as $tag) : ?>
            <span class="btn btn-success btn-xs"><a href="#" style="color: whitesmoke" ><?=$tag?></a></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-lg-3">
        <?= Html::a('更新文章', ['update', 'id' => $data['id']], ['class' => 'btn btn-success btn-quirk btn-block']) ?>
        <a href="<?=\yii\helpers\Url::to(['post/create'])?>" class="btn btn-danger btn-quirk btn-block">创建文章</a>
        <?=\frontend\widget\hot\HotWidget::widget()?>
    </div>
</div>
