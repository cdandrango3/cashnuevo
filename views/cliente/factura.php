<?php


use app\models\Person;
use kartik\date\DatePicker;
use yii\Bootstrap4;
use yii\bootstrap4\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HeadFact */
/* @var $form ActiveForm */
$listData=ArrayHelper::map($ven,"id","name");
$listProduct=ArrayHelper::map($produc,"name","name");
$listPrecio=ArrayHelper::map($precio,"name","precio");
$listIva=ArrayHelper::map($precio,"name","product_iva_id");
yii::debug($listIva);
$listcosto=ArrayHelper::map($precio,"name","costo");
$sales=ArrayHelper::map($salesman,"id","name");
$listtypepro=ArrayHelper::map($modeltype,"name","name");
$listruc=ArrayHelper::map($query,"id","name");
$prelist=\yii\helpers\Json::encode($listPrecio);
$prolist=\yii\helpers\Json::encode($listProduct);
$lcosto=\yii\helpers\Json::encode($listcosto);
$liva=\yii\helpers\Json::encode($listIva);
$authItemChild = Yii::$app->request->post('Person');
$auth = Yii::$app->request->post('HeadFact');
$request=Yii::$app->request->post('FacturaBody');
$model->f_timestamp=date("Y-m-d")
?>

<div class="cliente-factura">
    <?php
    if(Yii::$app->session->hasFlash("error")){
        $c=Yii::$app->session->getFlash('error');
        foreach ($c as  $message) {
            foreach ($message as  $messa) {
                echo '<div class="alert alert-danger">' . $messa . '</div>';

            }

        }
    }
    ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="card ">
            <div class="card-head bg-primary p-4">
               <h4 >Datos de la factura</h4>
            </div>
            <div class="card-body p-4">
    <div class="row">
        <div class="col-6">

            <?= HTML::tag("label","Fecha de emisión")?>
            <?= DatePicker::widget([
                    'model'=>$model,
            'attribute' => 'f_timestamp',
            'name' => 'check_issue_date',
            'value' => $model->f_timestamp,
            'options' => ['placeholder' => 'Select issue date ...'],
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
            ]
            ])?>
            <br>
            <?= $form->field($model, 'tipo_de_documento')->dropDownList(
                ['Cliente' => 'Cliente', 'Proveedor' => 'Proveedor'],["id" =>"tipodocu",'onchange'=>'
            $.post( "'.urldecode(Yii::$app->urlManager->createUrl('cliente/getdata?data=')).'"+$(this).val(), function( data ) {
              $( "select#dop1" ).html( data );
              console.log(data)
            });
        '])?>
            <?=$form->field($ven[0],"id")->dropDownList($listruc,['prompt'=>'Select...',"id"=>"dop1"])->label("Persona");?>
            <?= HTML::label("Vendedor","d",["id"=>"ven"])?>
            <?=$form->field($salesman[0],"id_ven")->dropDownList($sales,['prompt'=>'Select...',"id"=>"vendedor"])->label(false);?>

            <?= $form->field($model, 'Entregado')->checkBox(['label' => 'Entregado']);  ?>

        </div>

        <div class="col-6">
            <?= $form->field($model, 'n_documentos')->textInput(["id"=>"ndocu"])?>
            <?= $form->field($model, 'referencia') ?>
            <?= $form->field($model, 'orden_cv') ?>
            <?= $form->field($model, 'autorizacion') ?>

       </div>
        </div>
    </div>
        </div>
        <div class="form-group">

        </div>
    </div>
</div>
<?php echo HTML::tag("a", "añadir detalle", ["value" => "ff", "id" => "añadir", "class" => "btn btn-primary text-white float-right mr-4"]); ?>
<table class="table table-dark">
    <thead>
    <th>Cantidad</th>
    <th> Producto </th>
    <th> Valor unitario </th>
    <th> Descuento %</th>
    <th> Valor final </th>
    <th> Eliminar </th>
    </thead>
    <tbody id="nuevo">


    </tbody>
</table>
<div class="row">
    <div class="col-7">
        <td><?= $form->field($model3, 'description')->label("Descripcion")->textarea(['rows' => '6'])?></td>
    </div>
    <div class="col-5">
        <?= $form->field($produ, 'costo')->label("subtotal")->textInput(['value' =>"" ,"id"=>"pre",'type'=>"hidden"]) ?>
        <td><?= $form->field($model3, 'subtotal12')->label("subtotal 12%")->textInput(['readonly' => true ,'value' =>"" ,"id"=>"sub"]) ?></td>
        <td><?= $form->field($model3, 'subtotal0')->label("subtotal 0%")->textInput(['readonly' => true ,'value' =>"" ,"id"=>"sub0"]) ?></td>
        <td><?= $form->field($model3, 'descuento')->label("descuento")->textInput(['readonly' => true ,'value' =>"" ,"id"=>"desc"]) ?></td>
        <td><?= $form->field($model3, 'iva')->label("iva")->textInput(['readonly' => true ,'value' =>"" ,"id"=>"iva"]) ?></td>
        <td><?= $form->field($model3, 'total')->label("total")->textInput(['readonly' => true ,'value' =>"" ,"id"=>"total"]) ?></td>
    </div>
</div>
<?= Html::submitButton('Guardar', ['class' => 'btn btn-success float-right ','id'=>"buttonsubmit"]) ?>
<br>
<br>
</div><!-- cliente-factura -->
<?php ActiveForm::end(); ?>


<?php

Modal::begin([
    'title'=>'<h1 class="text-primary">Escoger Persona</h1>',
    'id'=>'modal2',
    'size'=>'modal-lg',

]);

Modal::end();

?>
<?php

Modal::begin([
    'title'=>'<h1 class="text-primary">Escoger Persona</h1>',
    'id'=>'modal',
    'size'=>'modal-lg',

]);

$models=New Person;
$model=$models::find()->select("ruc")->all();
echo $this->renderAjax("formclientrender",compact('model'));

Modal::end();

?>



<script type="text/javascript">
    var count=0;
    cov=[]

    $(document).ready(function(){
        $('#personm').append('<a id="buscar" class="btn btn-primary">buscar</a>')
    })
    $('#buscar').click(function() {
        $('#modal').modal('show')
            .find('#modalContent')
    })

    $('#ndocu')
        .keypress(function (event) {
            if (event.which < 48 || event.which > 57 || this.value.length === 17) {
                return false;
            }
        });
    var flag1 = true;
    $('#ndocu').keypress(function(e){
        if($(this).val().length == 3 || $(this).val().length == 7 && flag1) {
            $(this).val($(this).val()+"-");
            flag1 = true;
        }
    });

    $('#tipodocu').change(function(){
        tipo=$(this).val()
        if (tipo=="Proveedor") {
            $("#vendedor").hide()
            $("#vendedor").val("")
            $("#ven").hide()
                $(".preu").val("");
        }
        else{
            $("#vendedor").show()
            $(".preu").val("");
            $("#ven").show()
        }


        $.get('<?php echo Yii::$app->request->baseUrl. '/cliente/getdata' ?>',{data:tipo},function(data){

           datos=data;




        });
    })
    $('#listtype').change(function(){
        c=$(this).val();

            pro = '<?php echo $prolist ?>'
            dapro = JSON.parse(pro)
            $('.s').remove();
            for (i in dapro) {
                var c = '<option class="s" value="' + i + '">"' + i + '"</option>'
                $('.la').append(c);

        }
        })
$(añadir).click(function(){
count=count+1

      pro='<?php echo $prolist ?>'


    dapro=JSON.parse(pro)
     var c='<tr id="int'+count+'">'
         c+='<td>'
       c+='<div class="form-group field-can"> <label class="control-label" for="facturabody-'+count+'-cant"></label><input type="text" id="can'+count+'" class="form-control cant" name="FacturaBody['+count+'][cant]" value="" onkey="javascript:fields2()">'
      c+='</td>'
     c+='<td>'
    c+='<div class="form-group field-valo"><label class="control-label" for="valo"></label><select id="'+count+'" class="form-control la" name="Product['+count+'][name]"> <option value="">Select...</option>'
        for(i in dapro){
         c+='<option class="s" value="'+i+'">"'+i+'"</option>'
        }
    c+='</select></div>'
    c+='</td>'
    c+='<td>'
    c+='<div class="form-group field-idn"><label class="control-label" for="facturabody-'+count+'-precio_u"></label><input type="text" id="idn'+count+'" class="form-control preu" name="FacturaBody['+count+'][precio_u]" value=""><div class="help-block"></div> </div> '
    c+='</td>'
    c+='<td>'
    c+='<div class="form-group field-desc"><label class="control-label" for="facturabody-+count+-desc"></label><input type="text" id="desc'+count+'" class="form-control desc" name="FacturaBody['+count+'][desc]" value="">'
    c+='</td>'
    c+='<td>'
    c+='<div class="form-group field-valtotal"><label class="control-label" for="facturabody-+count+-precio_total"></label><input type="text" id="valtotal'+count+'" class="form-control g" name="FacturaBody['+count+'][precio_total]" value="" readonly>'
    c+='</td>'
    c+='<td>'
    c+='<button class="btn btn-danger mdwsdsdsft-3 remove" id="'+count+'">Eliminar</button>'
    c+='</td>'
    c+='</tr>'

    $('#hola').click(function(){

    });

    $('#actionmodal').click(function(){
        $('#modal2').show()
    })

$(document).on('keyup','.preu',function(){
    precio=$(this).val()
    te=$(this).attr("id");
    h=te.substring(3);
    cant=$('#can'+h).val();
    $('#valtotal'+h).val(cant*precio);
    sum=0;
    c=0;
    sumiv=0;
    sumn=0;
    iva=JSON.parse('<?php echo $liva?>');
    item=[];
    $('.la').each(function(){
        item.push($(this).val())
    })
    $('.g').each(function(){

        console.log(c)
        if(iva[item[c]]==12){
            sumiv=sumiv+parseFloat($(this).val());
        }
        if(iva[item[c]]==0){
            sumn=sumn+parseFloat($(this).val());
        }
        c=c+1;
    })
    $('#sub0').val(round(sumn))
    $('#sub').val(round(sumiv))

    console.log(sumn);
    console.log(sumiv);
    iva=sumiv*0.12;
    des=0;
    total=sumiv+sumn+iva+des;
    $('#iva').val(round(iva))
    $('#des').val(round(iva))
    $('#total').val(round(total))
    console.log(h)

})

    $(document).on('click','.remove',function(){
        id=$(this).attr("id");


        $("#int"+id).remove();
        sum=0;
        c=0;
        sumiv=0;
        sumn=0;
        iva=JSON.parse('<?php echo $liva?>');
        item=[];
        $('.la').each(function(){
            item.push($(this).val())
        })
        console.log(item[0]);
        $('.g').each(function(){

            console.log(c)
            if(iva[item[c]]==12){
                sumiv=sumiv+parseFloat($(this).val());
            }
            if(iva[item[c]]==0){
                sumn=sumn+parseFloat($(this).val());
            }
            c=c+1;
        })
        $('#sub0').val(sumn)
        $('#sub').val(sumiv)

        console.log(sumn);
        console.log(sumiv);
        iva=sumiv*0.12;
        des=0;
        total=sumiv+sumn+iva+des;
        $('#iva').val(iva)
        $('#des').val(iva)
        $('#total').val(total)
    })

    $('#nuevo').append(c);
})
    $('body').on('beforeSubmit', 'form#dynamic-form111', function () {
        var form = $(this);
        // return false if form still have some validation errors
        if (form.find('.has-error').length)
        {
            return false;
        }
        // submit form
        $.ajax({
            url    : form.attr('action'),
            type   : 'get',
            data   : form.serialize(),
            success: function (response)
            {
                var getupdatedata = $(response).find('#filter_id_test');
                // $.pjax.reload('#note_update_id'); for pjax update
                $('#yiiikap').html(getupdatedata);
                //console.log(getupdatedata);
            },
            error  : function ()
            {
                console.log('internal server error');
            }
        });
        return false;
    });
function calcular(){
    tip= $('#tipodocu').val();
    console.log(tip)
    if(tip=="Cliente"){
        f=JSON.parse('<?php echo $prelist?>');

    }
    else {
        if (tip == "Proveedor") {
            f = JSON.parse('<?php echo $lcosto?>');

        }
    }

    cost=JSON.parse('<?php echo $lcosto?>');
    console.log(cost);
    $('#idn'+h+'').val(f[d]);
    co=cost[d]
    cost=$('#can'+h).val()*co
    suma=0;
    cov.push(cost);
    console.log(cov)
    for (const element of cov){
        suma=suma+parseFloat(element)
        cost=JSON.parse('<?php echo $lcosto?>');
    }
    console.log(suma)
    $('#pre').val(suma)
    re=($('#can'+h).val())*($('#idn'+h).val())
    $('#valtotal'+h).val(re);
    console.log(cost)
    sum=0;
    c=0;
    sumiv=0;
    sumn=0;
    iva=JSON.parse('<?php echo $liva?>');
    item=[];
    $('.la').each(function(){
        item.push($(this).val())
    })
    console.log(item[0]);
    $('.g').each(function(){

        console.log(c)
        if(iva[item[c]]==12){
            sumiv=sumiv+parseFloat($(this).val());
        }
        if(iva[item[c]]==0){
            sumn=sumn+parseFloat($(this).val());
        }
        c=c+1;
    })
    $('#sub0').val(round(sumn))
    $('#sub').val(round(sumiv))
    console.log(round(sumn));
    console.log(round(sumiv));
    iva=sumiv*0.12;
    des=0;
    total=sumiv+sumn+iva+des;
    $('#iva').val(round(iva))
    $('#des').val(round(iva))
    $('#total').val(round(total))
}
    $(document).on('change','.la',function(){
        h=$(this).attr("id");
        d=$(this).val();
        calcular();
    })
    $(document).on('keyup','.cant',function(){
        precio=$(this).val()
        te=$(this).attr("id");
        h=te.substring(3);
        cant=$('#idn'+h).val();
        $('#valtotal'+h).val(cant*precio);
        sum=0;
        c=0;
        sumiv=0;
        sumn=0;
        iva=JSON.parse('<?php echo $liva?>');
        item=[];
        $('.la').each(function(){
            item.push($(this).val())
        })
        $('.g').each(function(){

            console.log(c)
            if(iva[item[c]]==12){
                sumiv=sumiv+parseFloat($(this).val());
            }
            if(iva[item[c]]==0){
                sumn=sumn+parseFloat($(this).val());
            }
            c=c+1;
        })
        $('#sub0').val(round(sumn))
        $('#sub').val(round(sumiv))

        console.log(sumn);
        console.log(sumiv);
        iva=sumiv*0.12;
        des=0;
        total=sumiv+sumn+iva+des;
        $('#iva').val(round(iva))
        $('#des').val(round(iva))
        $('#total').val(round(total))
        console.log(h)
    })
    $(document).on('keyup','.desc',function(){
        te=$(this).attr("id");
        h=te.substring(4);
        console.log(h);

        preciou=$('#idn'+h+'').val();
        cant=$('#can'+h).val();
        $('#valtotal'+h).val(preciou*cant);
        val=$('#valtotal'+h).val();
        desc=val*($(this).val())/100;
        val=$('#valtotal'+h).val();
        valf=val-desc;
        $('#valtotal'+h).val(valf);

        sum=0;

        $('.g').each(function(){
            sum=sum+parseFloat($(this).val());


        })
        $('')
        $('#sub').val(sum)
        iva=sum*0.12;
        des=0;
        total=sum+iva+des;
        $('#iva').val(round(iva))
        $('#desc').val(round(desc))
        $('#total').val(round(total))
        console.log(val);
    })
    $('#añadir')
$('#buttonsubmit').click(function(){
cantidad=[];
    preciou=[];
    pro=[];
    preciot=[];

    $('.cant').each(function(){
        cantidad.push($(this).val())
    })
    $('.la').each(function(){
    pro.push($(this).val())
    })
    $('.preu').each(function(){
    preciou.push($(this).val())
    })
    $('.g').each(function(){
    preciot.push($(this).val())
    })
    n_docu= $('#ndocu').val();

    $.ajax({
        method: "POST",
        data: { cantidad:cantidad,produc:pro,preciou:preciou,precioto:preciot,ndocumento:n_docu },
        url: '<?php echo Yii::$app->request->baseUrl. '/cliente/guardarproceso' ?>',
        success: function (data) {
            console.log(data);
        },
        error: function (err) {

            //do something else
            console.log(err);
            if(err){
                alert('It works!');
            }

        }

    })

})
    function round(num) {
        var m = Number((Math.abs(num) * 100).toPrecision(15));
        return Math.round(m) / 100 * Math.sign(num);
    }
</script>

