<?php
$this->title = '创建文章';
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['post/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title">
            <span>创建文章</span>
        </div>
        <div class="panel-body">
            <?php $form = \yii\widgets\ActiveForm::begin() ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'cat_id')->dropDownList($cats) ?>
            <?= $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload',[
                'config'=>[]
            ]) ?>
            <?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',['options' => ['initialFrameHeight' => 550,'toolbars' => []]]) ?>
            <?= $form->field($model, 'tags')->widget('common\widgets\tags\TagWidget') ?>
            <div class="from-grop">
                <?=\yii\helpers\Html::submitButton('发布',['class'=>'btn btn-success']) ?>
            </div>
            <?php \yii\widgets\ActiveForm::end()?>


        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel-title box-title">
            <span>注意事项</span>
        </div>
        <div class="panel-body">
            <p>1.</p>
            2.
        </div>
    </div>
</div>
