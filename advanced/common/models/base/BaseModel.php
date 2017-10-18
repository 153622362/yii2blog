<?php 
namespace common\models\base;

use Yii;
use yii\db\ActiveRecord;

/**
* 基础模型
*/
class BaseModel extends ActiveRecord
{
    //获取分页数据
    /**
     * @param array $query 查询条件
     * @param int $curPage 当前页
     * @param int $pageSize 一页显示记录数
     */
	public function getPages($query, $curPage = 1, $pageSize = 10, $search =null)
    {
        if ($search)
            $query = $query->andFilterWhere($search); //添加额外条件，如果为空则忽略
        $data['count'] = $query->count(); //返回记录数
        if (!$data['count']){
            return ['count' => 0, 'curPage'=>$curPage, 'pageSize' => $pageSize, 'start'=>'0', 'end'=> 0, 'data' => [],];
        }
        //超过实际页数，不取curPage为当前页
        $curPage = (ceil($data['count'] / $pageSize) < $curPage)? ceil($data['count'] / $pageSize):$curPage; //如果取到的数据记录/单页记录小于当前页 则取当前页 否则取末页

        //当前页
        $data['curPage'] = $curPage;
        //每页显示条数
        $data['pageSize'] = $pageSize;
        //起始页
        $data['start'] = ($curPage-1) * $pageSize +1;
        //末页
        $data ['end'] = (ceil($data['count'] / $pageSize) ==  $curPage ) ? $data['count'] : ($curPage-1) * $pageSize + $pageSize;
        //数据
        $data['data'] = $query
            ->offset(($curPage-1) * $pageSize) //取数据记录偏移量
            ->limit($pageSize) //限制条数
            ->asArray()
            ->all();
        return $data;

    }
}
 ?>