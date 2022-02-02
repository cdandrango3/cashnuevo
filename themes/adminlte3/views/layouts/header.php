<?php
use yii\helpers\Url;
?>
<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
</ul>



<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    
   
   
    <li class="nav-item dropdown">
        <a data-toggle="dropdown" href="#">
            <img src="<?= Yii::getAlias('@web') . "/images/iconlogo.png"; ?>" width="35" class="img-circle elevation-2" alt="User Image">
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php use yii\helpers\Html;

            if ( Yii::$app->user->isGuest): ?>
                <a href="<?= Url::to(['site/login'])?>" class="dropdown-item">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </a>
            <?php else: ?>
               
                <div class="dropdown-item">
                    <?php echo Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            '<i class="fas fa-sign-out-alt mr-2"></i> Salir ' . Yii::$app->user->identity->username . '',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm();
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </li>
</ul>