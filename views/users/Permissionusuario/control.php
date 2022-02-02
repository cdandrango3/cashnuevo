<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use hoaaah\ajaxcrud\CrudAsset; 
use hoaaah\ajaxcrud\BulkButtonWidget;
$query = new yii\db\Query();
$this->title = 'PERMISOS DE ACESSO';
 
                            $nombre = array();
                            $nombre1 = "";
                            $consultar = array();
                            $consultarstr = "";
                            $data = $query->select(['nombre'])->from('modulo')->orderby('id DESC') ->all();
                            if ($data) {
                                foreach ($data as $row) 
                                { 
                                    $nombre = $row['nombre'];      
                                    $nombre1 = $nombre.",".$nombre1;  
                                }
                            }
                            $modulos = explode(",", $nombre1);
                            $modulocont = $query->select(['descripcion', 'consultar', 'agregar', 'modificar', 'eliminar'])->from('users, modulo, submodulos,permission_usuario')
                            ->where('users.id = 25 and modulo.id = submodulos.id_modulo and permission_usuario.id_users = users.id and permission_usuario.id_modulo = modulo.id and permission_usuario.id_submodulos = submodulos.id and modulo.id = 2')->orderby('submodulos.id DESC') ->all();
                            if ($modulocont) {
                                foreach ($modulocont as $rowcon) 
                                { 
                                    $consultar = $rowcon['consultar'];      
                                    $consultarstr = $consultar.",".$consultarstr;  
                                }
                            }
                            $consularcheck = explode(",", $consultarstr);
                        
CrudAsset::register($this);
    if(isset($_GET["check"]))
    {
        $nombre1=1;
        echo $nombre1;
        Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>$nombre1], 'id = 108')->execute();
    }else{$nombre1=0;
        echo $nombre1;
        Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>$nombre1], 'id = 108')->execute();
        header("Location: http://localhost/cashbook_project-main/web/permissionusuario");

    }
    
?>



<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
