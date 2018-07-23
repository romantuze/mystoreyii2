<?php
namespace app\controllers;
use Yii;
use app\models\Users;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;

class AuthController extends Controller 
{
	

	public function actionLogin() {

          //      Yii::$app->user->logout();
       
		if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
	}
   

    public function actionSignup()
    {
        $model = new SignupForm();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                return $this->redirect(['auth/login']);
            }
        }
        return $this->render('signup', ['model'=>$model]);
    }



	public function actionLogout() {
		Yii::$app->user->logout();
		return $this->goHome();
	}


    public function actionTest()
    {
        $user = Users::findOne(1);
        Yii::$app->user->logout();
        
        if(Yii::$app->user->isGuest)
        {
            echo 'Пользователь гость';
        }
        else
        {
            echo 'Пользователь Авторизован';
        }
    }

}