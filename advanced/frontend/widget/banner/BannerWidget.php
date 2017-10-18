<?php
namespace frontend\widget\banner;

use Yii;
use yii\bootstrap\Widget;

class BannerWidget extends  Widget
{
    public $item = [];

    public function init()
    {
        if (empty($itm)){
        $this->item = [
            [
                'label' => 'demo1',
                'image_url' => '/static/image/banner/timg.jpg',
                'url' => ['site/index'],
                'html' => '',
                'active' => 'active',
            ],
            [
                'label' => 'demo1',
                'image_url' => '/static/image/banner/timg.jpg',
                'url' => ['site/index'],
                'html' => '',
                'active' => '',
            ],
            [
                'label' => 'demo1',
                'image_url' => '/static/image/banner/timg.jpg',
                'url' => ['site/index'],
                'html' => '',
                'active' => '',
            ],
        ];
        }
    }

    public function run()
    {
        $data['item'] = $this->item;
        return $this->render('index', ['data' => $data]);
    }
}