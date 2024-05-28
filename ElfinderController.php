<?php
namespace app\controllers;

use mihaildev\elfinder\PathController;

class ElfinderController extends PathController
{
    public function init()
    {
        //$this->access = ['admin']; // Укажите роли пользователей, которые могут использовать elFinder
        $this->root = [
            'baseUrl' => '@web',
            'basePath' => '@webroot',
            'path' => 'uploads', // Путь к папке, в которой будут храниться загруженные файлы
            'name' => 'Загрузки' // Название корневой папки в elFinder
        ];

        parent::init();
    }
    public function actionIndex()
{
    return [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\ElFinder',
        ],
    ];
}
}
?>
