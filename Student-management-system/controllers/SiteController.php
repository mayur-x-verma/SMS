<?php

namespace app\controllers;

use app\models\AdminLoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\ContactForm;
use app\models\StudentMaster;
use app\models\StudentMasterSearch;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'], // restrict these actions
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // '@' = any authenticated user
                    ],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    /**
     * Handles the admin login functionality.
     *
     * If the user is already logged in, they are redirected to the homepage.
     * Otherwise, it validates the login form and logs in the admin user.
     *
     * @return Response|string Redirects to the previous page or renders the login view.
     */
    public function actionLogin()
    {
        $model = new AdminLoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['registration']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegistration()
    {
        $model = new StudentMaster();

        if ($model->load(Yii::$app->request->post())) {
            // echo "<pre>"; print_r(value: $model); echo "</pre>"; exit;
            // $model->Gender = implode($model->Gender); 
            $model->Gender = implode(',', $model->Gender);  // Results in: "Male,Other"

            // echo "<pre>";
            // print_r(value: $model);
            // echo "</pre>";
            // exit;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Registration successful!');
                return $this->redirect(['student-list', 'id' => $model->id]);
            }
            // return $this->redirect(['view', 'id' => $model->id]); // or any success page
        }

        return $this->render('registration', [
            'model' => $model,
        ]);



    }
    /**
     * Displays a single StudentMaster model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionStudentList($id)
    {
        try {
            $searchModel = new StudentMasterSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('studentList', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } catch (\Exception $e) {
            // Log the error
            Yii::error("Exception in actionStudentList: " . $e->getMessage(), __METHOD__);

            // Optionally show a basic error message to the user
            return $this->render('error', [
                'name' => 'Error loading student list',
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function actionView($id)
    {
        $model = StudentMaster::findOne($id);

        if (!$model) {
            Yii::error("Model not found for ID: $id", __METHOD__);
            throw new NotFoundHttpException('The requested student does not exist.');
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::info("Model successfully updated for ID: $id", __METHOD__);
                return $this->render('view', [
                    'model' => $model,
                ]);
            } else {
                Yii::error("Failed to save model for ID: $id", __METHOD__);
            }
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new StudentMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StudentMaster();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['registration', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StudentMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->Gender = implode(',', $model->Gender);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'update successfull!');
                return $this->redirect(['student-list', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'update failed!');
                return $this->redirect(['student-list', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StudentMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Deleted student with id: ' . $id);
        return $this->redirect(['student-list', 'id' => $this->id]);
    }

    /**
     * Finds the StudentMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return StudentMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)
    {
        if (($model = StudentMaster::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
