<?php

namespace app\controllers;
use yii\web\Request;
use Yii;
use yii\web\Controller;

class TerminalController extends Controller
{
	public function beforeAction($action)
{
    if ($action->id == 'index') { // Здесь указывается имя вашего действия
        $this->enableCsrfValidation = false;
    }

    return parent::beforeAction($action);
}
    public function actionIndex()
{
    // Проверяем, авторизован ли пользователь
	if (!Yii::$app->user->isGuest) {
	$data = Yii::$app->request->post();
        // Отображаем файловый менеджер
	return $this->render('index',['data' => $data]);
    } else {
        // Перенаправляем неавторизованных пользователей на страницу авторизации
        return $this->redirect(['site/login']);
    }
    }
}
