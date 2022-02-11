<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
    $this->title = 'Login';
    $this->params['breadcrumbs'][] = ['label' => "Home", 'url' => '/'];
    $this->params['breadcrumbs'][] = ['label' => "Module", 'url' => '/site'];
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'active' => true];
	
?>  
<style>        
    body{ margin: 0;  }
        .container{
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            height: 100%;
        }
        btn-primary{ size:50%; color:#fff;background-color:#337ab7;border-color:#2e6da4}.btn-primary.focus,.btn-primary:focus{color:#fff;background-color:#286090;border-color:#122b40}.btn-primary:hover{color:#fff;background-color:#286090;border-color:#204d74}.btn-primary.active,.btn-primary:active,.open>.dropdown-toggle.btn-primary{color:#fff;background-color:#286090;background-image:none;border-color:#204d74}.btn-primary.active.focus,.btn-primary.active:focus,.btn-primary.active:hover,.btn-primary:active.focus,.btn-primary:active:focus,.btn-primary:active:hover,.open>.dropdown-toggle.btn-primary.focus,.open>.dropdown-toggle.btn-primary:focus,.open>.dropdown-toggle.btn-primary:hover{color:#fff;background-color:#204d74;border-color:#122b40}.btn-primary.disabled.focus,.btn-primary.disabled:focus,.btn-primary.disabled:hover,.btn-primary[disabled].focus,.btn-primary[disabled]:focus,.btn-primary[disabled]:hover,fieldset[disabled] .btn-primary.focus,fieldset[disabled] .btn-primary:focus,fieldset[disabled] .btn-primary:hover{background-color:#337ab7;border-color:#2e6da4}  
</style>

<div class="container">
    <div class="left">
        <div>  
            <img src="<?= Yii::getAlias('@web') . "/images/12345.jpg" ?>" width=100% height=100%>   
			
        </div>
    </div>
    <div class="right">
        <center>
            <img src="<?= Yii::getAlias('@web') . "/images/logo.jpeg" ?>" width=80% height=80%>
            <?php if (Yii::$app->session->hasFlash('complete')): ?>
                <div class="alert alert-success"><?= Yii::$app->session->getFlash('complete');?></div>
            <?php endif?>
            <?php $form = ActiveForm::begin([   
            ]); ?>
        <br><br>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Usuario') ?>
        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
            <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        <?php ActiveForm::end(); ?>
        </center>
        <div align="center">
            <br>
            <br>

            <a href='<?=Url::to("/site/changepassword")?>' style="text-decoration:none;text-color:blue" class="float-center">Olvide mi contraseña</a>
        </div>

        </div>
    </div>
</div>
    