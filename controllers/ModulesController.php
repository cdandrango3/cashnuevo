<?php

namespace app\controllers;

use app\models\ModRole;
use Yii;
use app\models\Modules;
use app\models\ModulesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Submodules;
use app\models\Role;
/**
 * ModulesController implements the CRUD actions for Modules model.
 */
class ModulesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Modules models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModulesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modules model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Modules model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Modules();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Modules model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Modules model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
      @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionGet(){
        /* I get to rol the query of the class model*/
        $role=New Role;
        /* */
        $mods=New ModRole;

        //$h=Role::find()->join('INNER JOIN','mod_role','id=id_module')->where(['is_enabled'=>true])->all();//
        $h=$role::find()->all();

        $Submodules=New submodules;
        $query="hola";
        $sub=$Submodules::find()
            ->select(['name'])
            ->where(['id_modules' => 1])
            ->all();
        if($role->load(yii::$app->request->post()) && $role->validate()){
            $roles=Role::findOne(["rolename"=> $role]);
            $modules=Modules::find()->select(["name"])->join("INNER JOIN",'mod_role',"id=id_module")->where(["id_roles"=>$roles["id"]])->all();
            return $this->render('get',["model"=>$query,"submodel"=>$sub,"module"=>$h,"role"=>$modules]);
        }

        return $this->render("get",["model"=>$query,"submodel"=>$sub,"module"=>$h,"role"=>""]);

    }
    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modules the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modules::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
