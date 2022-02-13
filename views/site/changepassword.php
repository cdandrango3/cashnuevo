
<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
    $this->title = 'Contaseña Olvida';
    $this->params['breadcrumbs'][] = ['label' => "Home", 'url' => '/'];
    $this->params['breadcrumbs'][] = ['label' => "Module", 'url' => '/site'];
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'active' => true];
app\themes\adminlte3\assets\AdminleAsset::register($this);
app\assets\AppAsset::register($this);
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
<div class="container-fluid">
    <div class="row">
        <div class="col-4">

            </div>
        <div class="col-4">

        <center>
            <img src="<?= Yii::getAlias('@web') . "/images/logo.jpeg" ?>" width=80% height=80%>

            <?php $form = ActiveForm::begin([
            ]); ?>
        <br><br>
        <?= $form->field($model, 'user')->textInput(['autofocus' => true])->label('Ingrese su usuario o email') ?>
            <?= Html::submitButton('Recuperar contraseña', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        <?php ActiveForm::end(); ?>
        </center>
        <br>
        <br>
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success"><?= Yii::$app->session->getFlash('success');?></div>
        <?php endif?>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
           <div class="alert alert-danger"><?= Yii::$app->session->getFlash('error');?></div>
        <?php endif?>
        </div>
        <div class="col-4"></div>
    </div>

    </div>



