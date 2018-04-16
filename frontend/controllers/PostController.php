<?php 
namespace frontend\controllers;

/**
 *文章控制器
 */
use common\models\CatModel;
use common\models\PostExtendModel;
use common\models\PostModel;
use frontend\models\PostForm;
use Yii;
use frontend\controllers\base\BaseController;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class PostController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'upload', 'ueditor'], //仅检测这四个方法
                'rules' => [
                    [
                        'actions' => ['index'], //匿名可访问
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['create', 'upload', 'ueditor', 'index'], //登陆可访问
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    '*' => ['get', 'post'],  //所有方法都可以get/post传递
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],
             'ueditor'=>[
                 'class' => 'common\widgets\ueditor\UeditorAction',
                 'config' => [
                //上传图片配置
                 'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                 'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
        ]
    ]
        ];
    }
	/**
	 *文章列表
	 */

	public function actionIndex()
	{
		return $this->render('index');
	}
	public function actionCreate()
    {
        $postForm = new PostForm();

        $postForm->setScenario(PostForm::SCENARIO_CREATE);
        if ($postForm->load(Yii::$app->request->post()) && $postForm->validate()){
            if (!$postForm->create()){
                Yii::$app->session->setFlash('warning', $postForm->_lastError);
            }else{

                return $this->redirect(['post/view', 'id'=>$postForm->id]);
            }
        }
        //获取文章分类列表
        $cats = CatModel::getAllCats();
        return $this->render('create', ['model' => $postForm, 'cats' => $cats]);
    }
    /**
     * 文章详情
     */
    public  function actionView($id)
    {
        $model = new PostForm();
        $data = $model->getViewById($id);
        //文章统计
        $model = new PostExtendModel();
        $model->upCounter(['post_id'=> $id ], 'browser', 1);

        //获取文章分类列表
        $cats = CatModel::getAllCats();
        return $this->render('view',['data'=>$data,'cats'=>$cats]);

    }

    public function actionUpdate($id)
    {
        $model = new PostForm();
        $model->setScenario(PostForm::SCENARIO_CREATE);
        $model->getupdate($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            if (!$model->update($id)){
                Yii::$app->session->setFlash('warning', $model->_lastError);
            }else{
                return $this->redirect(['post/view','id'=>$model->id]);
            }
        }
        $cats = CatModel::getAllCats();

        return $this->render('update',['model'=>$model,'cats' => $cats]);

    }






}

 ?>