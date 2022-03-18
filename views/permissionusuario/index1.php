<?php
    use app\models\Users;
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
    $userid = 35;
    $submodulosid = array();
    $submodulosidstr = "";
    $consultar = array();
    $consultarstr = "";
    $agregar = array();
    $agregarstr = "";
    $modificar = array();
    $modificarstr = "";
    $eliminar = array();
    $eliminarstr = "";
    $aprobar = array();
    $aprobarstr = "";
    $generar = array();
    $generarstr = "";
    $configurar = array();
    $configurarstr = "";
    $acceder = array();
    $accederstr = "";
    $users = array();
    $usersstr = "";
    $usersid = array();
    $usersstrid = "";
    $data = $query->select(['nombre'])->from('modulo')->orderby('id DESC') ->all();
    if ($data) {
        foreach ($data as $row) 
        { 
            $nombre = $row['nombre'];      
            $nombre1 = $nombre.",".$nombre1;  
        }
    }

    $usuarios = $query->select(['*'])->from('users')->orderby('id DESC') ->all();
    if ($data) {
        foreach ($usuarios as $row) 
        { 
            $users = $row['username'];      
            $usersstr = $users.",".$usersstr;  
            $usersid = $row['id'];      
            $usersstrid = $usersid.",".$usersstrid;
        }
    }
    $modulos = explode(",", $nombre1);
    $modulocont = $query->select(['id_submodulos','descripcion', 'consultar', 'agregar', 'modificar', 'eliminar','aprobar','generar','configurar','acceder'])->from('users, modulo, submodulos,permission_usuario')
    ->where('users.id ='.$userid.'and modulo.id = submodulos.id_modulo and permission_usuario.id_users = users.id and permission_usuario.id_modulo = modulo.id and permission_usuario.id_submodulos = submodulos.id ')->orderby('submodulos.id DESC') ->all();
    if ($modulocont) {
        foreach ($modulocont as $rowcon) 
        { 
          
            $consultar = $rowcon['consultar'];      
            $consultarstr = $consultar.",".$consultarstr; 
            $agregar = $rowcon['agregar'];      
            $agregarstr = $agregar.",".$agregarstr;  
            $modificar = $rowcon['modificar'];      
            $modificarstr = $modificar.",".$modificarstr;
            $eliminar = $rowcon['eliminar'];      
            $eliminarstr = $eliminar.",".$eliminarstr;  
            $submodulosid = $rowcon['id_submodulos'];      
            $submodulosidstr = $submodulosid.",".$submodulosidstr;  
            $aprobar = $rowcon['aprobar'];      
            $aprobarstr = $aprobar.",".$aprobarstr;
            $generar = $rowcon['generar'];      
            $generarstr = $generar.",".$generarstr;
            $configurar = $rowcon['configurar'];      
            $configurarstr = $configurar.",".$configurarstr;
            $acceder = $rowcon['acceder'];      
            $accederstr = $acceder.",".$accederstr;
        }
    }
    $usersinfo = explode(",", $usersstr);
    $usersinfoid = explode(",", $usersstrid);
    $consularcheck = explode(",", $consultarstr);    
    $agregarcheck  = explode(",", $agregarstr);
    $modificarcheck  = explode(",", $modificarstr);   
    $eliminarcheck  = explode(",", $eliminarstr);
    $aprobarcheck  = explode(",", $aprobarstr);
    $generarcheck  = explode(",", $generarstr);
    $configurarcheck  = explode(",", $configurarstr);
    $accedercheck  = explode(",", $accederstr);
    $submodulosinfo = explode(",", $submodulosidstr);               
    CrudAsset::register($this);
    if(isset($_GET["enviar"]))
    {
        //Contabilidad
        if(isset($_GET["con_asi_con"])){
        Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[0])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[0])->execute();
        }
        if(isset($_GET["con_asi_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[0])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[0])->execute();
        }
        if(isset($_GET["con_asi_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[0])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[0])->execute();
        }
        if(isset($_GET["con_asi_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[0])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[0])->execute();
        }
        if(isset($_GET["con_eje_con"])){
        Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[1])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[1])->execute();
        }
        if(isset($_GET["con_eje_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[1])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[1])->execute();
        }
        if(isset($_GET["con_eje_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[1])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[1])->execute();
        }
        if(isset($_GET["con_eje_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[1])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[1])->execute();
        }
        if(isset($_GET["con_gua_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[2])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[2])->execute();
        }
        if(isset($_GET["con_pla_con"])){
        Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[3])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[3])->execute();
        }
        if(isset($_GET["con_pla_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[3])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[3])->execute();
        }
        if(isset($_GET["con_pla_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[3])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[3])->execute();
        }
        if(isset($_GET["con_pla_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[3])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[3])->execute();
        }
        if(isset($_GET["con_cen_con"])){
        Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[4])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[4])->execute();
        }
        if(isset($_GET["con_cen_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[4])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[4])->execute();
        }
        if(isset($_GET["con_cen_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[4])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[4])->execute();
        }
        if(isset($_GET["con_cen_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[4])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[4])->execute();
        }

        //Bancos

         if(isset($_GET["ban_mis_con"])){
        Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[5])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[5])->execute();
        }
        if(isset($_GET["ban_mis_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[5])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[5])->execute();
        }
        if(isset($_GET["ban_mis_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[5])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[5])->execute();
        }
        if(isset($_GET["ban_mis_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[5])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[5])->execute();
        }
        if(isset($_GET["ban_est_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[6])->execute();
        }else{
                Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[6])->execute();
        }
        
        if(isset($_GET["ban_ant_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[8])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[8])->execute();
        }
        if(isset($_GET["ban_ant_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[8])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[8])->execute();
        }
        if(isset($_GET["ban_ant_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[8])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[8])->execute();
        }
        if(isset($_GET["ban_ant_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[8])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[8])->execute();
        }
        

        if(isset($_GET["ban_rep_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[9])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[9])->execute();
        }
        if(isset($_GET["ban_rep_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[9])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[9])->execute();
        }
        if(isset($_GET["ban_rep_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[9])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[9])->execute();
        }
        if(isset($_GET["ban_rep_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[9])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[9])->execute();
        }


        if(isset($_GET["ban_otr_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[10])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[10])->execute();
        }
        if(isset($_GET["ban_otr_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[10])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[10])->execute();
        }
        if(isset($_GET["ban_otr_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[10])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[10])->execute();
        }
        if(isset($_GET["ban_otr_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[10])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[10])->execute();
        }

        if(isset($_GET["ban_con_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[12])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[12])->execute();
        }
        if(isset($_GET["ban_con_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[12])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[12])->execute();
        }
        if(isset($_GET["ban_con_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[12])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[12])->execute();
        }
        if(isset($_GET["ban_con_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[12])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[12])->execute();
        }

        if(isset($_GET["ban_che_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[13])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[13])->execute();
        }
        if(isset($_GET["ban_che_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[13])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[13])->execute();
        }
        if(isset($_GET["ban_che_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[13])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[13])->execute();
        }
        if(isset($_GET["ban_che_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[13])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[13])->execute();
        }

        if(isset($_GET["ban_red_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[15])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[15])->execute();
        }
        if(isset($_GET["ban_red_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[15])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[15])->execute();
        }
        if(isset($_GET["ban_red_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[15])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[15])->execute();
        }
        if(isset($_GET["ban_red_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[15])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[15])->execute();
        }

        if(isset($_GET["ban_liq_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[16])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[16])->execute();
        }
        if(isset($_GET["ban_liq_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[16])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[16])->execute();
        }
        if(isset($_GET["ban_liq_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[16])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[16])->execute();
        }
        if(isset($_GET["ban_liq_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[16])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[16])->execute();
        }

        if(isset($_GET["ban_lot_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[17])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[17])->execute();
        }
        if(isset($_GET["ban_lot_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[17])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[17])->execute();
        }
        if(isset($_GET["ban_lot_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[17])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[17])->execute();
        }
        if(isset($_GET["ban_lot_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[17])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[17])->execute();
        }
        //CRM
        if(isset($_GET["crm_niv_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[29])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[29])->execute();
        }
        if(isset($_GET["crm_niv_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[29])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[29])->execute();
        }
        if(isset($_GET["crm_niv_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[29])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[29])->execute();
        }
        if(isset($_GET["crm_niv_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[29])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[29])->execute();
        }

        if(isset($_GET["crm_seg_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[30])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[30])->execute();
        }
        if(isset($_GET["crm_seg_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[30])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[30])->execute();
        }
        if(isset($_GET["crm_seg_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[30])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[30])->execute();
        }
        if(isset($_GET["crm_seg_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[30])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[30])->execute();
        }

        if(isset($_GET["crm_pun_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[31])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[31])->execute();
        }
        if(isset($_GET["crm_pun_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[31])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[31])->execute();
        }
        if(isset($_GET["crm_pun_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[31])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[31])->execute();
        }
        if(isset($_GET["crm_pun_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[31])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[31])->execute();
        }

        if(isset($_GET["crm_rep_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[32])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[32])->execute();
        }
        

        if(isset($_GET["crm_reg_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[33])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[33])->execute();
        }
        if(isset($_GET["crm_reg_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[33])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[33])->execute();
        }
        if(isset($_GET["crm_reg_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[33])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[33])->execute();
        }
        if(isset($_GET["crm_reg_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[33])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[33])->execute();
        }
        //Personas
        if(isset($_GET["per_per_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[18])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[18])->execute();
        }
        if(isset($_GET["per_per_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[18])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[18])->execute();
        }
        if(isset($_GET["per_per_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[18])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[18])->execute();
        }
        if(isset($_GET["per_per_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[18])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[18])->execute();
        }
        if(isset($_GET["per_blo_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[19])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[19])->execute();
        }

         //Recursos Humanos
         if(isset($_GET["rrh_car_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[20])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[20])->execute();
        }
        if(isset($_GET["rrh_car_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[20])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[20])->execute();
        }
        if(isset($_GET["rrh_car_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[20])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[20])->execute();
        }
        if(isset($_GET["rrh_car_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[20])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[20])->execute();
        }

        if(isset($_GET["rrh_dep_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[21])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[21])->execute();
        }
        if(isset($_GET["rrh_dep_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[21])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[21])->execute();
        }
        if(isset($_GET["rrh_dep_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[21])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[21])->execute();
        }
        if(isset($_GET["rrh_dep_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[21])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[21])->execute();
        }

        if(isset($_GET["rrh_cod_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[22])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[22])->execute();
        }
        if(isset($_GET["rrh_cod_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[22])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[22])->execute();
        }
        if(isset($_GET["rrh_cod_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[22])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[22])->execute();
        }
        if(isset($_GET["rrh_cod_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[22])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[22])->execute();
        }

        if(isset($_GET["rrh_pre_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[23])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[23])->execute();
        }
        if(isset($_GET["rrh_pre_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[23])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[23])->execute();
        }
        if(isset($_GET["rrh_pre_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[23])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[23])->execute();
        }
        if(isset($_GET["rrh_pre_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[23])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[23])->execute();
        }

        if(isset($_GET["rrh_qui_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }
        if(isset($_GET["rrh_qui_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }
        if(isset($_GET["rrh_qui_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }
        if(isset($_GET["rrh_qui_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }
        if(isset($_GET["rrh_qui_apr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['aprobar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['aprobar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }
        if(isset($_GET["rrh_qui_gen"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['generar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['generar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[24])->execute();
        }



        if(isset($_GET["rrh_sem_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[25])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[25])->execute();
        }
        if(isset($_GET["rrh_sem_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[25])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[25])->execute();
        }
        if(isset($_GET["rrh_sem_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[25])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[25])->execute();
        }
        if(isset($_GET["rrh_sem_gen"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['generar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[25])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['generar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[25])->execute();
        }



        if(isset($_GET["rrh_con_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[26])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[26])->execute();
        }
        if(isset($_GET["rrh_con_gen"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['generar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[26])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['generar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[26])->execute();
        }


        if(isset($_GET["rrh_pla_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[27])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[27])->execute();
        }
        if(isset($_GET["rrh_pla_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[27])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[27])->execute();
        }
        if(isset($_GET["rrh_pla_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[27])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[27])->execute();
        }


        //Importaciones
        if(isset($_GET["imp_imp_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[34])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[34])->execute();
        }
        if(isset($_GET["imp_imp_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[34])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[34])->execute();
        }
        if(isset($_GET["imp_imp_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[34])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[34])->execute();
        }
        if(isset($_GET["imp_imp_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[34])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[34])->execute();
        }

        if(isset($_GET["imp_liq_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[35])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[35])->execute();
        }
        if(isset($_GET["imp_liq_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[35])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[35])->execute();
        }
        if(isset($_GET["imp_liq_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[35])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[35])->execute();
        }
        if(isset($_GET["imp_liq_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[35])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[35])->execute();
        }

        //Activo Fijo
        if(isset($_GET["act_act_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[36])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[36])->execute();
        }
        if(isset($_GET["act_act_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[36])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[36])->execute();
        }
        if(isset($_GET["act_act_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[36])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[36])->execute();
        }
        if(isset($_GET["act_act_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[36])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[36])->execute();
        }

        
        if(isset($_GET["act_con_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[37])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[37])->execute();
        }
        

        if(isset($_GET["act_cat_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[38])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[38])->execute();
        }
        if(isset($_GET["act_cat_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[38])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[38])->execute();
        }
        if(isset($_GET["act_cat_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[38])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[38])->execute();
        }
        if(isset($_GET["act_cat_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[38])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[38])->execute();
        }

        if(isset($_GET["act_tip_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[39])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[39])->execute();
        }
        if(isset($_GET["act_tip_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[39])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[39])->execute();
        }
        if(isset($_GET["act_tip_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[39])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[39])->execute();
        }
        if(isset($_GET["act_tip_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[39])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[39])->execute();
        }

        if(isset($_GET["act_ubi_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[40])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[40])->execute();
        }
        if(isset($_GET["act_ubi_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[40])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[40])->execute();
        }
        if(isset($_GET["act_ubi_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[40])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[40])->execute();
        }
        if(isset($_GET["act_ubi_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[40])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[40])->execute();
        }


        //Inventario
        if(isset($_GET["inv_mov_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[41])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[41])->execute();
        }
        if(isset($_GET["inv_mov_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[41])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[41])->execute();
        }
        if(isset($_GET["inv_mov_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[41])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[41])->execute();
        }
        if(isset($_GET["inv_mov_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[41])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[41])->execute();
        }

        if(isset($_GET["inv_tom_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }
        if(isset($_GET["inv_tom_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }
        if(isset($_GET["inv_tom_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }
        if(isset($_GET["inv_tom_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }
        if(isset($_GET["inv_tom_gen"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['generar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['generar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[42])->execute();
        }

        if(isset($_GET["inv_adm_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[43])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[43])->execute();
        }

        if(isset($_GET["inv_uni_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[44])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[44])->execute();
        }
        if(isset($_GET["inv_uni_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[44])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[44])->execute();
        }
        if(isset($_GET["inv_uni_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[44])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[44])->execute();
        }
        if(isset($_GET["inv_uni_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[44])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[44])->execute();
        }

        if(isset($_GET["inv_cat_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[45])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[45])->execute();
        }
        if(isset($_GET["inv_cat_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[45])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[45])->execute();
        }
        if(isset($_GET["inv_cat_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[45])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[45])->execute();
        }
        if(isset($_GET["inv_cat_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[45])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[45])->execute();
        }


        if(isset($_GET["inv_pro_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[46])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[46])->execute();
        }
        if(isset($_GET["inv_pro_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[46])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[46])->execute();
        }
        if(isset($_GET["inv_pro_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[46])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[46])->execute();
        }
        if(isset($_GET["inv_pro_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[46])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[46])->execute();
        }

        if(isset($_GET["inv_bod_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[47])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[47])->execute();
        }
        if(isset($_GET["inv_bod_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[47])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[47])->execute();
        }
        if(isset($_GET["inv_bod_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[47])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[47])->execute();
        }
        if(isset($_GET["inv_bod_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[47])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[47])->execute();
        }

        if(isset($_GET["inv_mov_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[48])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[48])->execute();
        }
        if(isset($_GET["inv_mov_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[48])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[48])->execute();
        }
        if(isset($_GET["inv_mov_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[48])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[48])->execute();
        }
        if(isset($_GET["inv_mov_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[48])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[48])->execute();
        }


        if(isset($_GET["inv_prod_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[49])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[49])->execute();
        }
        if(isset($_GET["inv_prod_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[49])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[49])->execute();
        }
        if(isset($_GET["inv_prod_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[49])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[49])->execute();
        }
        if(isset($_GET["inv_prod_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[49])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[49])->execute();
        }

        if(isset($_GET["inv_for_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[50])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[50])->execute();
        }

        if(isset($_GET["inv_gui_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[51])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[51])->execute();
        }
        if(isset($_GET["inv_gui_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[51])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[51])->execute();
        }
        if(isset($_GET["inv_gui_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[51])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[51])->execute();
        }
        if(isset($_GET["inv_gui_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[51])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[51])->execute();
        }


        //Tansacciones
        if(isset($_GET["tra_ret_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[62])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[62])->execute();
        }
        if(isset($_GET["tra_ret_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[62])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[62])->execute();
        }
        if(isset($_GET["tra_ret_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[62])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[62])->execute();
        }
        

        if(isset($_GET["tra_fac_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[53])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[53])->execute();
        }
        if(isset($_GET["tra_fac_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[53])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[53])->execute();
        }
        if(isset($_GET["tra_fac_conf"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['configurar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[53])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['configurar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[53])->execute();
        }


        if(isset($_GET["tra_pro_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[54])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[54])->execute();
        }
        if(isset($_GET["tra_pro_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[54])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[54])->execute();
        }
        if(isset($_GET["tra_pro_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[54])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[54])->execute();
        }
        if(isset($_GET["tra_pro_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[54])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[54])->execute();
        }

        if(isset($_GET["tra_cot_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[55])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[55])->execute();
        }
        if(isset($_GET["tra_cot_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[55])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[55])->execute();
        }
        if(isset($_GET["tra_cot_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[55])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[55])->execute();
        }
        if(isset($_GET["tra_cot_apr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['aprobar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[55])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['aprobar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[55])->execute();
        }

        if(isset($_GET["tra_pre_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[56])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[56])->execute();
        }
        if(isset($_GET["tra_pre_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[56])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[56])->execute();
        }
        if(isset($_GET["tra_pre_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[56])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[56])->execute();
        }
        if(isset($_GET["tra_pre_apr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['aprobar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[56])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['aprobar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[56])->execute();
        }


        if(isset($_GET["tra_ord_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[57])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[57])->execute();
        }
        if(isset($_GET["tra_ord_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[57])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[57])->execute();
        }
        if(isset($_GET["tra_ord_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[57])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[57])->execute();
        }
        if(isset($_GET["tra_ord_apr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['aprobar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[57])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['aprobar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[57])->execute();
        }


        if(isset($_GET["tra_com_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[58])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[58])->execute();
        }
        if(isset($_GET["tra_com_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[58])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[58])->execute();
        }
        if(isset($_GET["tra_com_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[58])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[58])->execute();
        }
        if(isset($_GET["tra_com_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[58])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[58])->execute();
        }


        if(isset($_GET["tra_cie_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[59])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[59])->execute();
        }
        if(isset($_GET["tra_cie_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[59])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[59])->execute();
        }
        if(isset($_GET["tra_cie_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[59])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[59])->execute();
        }
       

        if(isset($_GET["tra_anu_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[60])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[60])->execute();
        }
        if(isset($_GET["tra_anu_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[60])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[60])->execute();
        }


        if(isset($_GET["tra_cob_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[61])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[61])->execute();
        }
        if(isset($_GET["tra_cob_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[61])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[61])->execute();
        }
        if(isset($_GET["tra_cob_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[61])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[61])->execute();
        }
        if(isset($_GET["tra_cob_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[61])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[61])->execute();
        }


        if(isset($_GET["tra_dep_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[63])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[63])->execute();
        }
        if(isset($_GET["tra_dep_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[63])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[63])->execute();
        }
        if(isset($_GET["tra_dep_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[63])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[63])->execute();
        }
        if(isset($_GET["tra_dep_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[63])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[63])->execute();
        }
        ////Reportes
        if(isset($_GET["rep_ing_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[67])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[67])->execute();
        }
        if(isset($_GET["rep_est_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[68])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[68])->execute();
        }
        if(isset($_GET["rep_bal_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[69])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[69])->execute();
        }
        if(isset($_GET["rep_balc_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[70])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[70])->execute();
        }

        if(isset($_GET["rep_flu_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[71])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[71])->execute();
        }

        if(isset($_GET["rep_res_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[72])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[72])->execute();
        }
        
        if(isset($_GET["rep_ven_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[73])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[73])->execute();
        }

        if(isset($_GET["rep_venps_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[74])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[74])->execute();
        }
        if(isset($_GET["rep_venv_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[75])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[75])->execute();
        }

        if(isset($_GET["rep_cos_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[76])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[76])->execute();
        }

        if(isset($_GET["rep_venp_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[77])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[77])->execute();
        }

        if(isset($_GET["rep_tic_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[78])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[78])->execute();
        }

        if(isset($_GET["rep_gas_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[79])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[79])->execute();
        }

        if(isset($_GET["rep_con_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[80])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[80])->execute();
        }

        if(isset($_GET["rep_cli_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[81])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[81])->execute();
        }

        if(isset($_GET["rep_pro_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[82])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[82])->execute();
        }

        if(isset($_GET["rep_vens_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[83])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[83])->execute();
        }

        if(isset($_GET["rep_cona_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[84])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[84])->execute();
        }
        if(isset($_GET["rep_sal_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[85])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[85])->execute();
        }
        if(isset($_GET["rep_sald_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[86])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[86])->execute();
        }
        if(isset($_GET["rep_kar_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[87])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[87])->execute();
        }

        if(isset($_GET["rep_bit_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[88])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[88])->execute();
        }

        if(isset($_GET["rep_egr_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[89])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[89])->execute();
        }

        if(isset($_GET["rep_cose_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[90])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[90])->execute();
        }

        if(isset($_GET["rep_inv_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[91])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[91])->execute();
        }

        if(isset($_GET["rep_conc_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[92])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[92])->execute();
        }
        if(isset($_GET["rep_ats_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[93])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[93])->execute();
        }
        if(isset($_GET["rep_for4_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[94])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[94])->execute();
        }
        if(isset($_GET["rep_for3_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[95])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[95])->execute();
        }

        if(isset($_GET["rep_ane_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[96])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[96])->execute();
        }

        if(isset($_GET["rep_com_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[97])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[97])->execute();
        }

        if(isset($_GET["rep_din_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[98])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[98])->execute();
        }
        if(isset($_GET["rep_cob_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[99])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[99])->execute();
        }

        if(isset($_GET["rep_log_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[100])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[100])->execute();
        }

        //Reportes Personalizados

        if(isset($_GET["repp_com_con"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[64])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['consultar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[64])->execute();
        }
        if(isset($_GET["repp_com_agr"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[64])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['agregar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[64])->execute();
        }
        if(isset($_GET["repp_com_mod"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[64])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['modificar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[64])->execute();
        }
        if(isset($_GET["repp_com_eli"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[64])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['eliminar'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[64])->execute();
        }

        //POS
        if(isset($_GET["pos_gen_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[65])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[65])->execute();
        }
        if(isset($_GET["pos_sub_acc"])){
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>1], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[66])->execute();
        }else{
            Yii::$app->db->createCommand()->update('permission_usuario',['acceder'=>0], 'id_users ='.$userid.'and id_submodulos='.$submodulosinfo[66])->execute();
        }

     

        $redirect_page = 'permissionusuario';
        header('Location:'  .$redirect_page);
        die();
    }
   
?>
<html>
<head>
    <style>
        input[type=checkbox] {
            margin: 0 0 1em 2em;
            width: 16px;
            height: 16px;
        }
        </style>
    </head>
    <body>  
   
<script>
  window.onload = function() {
  imprimirValor();
}

function imprimirValor(){
  var select = document.getElementById("feedingHay");
  var options=document.getElementsByTagName("option");
  console.log(select.value);
  
 <?php echo "console.log(select.value);" ?>
    }
    </script>


<form  method="get" action="permissionusuario">
    <?php 
    $id1=0;
    echo $userid ?>
    <select id="feedingHay" name = "usuarios" onChange="imprimirValor()">
    <?php
        foreach ($usersinfo as $region)
          echo "<option value=".$region.">".$region."</option>";
    ?>
   </select>
</form>
        <h3><?php echo $modulos[1]; ?></h3> 
        <form action="permissionusuario" method="get">          
            <table class="table table-bordered table-hover table-striped table-condensed" >
                <thead>
                    <th width="255px" bgcolor="#259BE7">
                        <label> <input type="checkbox" id="checkconta">
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <script> 
                            $('#checkconta').click(function(){if ($(this).prop('checked')) {$('.contabilidad').prop('checked', true);} else { $('.contabilidad').prop('checked', false);}});
                            </script>
                            Seleccionar Todo
                        </label>
                    </th>
                    <th width="80px" bgcolor="#259BE7"><label>Consultar</label></th>
                    <th width="80px" bgcolor="#259BE7"><label>Agregar</label></th>
                    <th width="80px" bgcolor="#259BE7"><label>Modificar</label></th>
                    <th width="80px" bgcolor="#259BE7"><label>Eliminar</label></th> 
                </thead>
                <tbody>
                    <tr>
                        <td ><label>Asientos</label></td>
                        
                        <td>
                        <div class="checkbox custom-checkbox custom-checkbox-primary">    
                        <input type="checkbox" name="con_asi_con" <?php if (intval($consularcheck[0]) == 1)echo"checked"; ?> class="contabilidad"></div></td>
                        <td><input type="checkbox" name="con_asi_agr" <?php if (intval($agregarcheck[0]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_asi_mod" <?php if (intval($modificarcheck[0]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_asi_eli" <?php if (intval($eliminarcheck[0]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        
                    </tr>
                    <tr>
                        <td><label>Ejercicios Contables</label></td>
                        <td><input type="checkbox" name="con_eje_con" <?php if (intval($consularcheck[1]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_eje_agr" <?php if (intval($agregarcheck[1]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_eje_mod" <?php if (intval($modificarcheck[1]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_eje_eli" <?php if (intval($eliminarcheck[1]) == 1)echo"checked"; ?> class="contabilidad"></td>
                    </tr>
                    <tr>
                        <td><label>Guardar con cierre Mensual</label></td>
                        <td></td>
                        <td><input type="checkbox" name="con_gua_agr" <?php if (intval($agregarcheck[2]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label>Plan de cuentas</label></td>
                        <td><input type="checkbox" name="con_pla_con" <?php if (intval($consularcheck[3]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_pla_agr" <?php if (intval($agregarcheck[3]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_pla_mod" <?php if (intval($modificarcheck[3]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_pla_eli" <?php if (intval($eliminarcheck[3]) == 1)echo"checked"; ?> class="contabilidad"></td>
                    </tr>
                    <tr>
                        <td><label>Centro de costos</label></td>
                        <td><input type="checkbox" name="con_cen_con" <?php if (intval($consularcheck[4]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_cen_agr" <?php if (intval($agregarcheck[4]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_cen_mod" <?php if (intval($modificarcheck[4]) == 1)echo"checked"; ?> class="contabilidad"></td>
                        <td><input type="checkbox" name="con_cen_eli" <?php if (intval($eliminarcheck[4]) == 1)echo"checked"; ?> class="contabilidad"></td>
                    </tr>
            </tbody>
</table>
<h3><?php echo $modulos[2];?></h3>
<table class="table table-bordered table-hover table-striped table-condensed">
    <thead>      
        <tr>
            <th width="255px" bgcolor="#259BE7">
                <label><input type="checkbox" id="checkbank">        
                    <script> 
                        $('#checkbank').click(function(){if ($(this).prop('checked')) {$('.bancos').prop('checked', true);} else { $('.bancos').prop('checked', false);}});
                    </script>
                    Seleccionar Todo
                </label>
            </th>
            <th width="80px" bgcolor="#259BE7"><label>Consultar</label></th>
            <th width="80px" bgcolor="#259BE7"><label>Agregar</label></th>
            <th width="80px" bgcolor="#259BE7"><label>Modificar</label></th>
            <th width="80px" bgcolor="#259BE7"><label>Eliminar</label></th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td><label>Mis Bancos</label></td>
                <td><input type="checkbox" name="ban_mis_con" <?php if (intval($consularcheck[5]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_mis_agr" <?php if (intval($agregarcheck[5]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_mis_mod" <?php if (intval($modificarcheck[5]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_mis_eli" <?php if (intval($eliminarcheck[5]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
            <tr>
                <td><label>Estado de cuenta</label></td>
                <td><input type="checkbox" name="ban_est_con" <?php if (intval($consularcheck[6]) == 1)echo"checked"; ?> class="bancos"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label> Movimientos</label></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label> Anticipos</label></td>
                <td><input type="checkbox" name="ban_ant_con" <?php if (intval($consularcheck[8]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_ant_agr" <?php if (intval($agregarcheck[8]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_ant_mod" <?php if (intval($modificarcheck[8]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_ant_eli" <?php if (intval($eliminarcheck[8]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
            <tr>
                <td><label>Reposición Caja Chica</label></td>
                <td><input type="checkbox" name="ban_rep_con" <?php if (intval($consularcheck[9]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_rep_agr" <?php if (intval($agregarcheck[9]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_rep_mod" <?php if (intval($modificarcheck[9]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_rep_eli" <?php if (intval($eliminarcheck[9]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
            <tr>
                <td><label>Otros Movimientos</label></td>
                <td><input type="checkbox" name="ban_otr_con" <?php if (intval($consularcheck[10]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_otr_agr" <?php if (intval($agregarcheck[10]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_otr_mod" <?php if (intval($modificarcheck[10]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_otr_eli" <?php if (intval($eliminarcheck[10]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
            <tr>
                <td><label>Conciliaciones</label></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Conciliación Bancaria</label></td>
                <td><input type="checkbox" name="ban_con_con" <?php if (intval($consularcheck[12]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_con_agr" <?php if (intval($agregarcheck[12]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_con_mod" <?php if (intval($modificarcheck[12]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_con_eli" <?php if (intval($eliminarcheck[12]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
            <tr>
                <td><label>Cheques Protestados</label></td>
                <td><input type="checkbox" name="ban_che_con" <?php if (intval($consularcheck[13]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_che_agr" <?php if (intval($agregarcheck[13]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_che_mod" <?php if (intval($modificarcheck[13]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_che_eli" <?php if (intval($eliminarcheck[13]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
            <tr>
                <td><label>Tarjeta de Crédito</label></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Redes de cobro TC</label></td>
                <td><input type="checkbox" name="ban_red_con" <?php if (intval($consularcheck[15]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_red_agr" <?php if (intval($agregarcheck[15]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_red_mod" <?php if (intval($modificarcheck[15]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_red_eli" <?php if (intval($eliminarcheck[15]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
            <tr>
                <td><label>Liquidaciones</label></td>
                <td><input type="checkbox" name="ban_liq_con" <?php if (intval($consularcheck[16]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_liq_agr" <?php if (intval($agregarcheck[16]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_liq_mod" <?php if (intval($modificarcheck[16]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_liq_eli" <?php if (intval($eliminarcheck[16]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
            <tr>
                <td><label>Lotes</label></td>
                <td><input type="checkbox" name="ban_lot_con" <?php if (intval($consularcheck[17]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_lot_agr" <?php if (intval($agregarcheck[17]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_lot_mod" <?php if (intval($modificarcheck[17]) == 1)echo"checked"; ?> class="bancos"></td>
                <td><input type="checkbox" name="ban_lot_eli" <?php if (intval($eliminarcheck[17]) == 1)echo"checked"; ?> class="bancos"></td>
            </tr>
        </tbody>
    </table> 
    <table class="table table-bordered table-hover table-striped table-condensed">   
         <tr>
            <tr>
                <td colspan="5">
                    <h3><?php echo $modulos[12]; ?></h3>    
                </td>
            </tr>
            <tr>
                <td bgcolor="#259BE7">
                    <label><input type="checkbox" id="checkcrm">   
                        <script> 
                            $('#checkcrm').click(function(){if ($(this).prop('checked')) {$('.crm').prop('checked', true);} else { $('.crm').prop('checked', false);}});
                        </script>
                        Seleccionar Todo
                    </label>
                </td>
                <td bgcolor="#259BE7"><label>Consultar</label></td>
                <td bgcolor="#259BE7"><label>Agregar</label></td>
                <td bgcolor="#259BE7"><label>Modificar</label></td>
                <td bgcolor="#259BE7"><label>Eliminar</label></td>
            </tr>
            <tr>
                <td><label>Fidelización</label></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Niveles</label></td>
                <td><input type="checkbox" name="crm_niv_con" <?php if (intval($consularcheck[29]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_niv_agr" <?php if (intval($agregarcheck[29]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_niv_mod" <?php if (intval($modificarcheck[29]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_niv_eli" <?php if (intval($eliminarcheck[29]) == 1)echo"checked"; ?> class="crm"></td>
            </tr>
            <tr>
                <td><label>Segmentos</label></td>
                <td><input type="checkbox" name="crm_seg_con" <?php if (intval($consularcheck[30]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_seg_agr" <?php if (intval($agregarcheck[30]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_seg_mod" <?php if (intval($modificarcheck[30]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_seg_eli" <?php if (intval($eliminarcheck[30]) == 1)echo"checked"; ?> class="crm"></td>
            </tr>
            <tr>
                <td><label>Puntos/Promociones</label></td>
                <td><input type="checkbox" name="crm_pun_con" <?php if (intval($consularcheck[31]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_pun_agr" <?php if (intval($agregarcheck[31]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_pun_mod" <?php if (intval($modificarcheck[31]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_pun_eli" <?php if (intval($eliminarcheck[31]) == 1)echo"checked"; ?> class="crm"></td>
            </tr>
            <tr>
                <td><label>Reporte Promociones</label></td>
                <td><input type="checkbox" name="crm_rep_con" <?php if (intval($consularcheck[32]) == 1)echo"checked"; ?> class="crm"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Reglas de Consumo</label></td>
                <td><input type="checkbox" name="crm_reg_con" <?php if (intval($consularcheck[33]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_reg_agr" <?php if (intval($agregarcheck[33]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_reg_mod" <?php if (intval($modificarcheck[33]) == 1)echo"checked"; ?> class="crm"></td>
                <td><input type="checkbox" name="crm_reg_eli" <?php if (intval($eliminarcheck[33]) == 1)echo"checked"; ?> class="crm"></td>
            </tr>
        </tr>
    </table>
        <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <tr>
                <td colspan="5">
                    <h3><?php echo $modulos[3];?></h3>    
                </td>
            </tr>
            <tr>
                <td bgcolor="#259BE7">
                    <label> <input type="checkbox" id="checkpersonas">    
                        <script> 
                            $('#checkpersonas').click(function(){if ($(this).prop('checked')) {$('.personas').prop('checked', true);} else { $('.personas').prop('checked', false);}});
                        </script>
                        Seleccionar Todo
                    </label>
                </td>
                <td bgcolor="#259BE7"><label>Consultar</label></td>
                <td bgcolor="#259BE7"><label>Agregar</label></td>
                <td bgcolor="#259BE7"><label>Modificar</label></td>
                <td bgcolor="#259BE7"><label>Eliminar</label></td>
            </tr>
            <tr>
                <td><label>Personas</label></td>
                <td><input type="checkbox" name="per_per_con" <?php if (intval($consularcheck[18]) == 1)echo"checked"; ?> class="personas"></td>
                <td><input type="checkbox" name="per_per_agr" <?php if (intval($agregarcheck[18]) == 1)echo"checked"; ?> class="personas"></td>
                <td><input type="checkbox" name="per_per_mod" <?php if (intval($modificarcheck[18]) == 1)echo"checked"; ?> class="personas"></td>
                <td><input type="checkbox" name="per_per_eli" <?php if (intval($eliminarcheck[18]) == 1)echo"checked"; ?> class="personas"></td>
            </tr>
            <tr>
                <td><label>Bloquear destinatario</label></td>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="per_blo_mod" <?php if (intval($modificarcheck[19]) == 1)echo"checked"; ?> class="personas"></td>
                <td></td>
            </tr>
        </tr>
    </table>
        <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <tr>
                <td colspan="7">
                    <h3><?php echo $modulos[10]; ?></h3>    
                </td>
            </tr>
            <tr>
                <td>
                    <label> <input type="checkbox" id="checkrrhh">   
                        <script> 
                            $('#checkrrhh').click(function(){if ($(this).prop('checked')) {$('.rrhh').prop('checked', true);} else { $('.rrhh').prop('checked', false);}});
                        </script>
                        Seleccionar Todo
                    </label>
                </td>
                <td><label>Consultar</label></td>
                <td><label>Agregar</label></td>
                <td><label>Modificar</label></td>
                <td><label>Eliminar</label></td>
                <td><label>Aprobar</label></td>
                <td><label>Generar</label></td>
            </tr>
            <tr>
                <td><label>Cargos</label></td>
                <td><input type="checkbox" name="rrh_car_con" <?php if (intval($consularcheck[20]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_car_agr" <?php if (intval($agregarcheck[20]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_car_mod" <?php if (intval($modificarcheck[20]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_car_eli" <?php if (intval($eliminarcheck[20]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Departamentos</label></td>
                <td><input type="checkbox" name="rrh_dep_con" <?php if (intval($consularcheck[21]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_dep_agr" <?php if (intval($agregarcheck[21]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_dep_mod" <?php if (intval($modificarcheck[21]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_dep_eli" <?php if (intval($eliminarcheck[21]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Codigos</label></td>
                <td><input type="checkbox" name="rrh_cod_con" <?php if (intval($consularcheck[22]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_cod_agr" <?php if (intval($agregarcheck[22]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_cod_mod" <?php if (intval($modificarcheck[22]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_cod_eli" <?php if (intval($eliminarcheck[22]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Prestamos</label></td>
                <td><input type="checkbox" name="rrh_pre_con" <?php if (intval($consularcheck[23]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_pre_agr" <?php if (intval($agregarcheck[23]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_pre_mod" <?php if (intval($modificarcheck[23]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_pre_eli" <?php if (intval($eliminarcheck[23]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Quincenas</label></td>
                <td><input type="checkbox" name="rrh_qui_con" <?php if (intval($consularcheck[24]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_qui_agr" <?php if (intval($agregarcheck[24]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_qui_mod" <?php if (intval($modificarcheck[24]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_qui_eli" <?php if (intval($eliminarcheck[24]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_qui_apr" <?php if (intval($aprobarcheck[24]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_qui_gen" <?php if (intval($generarcheck[24]) == 1)echo"checked"; ?> class="rrhh"></td>
            </tr>
            <tr>
                <td><label>Semanas</label></td>
                <td></td>
                <td><input type="checkbox" name="rrh_sem_agr" <?php if (intval($agregarcheck[25]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_sem_mod" <?php if (intval($modificarcheck[25]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_sem_eli" <?php if (intval($eliminarcheck[25]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td></td>
                <td><input type="checkbox" name="rrh_sem_gen" <?php if (intval($generarcheck[25]) == 1)echo"checked"; ?> class="rrhh"></td>
            </tr>
            <tr>
                <td><label>Control Asistencia</label></td>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="rrh_con_mod" <?php if (intval($modificarcheck[26]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="rrh_con_gen" <?php if (intval($generarcheck[26]) == 1)echo"checked"; ?> class="rrhh"></td>
            </tr>
            <tr>
                <td><label>Plantillas Décimos</label></td>
                <td><input type="checkbox" name="rrh_pla_con" <?php if (intval($consularcheck[27]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td><input type="checkbox" name="rrh_pla_agr" <?php if (intval($agregarcheck[27]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td></td>
                <td><input type="checkbox" name="rrh_pla_eli" <?php if (intval($eliminarcheck[27]) == 1)echo"checked"; ?> class="rrhh"></td>
                <td></td>
                <td></td>
            </tr>
        </tr>
    </table>
    <h3><?php echo $modulos[11];?></h3>   
           <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            
            <tr>
                <td bgcolor="#259BE7">
                    <label> <input type="checkbox" id="checkimportaciones">    
                        <script> 
                            $('#checkimportaciones').click(function(){if ($(this).prop('checked')) {$('.importaciones').prop('checked', true);} else { $('.importaciones').prop('checked', false);}});
                        </script>
                        Seleccionar Todo
                    </label>
                </td>
                <td bgcolor="#259BE7"><label>Consultar</label></td>
                <td bgcolor="#259BE7"><label>Agregar</label></td>
                <td bgcolor="#259BE7"><label>Modificar</label></td>
                <td bgcolor="#259BE7"><label>Eliminar</label></td>
            </tr>
            <tr>
                <td><label>Importaciones</label></td>
                <td><input type="checkbox" name="imp_imp_con" <?php if (intval($consularcheck[34]) == 1)echo"checked"; ?> class="importaciones"></td>
                <td><input type="checkbox" name="imp_imp_agr" <?php if (intval($agregarcheck[34]) == 1)echo"checked"; ?> class="importaciones"></td>
                <td><input type="checkbox" name="imp_imp_mod" <?php if (intval($modificarcheck[34]) == 1)echo"checked"; ?> class="importaciones"></td>
                <td><input type="checkbox" name="imp_imp_eli" <?php if (intval($eliminarcheck[34]) == 1)echo"checked"; ?> class="importaciones"></td>
            </tr>
            <tr>
                <td><label>Liquidaciones</label></td>
                <td><input type="checkbox" name="imp_liq_con" <?php if (intval($consularcheck[35]) == 1)echo"checked"; ?> class="importaciones"></td>
                <td><input type="checkbox" name="imp_liq_agr" <?php if (intval($agregarcheck[35]) == 1)echo"checked"; ?> class="importaciones"></td>
                <td><input type="checkbox" name="imp_liq_mod" <?php if (intval($modificarcheck[35]) == 1)echo"checked"; ?> class="importaciones"></td>
                <td><input type="checkbox" name="imp_liq_eli" <?php if (intval($eliminarcheck[35]) == 1)echo"checked"; ?> class="importaciones"></td>
            </tr>
        </tr>
    </table>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <tr>
                <td colspan="5">
                    <h3><?php echo $modulos[13];?></h3>    
                </td>
            </tr>
            <tr>
                <td bgcolor="#259BE7">
                    <label> <input type="checkbox" id="checkactivo">    
                        <script> 
                            $('#checkactivo').click(function(){if ($(this).prop('checked')) {$('.activo').prop('checked', true);} else { $('.activo').prop('checked', false);}});
                        </script>
                        Seleccionar Todo
                    </label>
                </td>
                <td bgcolor="#259BE7"><label>Consultar</label></td>
                <td bgcolor="#259BE7"><label>Agregar</label></td>
                <td bgcolor="#259BE7"><label>Modificar</label></td>
                <td bgcolor="#259BE7"><label>Eliminar</label></td>
            </tr>
            <tr>
                <td><label>Activos Fijos</label></td>
                <td><input type="checkbox" name="act_act_con" <?php if (intval($consularcheck[36]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_act_agr" <?php if (intval($agregarcheck[36]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_act_mod" <?php if (intval($modificarcheck[36]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_act_eli" <?php if (intval($eliminarcheck[36]) == 1)echo"checked"; ?> class="activo"></td>
            </tr>
            <tr>
                <td><label>Configuraciones</label></td>
                <td></td>
                <td></td>
                <td><input type="checkbox" name="act_con_mod" <?php if (intval($modificarcheck[37]) == 1)echo"checked"; ?> class="activo"></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Categorías</label></td>
                <td><input type="checkbox" name="act_cat_con" <?php if (intval($consularcheck[38]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_cat_agr" <?php if (intval($agregarcheck[38]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_cat_mod" <?php if (intval($modificarcheck[38]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_cat_eli" <?php if (intval($eliminarcheck[38]) == 1)echo"checked"; ?> class="activo"></td>
            </tr>
            <tr>
                <td><label>Tipos</label></td>
                <td><input type="checkbox" name="act_tip_con" <?php if (intval($consularcheck[39]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_tip_agr" <?php if (intval($agregarcheck[39]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_tip_mod" <?php if (intval($modificarcheck[39]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_tip_eli" <?php if (intval($eliminarcheck[39]) == 1)echo"checked"; ?> class="activo"></td>
            </tr>
            <tr>
                <td><label>Ubicación</label></td>
                <td><input type="checkbox" name="act_ubi_con" <?php if (intval($consularcheck[40]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_ubi_agr" <?php if (intval($agregarcheck[40]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_ubi_mod" <?php if (intval($modificarcheck[40]) == 1)echo"checked"; ?> class="activo"></td>
                <td><input type="checkbox" name="act_ubi_eli" <?php if (intval($eliminarcheck[40]) == 1)echo"checked"; ?> class="activo"></td>
            </tr>
            
        </tr>
    </table>
    <table class="table table-bordered table-hover table-striped table-condensed">
       <tr>
           <tr>
               <td colspan="5">
                   <h3><?php echo $modulos[4];?></h3>    
               </td>
           </tr>
           <tr>
               <td bgcolor="#259BE7">
                   <label> <input type="checkbox" id="checkinventario">    
                       <script> 
                           $('#checkinventario').click(function(){if ($(this).prop('checked')) {$('.inventario').prop('checked', true);} else { $('.inventario').prop('checked', false);}});
                       </script>
                       Seleccionar Todo
                   </label>
               </td>
               <td bgcolor="#259BE7"><label>Consultar</label></td>
               <td bgcolor="#259BE7"><label>Agregar</label></td>
               <td bgcolor="#259BE7"><label>Modificar</label></td>
               <td bgcolor="#259BE7"><label>Eliminar</label></td>
               <td bgcolor="#259BE7"><label>Generar</label></td>
           </tr>
           <tr>
               <td><label>Movimientos</label></td>
               <td><input type="checkbox" name="inv_mov_con" <?php if (intval($consularcheck[41]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_mov_agr" <?php if (intval($agregarcheck[41]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_mov_mod" <?php if (intval($modificarcheck[41]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_mov_eli" <?php if (intval($eliminarcheck[41]) == 1)echo"checked"; ?> class="inventario"></td>
           </tr>
           <tr>
               <td><label>Toma Física Inventario</label></td>
               <td><input type="checkbox" name="inv_tom_con" <?php if (intval($consularcheck[42]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_tom_agr" <?php if (intval($agregarcheck[42]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_tom_mod" <?php if (intval($modificarcheck[42]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_tom_eli" <?php if (intval($eliminarcheck[42]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_tom_gen" <?php if (intval($generarcheck[42]) == 1)echo"checked"; ?> class="inventario"></td>
            </tr>
           <tr>
               <td><label>Administrar Series</label></td>
               <td></td>
               <td><input type="checkbox" name="inv_adm_agr" <?php if (intval($agregarcheck[43]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
               <td></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Unidades</label></td>
               <td><input type="checkbox" name="inv_uni_con" <?php if (intval($consularcheck[44]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_uni_agr" <?php if (intval($agregarcheck[44]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_uni_mod" <?php if (intval($modificarcheck[44]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_uni_eli" <?php if (intval($eliminarcheck[44]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
            </tr>
           <tr>
               <td><label>Categorías</label></td>
               <td><input type="checkbox" name="inv_cat_con" <?php if (intval($consularcheck[45]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_cat_agr" <?php if (intval($agregarcheck[45]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_cat_mod" <?php if (intval($modificarcheck[45]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_cat_eli" <?php if (intval($eliminarcheck[45]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
            </tr>
           <tr>
               <td><label>Productos</label></td>
               <td><input type="checkbox" name="inv_pro_con" <?php if (intval($consularcheck[46]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_pro_agr" <?php if (intval($agregarcheck[46]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_pro_mod" <?php if (intval($modificarcheck[46]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_pro_eli" <?php if (intval($eliminarcheck[46]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
            </tr>
           <tr>
               <td><label>Bodegas</label></td>
               <td><input type="checkbox" name="inv_bod_con" <?php if (intval($consularcheck[47]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_bod_agr" <?php if (intval($agregarcheck[47]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_bod_mod" <?php if (intval($modificarcheck[47]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_bod_eli" <?php if (intval($eliminarcheck[47]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
            </tr>
           <tr>
               <td><label>Movimientos tránsito</label></td>
               <td></td>
               <td><input type="checkbox" name="inv_bod_agr" <?php if (intval($agregarcheck[48]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_bod_mod" <?php if (intval($modificarcheck[48]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_bod_eli" <?php if (intval($eliminarcheck[48]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
            </tr>
           <tr>
               <td><label>Producción</label></td>
               <td><input type="checkbox" name="inv_prod_con" <?php if (intval($consularcheck[49]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_prod_agr" <?php if (intval($agregarcheck[49]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_prod_mod" <?php if (intval($modificarcheck[49]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_prod_eli" <?php if (intval($eliminarcheck[49]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
            </tr>
           <tr>
               <td><label>Fórmula</label></td>
               <td></td>
               <td></td>
               <td><input type="checkbox" name="inv_for_mod" <?php if (intval($modificarcheck[50]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Guías de Remisión</label></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Guías de Remisión</label></td>
               <td><input type="checkbox" name="inv_gui_con" <?php if (intval($consularcheck[51]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_gui_agr" <?php if (intval($agregarcheck[51]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_gui_mod" <?php if (intval($modificarcheck[51]) == 1)echo"checked"; ?> class="inventario"></td>
               <td><input type="checkbox" name="inv_gui_eli" <?php if (intval($eliminarcheck[51]) == 1)echo"checked"; ?> class="inventario"></td>
               <td></td>
            </tr>
           
       </tr>
    </table>
    <table class="table table-bordered table-hover table-striped table-condensed">
       <tr>
           <tr>
               <td colspan="5">
                   <h3><?php echo $modulos[5];?></h3>    
               </td>
           </tr>
           <tr>
               <td bgcolor="#259BE7">
                   <label> <input type="checkbox" id="checktransacciones">    
                       <script> 
                           $('#checktransacciones').click(function(){if ($(this).prop('checked')) {$('.transacciones').prop('checked', true);} else { $('.transacciones').prop('checked', false);}});
                       </script>
                       Seleccionar Todo
                   </label>
               </td>
               <td bgcolor="#259BE7"><label>Consultar</label></td>
               <td bgcolor="#259BE7"><label>Agregar</label></td>
               <td bgcolor="#259BE7"><label>Modificar</label></td>
               <td bgcolor="#259BE7"><label>Eliminar</label></td>
               <td bgcolor="#259BE7"><label>Aprobar</label></td>
               <td bgcolor="#259BE7"><label>Configurar</label></td>
           </tr>
           <tr>
               <td><label>Bandeja electrónica</label></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Retenciones</label></td>
               <td><input type="checkbox" name="tra_ret_con" <?php if (intval($consularcheck[62]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_ret_agr" <?php if (intval($agregarcheck[62]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td><input type="checkbox" name="tra_ret_eli" <?php if (intval($eliminarcheck[62]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Facturas</label></td>
               <td><input type="checkbox" name="tra_fac_con" <?php if (intval($consularcheck[53]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_fac_agr" <?php if (intval($agregarcheck[53]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td></td>
               <td></td>
               <td><input type="checkbox" name="tra_fac_conf" <?php if (intval($configurarcheck[53]) == 1)echo"checked"; ?> class="transacciones"></td>
            </tr>
            <tr>
               <td><label>Proformas</label></td>
               <td><input type="checkbox" name="tra_pro_con" <?php if (intval($consularcheck[54]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_pro_agr" <?php if (intval($agregarcheck[54]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_pro_mod" <?php if (intval($modificarcheck[54]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_pro_eli" <?php if (intval($eliminarcheck[54]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Cotizaciones</label></td>
               <td><input type="checkbox" name="tra_cot_con" <?php if (intval($consularcheck[55]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_cot_agr" <?php if (intval($agregarcheck[55]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_cot_mod" <?php if (intval($modificarcheck[55]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td><input type="checkbox" name="tra_cot_apr" <?php if (intval($aprobarcheck[55]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Prefacturas</label></td>
               <td><input type="checkbox" name="tra_pre_con" <?php if (intval($consularcheck[56]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_pre_agr" <?php if (intval($agregarcheck[56]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_pre_mod" <?php if (intval($modificarcheck[56]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td><input type="checkbox" name="tra_pre_apr" <?php if (intval($aprobarcheck[56]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Orden de compra/contrato</label></td>
               <td><input type="checkbox" name="tra_ord_con" <?php if (intval($consularcheck[57]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_ord_agr" <?php if (intval($agregarcheck[57]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_ord_mod" <?php if (intval($modificarcheck[57]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td><input type="checkbox" name="tra_ord_apr" <?php if (intval($aprobarcheck[57]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Compra/Venta</label></td>
               <td><input type="checkbox" name="tra_com_con" <?php if (intval($consularcheck[58]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_com_agr" <?php if (intval($agregarcheck[58]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_com_mod" <?php if (intval($modificarcheck[58]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_com_eli" <?php if (intval($eliminarcheck[58]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Cierre Caja en Nube</label></td>
               <td><input type="checkbox" name="tra_cie_con" <?php if (intval($consularcheck[59]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_cie_agr" <?php if (intval($agregarcheck[59]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_cie_mod" <?php if (intval($modificarcheck[59]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Anulaciones</label></td>
               <td><input type="checkbox" name="tra_anu_con" <?php if (intval($consularcheck[60]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_anu_agr" <?php if (intval($agregarcheck[60]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Cobros/Pagos</label></td>
               <td><input type="checkbox" name="tra_cob_con" <?php if (intval($consularcheck[61]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_cob_agr" <?php if (intval($agregarcheck[61]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_cob_mod" <?php if (intval($modificarcheck[61]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_cob_eli" <?php if (intval($eliminarcheck[61]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td><label>Depósitos</label></td>
               <td><input type="checkbox" name="tra_dep_con" <?php if (intval($consularcheck[63]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_dep_agr" <?php if (intval($agregarcheck[63]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_dep_mod" <?php if (intval($modificarcheck[63]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td><input type="checkbox" name="tra_dep_eli" <?php if (intval($eliminarcheck[63]) == 1)echo"checked"; ?> class="transacciones"></td>
               <td></td>
               <td></td>
            </tr>
          
           
       </tr>
       <table>
       <table class="table table-bordered table-hover table-striped table-condensed">

       <tr>
           <tr>
               <td colspan="5">
                   <h3><?php echo $modulos[7];?></h3>    
               </td>
           </tr>
           <tr>
               <td bgcolor="#259BE7">
                   <label> <input type="checkbox" id="checkreportes">    
                       <script> 
                           $('#checkreportes').click(function(){if ($(this).prop('checked')) {$('.reportes').prop('checked', true);} else { $('.reportes').prop('checked', false);}});
                       </script>
                       Seleccionar Todo
                   </label>
               </td>
               <td bgcolor="#259BE7"><label>Acceder</label></td>
           </tr>
           <tr>
               <td><label>Financieros</label></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Ingresos / Egresos</label></td>
               <td><input type="checkbox" name="rep_ing_acc" <?php if (intval($accedercheck[67]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Estado de Resultados</label></td>
               <td><input type="checkbox" name="rep_est_acc" <?php if (intval($accedercheck[68]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Balance General</label></td>
               <td><input type="checkbox" name="rep_bal_acc" <?php if (intval($accedercheck[69]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Balance General de Comprobación</label></td>
               <td><input type="checkbox" name="rep_balc_acc" <?php if (intval($accedercheck[70]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Flujo de Caja</label></td>
               <td><input type="checkbox" name="rep_flu_acc" <?php if (intval($accedercheck[71]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Ventas</label></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Resumen Gerencial</label></td>
               <td><input type="checkbox" name="rep_res_acc" <?php if (intval($accedercheck[72]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Ventas</label></td>
               <td><input type="checkbox" name="rep_ven_acc" <?php if (intval($accedercheck[73]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label> Ventas por Productos/Servicios</label></td>
               <td><input type="checkbox" name="rep_venps_acc" <?php if (intval($accedercheck[74]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Ventas por vendedor</label></td>
               <td><input type="checkbox" name="rep_venv_acc" <?php if (intval($accedercheck[75]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Costos de Venta</label></td>
               <td><input type="checkbox" name="rep_cos_acc" <?php if (intval($accedercheck[76]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Ventas POS</label></td>
               <td><input type="checkbox" name="rep_venp_acc" <?php if (intval($accedercheck[77]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Tickets consumidos</label></td>
               <td><input type="checkbox" name="rep_tic_acc" <?php if (intval($accedercheck[78]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>De Gestión</label></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Gastos no deducibles</label></td>
               <td><input type="checkbox" name="rep_gas_acc" <?php if (intval($accedercheck[79]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Control de cartera</label></td>
               <td><input type="checkbox" name="rep_con_acc" <?php if (intval($accedercheck[80]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Clientes</label></td>
               <td><input type="checkbox" name="rep_cli_acc" <?php if (intval($accedercheck[81]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Proveedores</label></td>
               <td><input type="checkbox" name="rep_pro_acc" <?php if (intval($accedercheck[82]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Ventas Semanal</label></td>
               <td><input type="checkbox" name="rep_vens_acc" <?php if (intval($accedercheck[83]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Control de anticipos</label></td>
               <td><input type="checkbox" name="rep_cona_acc" <?php if (intval($accedercheck[84]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Inventario</label></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Saldos</label></td>
               <td><input type="checkbox" name="rep_sal_acc" <?php if (intval($accedercheck[85]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Saldos Disponibles</label></td>
               <td><input type="checkbox" name="rep_sald_acc" <?php if (intval($accedercheck[86]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Kardex</label></td>
               <td><input type="checkbox" name="rep_kar_acc" <?php if (intval($accedercheck[87]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Bitácora Importación</label></td>
               <td><input type="checkbox" name="rep_bit_acc" <?php if (intval($accedercheck[88]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Egresos por Centro de Costo</label></td>
               <td><input type="checkbox" name="rep_egr_acc" <?php if (intval($accedercheck[89]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Costos estimados</label></td>
               <td><input type="checkbox" name="rep_cose_acc" <?php if (intval($accedercheck[90]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Inventario vs. Asientos</label></td>
               <td><input type="checkbox" name="rep_inv_acc" <?php if (intval($accedercheck[91]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Consulta cuentas</label></td>
               <td><input type="checkbox" name="rep_conc_acc" <?php if (intval($accedercheck[92]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>SRI</label></td>
               <td></td>
           </tr>
           <tr>
               <td><label>ATS</label></td>
               <td><input type="checkbox" name="rep_ats_acc" <?php if (intval($accedercheck[93]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Formulario 104</label></td>
               <td><input type="checkbox" name="rep_for4_acc" <?php if (intval($accedercheck[94]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Formulario 103</label></td>
               <td><input type="checkbox" name="rep_for3_acc" <?php if (intval($accedercheck[95]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Anexo Tributario ICE</label></td>
               <td><input type="checkbox" name="rep_ane_acc" <?php if (intval($accedercheck[96]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Compra/venta</label></td>
               <td><input type="checkbox" name="rep_com_acc" <?php if (intval($accedercheck[97]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Dinardap</label></td>
               <td><input type="checkbox" name="rep_din_acc" <?php if (intval($accedercheck[98]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>RRHH</label></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Cobros / Pagos</label></td>
               <td><input type="checkbox" name="rep_cob_acc" <?php if (intval($accedercheck[99]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
           <tr>
               <td><label>Auditoría</label></td>
               <td></td>
           </tr>
           <tr>
               <td><label>Log de Actividades</label></td>
               <td><input type="checkbox" name="rep_log_acc" <?php if (intval($accedercheck[100]) == 1)echo"checked"; ?> class="reportes"></td>
           </tr>
          
           
       </tr>
    </table>
    <table class="table table-bordered table-hover table-striped table-condensed"> 
       <tr>
            <tr>
                <td colspan="5">
                    <h3><?php echo $modulos[8];?></h3>    
                </td>
            </tr>
            <tr>
                <td bgcolor="#259BE7">
                    <label> <input type="checkbox" id="checkreportesp">    
                        <script> 
                            $('#checkreportesp').click(function(){if ($(this).prop('checked')) {$('.reportesp').prop('checked', true);} else { $('.reportesp').prop('checked', false);}});
                        </script>
                        Seleccionar Todo
                    </label>
                </td>
                <td bgcolor="#259BE7"><label>Consultar</label></td>
                <td bgcolor="#259BE7"><label>Agregar</label></td>
                <td bgcolor="#259BE7"><label>Modificar</label></td>
                <td bgcolor="#259BE7"><label>Eliminar</label></td>
            </tr>
            <tr>
                <td><label>Compras/Ventas</label></td>
                <td><input type="checkbox" name="repp_com_con" <?php if (intval($consularcheck[64]) == 1)echo"checked"; ?> class="reportesp"></td>
                <td><input type="checkbox" name="repp_com_agr" <?php if (intval($agregarcheck[64]) == 1)echo"checked"; ?> class="reportesp"></td>
                <td><input type="checkbox" name="repp_com_mod" <?php if (intval($modificarcheck[64]) == 1)echo"checked"; ?> class="reportesp"></td>
                <td><input type="checkbox" name="repp_com_eli" <?php if (intval($eliminarcheck[64]) == 1)echo"checked"; ?> class="reportesp"></td>
            </tr>
        </tr>
    </table>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <tr>
                <td colspan="5">
                    <h3><?php echo $modulos[9];?></h3>    
                </td>
            </tr>
            <tr>
                <td bgcolor="#259BE7">
                    <label> <input type="checkbox" id="checkpos">    
                        <script> 
                            $('#checkpos').click(function(){if ($(this).prop('checked')) {$('.pos').prop('checked', true);} else { $('.pos').prop('checked', false);}});
                        </script>
                        Seleccionar Todo
                    </label>
                </td>
                <td bgcolor="#259BE7"><label>Acceder</label></td>
               
            </tr>
            <tr>
                <td><label>Generar Archivos</label></td>
                <td><input type="checkbox" name="pos_gen_acc" <?php if (intval($accedercheck[65]) == 1)echo"checked"; ?> class="pos"></td>
               
            </tr>
            <tr>
                <td><label>Subir Ventas</label></td>
                <td><input type="checkbox" name="pos_sub_acc" <?php if (intval($accedercheck[66]) == 1)echo"checked"; ?> class="pos"></td>
               
            </tr>
        </tr>
        
            </table>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>