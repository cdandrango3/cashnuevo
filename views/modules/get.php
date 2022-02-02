<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
$listData=ArrayHelper::map($module,'rolename','rolename');
?>

<?php $form=ActiveForm::begin()?>

<?=
print_r("escoga el tipo de usuario");
echo $form->field($module[0],'rolename')->dropDownList($listData,['prompt'=>'Select...']);
echo HTML::tag('button',"enviar",['class'=>'btn btn-primary']);
?>
<?php ActiveForm::end()?>
<?php foreach($role as $roles):
?>
<div class="card mt-4">

    <?php foreach($roles as $rol):

        ?>
<?=
        $rol;

?>

<?php endforeach
?>
    <?php echo HTML::tag('button',"actualizar",["class"=>"btn btn-primary"])?>

</div>
<?php endforeach
?>


