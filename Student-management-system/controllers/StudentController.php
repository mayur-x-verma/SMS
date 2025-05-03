<?php

namespace app\controllers;

use app\models\StudentMaster;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\StudentLoginForm;

class StudentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
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

    public function actionStudentLogin()
    {
        $model = new StudentMaster();

        if (Yii::$app->request->isPost) {
            $postData = Yii::$app->request->post('StudentMaster');
            $rollNo = $postData['Roll_no'] ?? null;
            $dob = $postData['DOB'] ?? null;

            if ($rollNo && $dob) {
                $student = StudentMaster::findOne(['Roll_no' => $rollNo, 'DOB' => $dob]);
                if ($student) {
                    return $this->redirect(['student/student-report', 'id' => $student->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Invalid Roll No or Date of Birth.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Roll No and Date of Birth are required.');
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionStudentReport($id)
    {
        $model = StudentMaster::findOne($id);
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Student not found.');
        }

        return $this->render('studentReport', [
            'model' => $model,
        ]);
    }
}

