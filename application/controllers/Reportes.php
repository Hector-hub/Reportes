<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
public function __construct()
{

  parent::__construct();
  $this->load->helper('login');
  $metodo= $this->router->fetch_method();
    if (!isset($_SESSION['usuario']) && $metodo != 'login' && $metodo!='registro' && $metodo!='index' && $metodo!='detalles'){
      redirect('reportes/login');
    }
}

	 function index()
	{
$this->load->view('plantilla/encabezado');
$this->load->view('inicio');
$this->load->view('plantilla/pie');


}
function login(){
$this->load->view('login');
}
function salir(){
  unset($_SESSION['usuario']);
    redirect('');
}
  function agregar($id=0){

if($_POST){
$data= array();
$data['id']=$_POST['id'];
$data['fecha']=$_POST['fecha'];
$data['tipo']=$_POST['tipo'];
$data['descripcion']=$_POST['descripcion'];
$data['id_usuario']=$_POST['id_usuario'];
$data['img']="archivos/fotos/{$data['id']}.jpg";
$data['lat']=$_POST['lat'];
$data['lng']=$_POST['lng'];


if ($id>0){
  $this->db->where('id',$data['id']);
  $this->db->update('reportes',$data);
  echo "<script>alert('Se ha actualizado')</script>";
  if($_FILES['foto']['error']==0){
    unlink($data['img']);
    move_uploaded_file($_FILES['foto']['tmp_name'],"archivos/fotos/{$data['id']}.jpg");
  }

}else{
  echo "<script>alert('Se ha guardado')</script>";
  $this->db->insert('reportes',$data);
  if($_FILES['foto']['error']==0){
    move_uploaded_file($_FILES['foto']['tmp_name'],"archivos/fotos/{$data['id']}.jpg");

  }

}

}

    $this->load->view('plantilla/encabezado');
$this->load->view('agregar',array('id'=>$id));
$this->load->view('plantilla/pie');
  }

  function detalles($id=0){
    $this->load->view('plantilla/encabezado');
$this->load->view('detalles',array('id'=>$id));
$this->load->view('plantilla/pie');
  }
 function registro(){
   $this->load->view('registrarse');
 }
 function eliminar($id=0){
   $this->db->where('id',$id);
  $e=$this->db->get('reportes')->result_array();
   unlink($e[0]['img']);
   $this->db->where('id',$id);
   $this->db->delete('reportes');
redirect('');
 }
 function mostrartodos($id=0){
   $this->load->view('plantilla/encabezado');
$this->load->view('treportes');
$this->load->view('plantilla/pie');
 }
}
