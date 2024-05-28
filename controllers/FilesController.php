<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class FilesController extends Controller
{
    public function actionIndex()
{
    // Проверяем, авторизован ли пользователь
    if (!Yii::$app->user->isGuest) {
        // Отображаем файловый менеджер
        return $this->render('index');
    } else {
        // Перенаправляем неавторизованных пользователей на страницу авторизации
        return $this->redirect(['site/login']);
    }
    }
}
