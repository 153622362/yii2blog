<?php

/* @var $this yii\web\View */

$this->title = '博客-首页';
?>
<div class="row">
    <div class="col-lg-9">
<!--        轮播图组件-->
        <?=\frontend\widget\banner\BannerWidget::widget()?>
<!--        文章组件-->
        <?=\frontend\widget\post\PostWidget::widget()?>
    </div>
    <div class="col-lg-3">
<!--        聊天窗口组件-->
        <?=\frontend\widget\chat\ChatWidget::widget()?>
<!--        热门浏览组件-->
        <?=\frontend\widget\hot\HotWidget::widget()?>
<!--        标签云组件-->
        <?=\frontend\widget\tag\TagWidget::widget()?>
    </div>
</div>
