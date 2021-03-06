<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'distribusi-pangan'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    Yii::$app->session->setFlash('success', 'Pendaftaran user berhasil');
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionKontributorPangan()
    {
        $model = new \common\models\KontributorPangan();

        $provinsis = \common\models\Provinsi::find()->select(['nama', 'id'])
          ->indexBy('id')
          ->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Pendaftaran berhasil dilakukan, Akun akan diberikan melalui email Anda");
            return $this->redirect(['index']);
        }

        return $this->render('formKontributorPangan', [
            'model' => $model,
            'provinsis' => $provinsis,
        ]);
    }

    public function actionKab($id)
    {
        $kotas = \common\models\Kota::find()
                ->where(['provinsi_id' => $id])
                ->orderBy('id ASC')
                ->all();

        if ($kotas) {
            echo "<option> Pilih Kota / Kabupaten </option>";
            foreach($kotas as $kota) {
                echo "<option value='".$kota->id."'>" . $kota->nama."</option>";
            }
        } else
            echo "<option>-</option>";
    }

    public function actionKec($id)
    {
        $kecamatans = \common\models\Kecamatan::find()
                ->where(['kota_id' => $id])
                ->orderBy('id ASC')
                ->all();

        if ($kecamatans) {
            echo "<option> Pilih Kecamatan </option>";
            foreach($kecamatans as $kecamatan) {
                echo "<option value='".$kecamatan->id."'>".$kecamatan->nama."</option>";
            }
        } else
            echo "<option>-</option>";
    }

    public function actionDesa($id)
    {
        $kelurahans = \common\models\Kelurahan::find()
                ->where(['kecamatan_id' => $id])
                ->orderBy('id ASC')
                ->all();

        if ($kelurahans) {
            echo "<option> Pilih Desa / Kelurahan </option>";
            foreach($kelurahans as $kelurahan) {
                echo "<option value='".$kelurahan->id."'>".$kelurahan->nama."</option>";
            }
        } else
            echo "<option>-</option>";
    }

    public function actionDistribusiPangan()
    {
        $model = new \common\models\DistribusiPangan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Data berhasil dimasukkan");
            return $this->redirect(['index']);
        }

        return $this->render('formDistribusiPangan', [
            'model' => $model,
        ]);
    }

    public function actionPeta()
    {
        $model = new \common\models\KontributorPangan();
        $tanggal = '2018-07-31';

        $provinsis = \common\models\Provinsi::find()->select(['nama', 'id'])
          ->indexBy('id')
          ->column();

        return $this->render('peta', [
          'model' => $model,
          'provinsis' => $provinsis,
          'tanggal' => $tanggal,
        ]);
    }

    public function actionValidate()
    {
      if(null != (Yii::$app->request->post('test'))){
          $test = "Ajax Worked!";
          // do your query stuff here
      }else{
          $test = "Ajax failed";
          // do your query stuff here
      }

      // return Json
      return \yii\helpers\Json::encode($test);
    }
}
