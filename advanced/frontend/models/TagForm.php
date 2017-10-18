<?php
namespace frontend\models;

use common\models\TagModel;
use yii\base\Exception;
use yii\base\Model;

class TagForm extends  Model
{
    public $id;
    public $tags;

    public  function rules()
    {
        return [
            ['tags', 'required'],
            ['tags', 'each', 'rule'=>['string']],
        ];
    }
    //保存标签
    public  function saveTags()
    {
        $ids = [];
        if (!empty($this->tags)){
            foreach ($this->tags as  $tag){
                    $ids[] = $this->_saveTag($tag);
            }
        }
        return $ids;
    }
    //保存标签
    private function _saveTag($tag)
    {
        $tagmodel = new TagModel();
        $res  = $tagmodel->find()->where(['tag_name' => $tag])->one(); //查询当前标签是否存在
        if (!$res){
//            新建标签
            $tagmodel->tag_name = $tag;
            $tagmodel->post_num = 1;
            $result =$tagmodel->save();
            if (!$result){
                throw new Exception('保存标签失败!');
            }
            return $tagmodel->id;
        }else{
            $res->updateCounters(['post_num'=>1]);
            return $res->id;
        }


    }
}