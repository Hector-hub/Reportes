<?php
function iniciarSesion($inicio_u){
$CI =& get_instance();
$CI->db->where('correo',$inicio_u->correo);
$CI->db->where('clave',base64_encode($inicio_u->clave));
$rs=$CI->db->get('cuentas')->result_array();

  if(count($rs)>0){
    $_SESSION['usuario']=$rs[0];
      $_SESSION['nombre']=$rs[3];
    return true;
  }else{
    return false;
  }
}
 ?>
