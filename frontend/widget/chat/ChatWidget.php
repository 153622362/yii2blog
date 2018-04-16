<?php
namespace frontend\widget\chat;

use frontend\models\FeedForm;
use Yii;
use yii\bootstrap\Widget;

class ChatWidget extends Widget
{
    public $title = "";
    public function run()
    {

        $feed = new FeedForm();
        $data['feed'] = $feed->getList();
        $data['title'] = $this->title?:'只言片语';
        return $this->render('index',['data'=>$data]);
    }
}