<?php
use frontend\widget\post\PostWidget;
use yii\base\Widget;
 ?>

<div class="row">
   <div class="col-lg-9">
    <?=PostWidget::widget()?>
   </div>
   <div class="col-lg-3">
       <?=\frontend\widget\hot\HotWidget::widget()?>
   </div>
</div>