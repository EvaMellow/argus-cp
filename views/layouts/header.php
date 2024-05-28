<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<nav class="navbar navbar-transparent navbar-expand-lg navbar-absolute fixed-top" role="navigation-demo">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-wrapper">
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Аккаунт
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <!--<a class="dropdown-item" href="#">Profile</a>-->
                        <?php if (!Yii::$app->user->isGuest): ?>
                        <a class="dropdown-item" href="<?= Url::to(['/user/edit-user', 'id' => Yii::$app->user->identity->id]) ?>">Настройки</a>
                        <?php endif; ?>
                        <!--<div class="dropdown-divider"></div>-->
                        <?=
                            Yii::$app->user->isGuest ? 
                                Html::a(
                                    'Вход',
                                    ['/site/login'],
                                    ['class'=>'dropdown-item']
                                ) : 
                                Html::a(
                                    'Выход ('.Yii::$app->user->identity->login.')',
                                    ['/site/logout'],
                                    ['class'=>'dropdown-item','data-method'=>'post']
                                );
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.container-->
</nav>