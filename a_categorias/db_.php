<?php
require_once("../control_db.php");

if($_SESSION['des']==1 and strlen($function)==0)
{
	echo "<div class='alert alert-primary' role='alert' style='font-size:10px'>";
	$arrayx=explode('/', $_SERVER['SCRIPT_NAME']);
	echo print_r($arrayx);
	echo "<br>";
	echo print_r($_REQUEST);
	echo "</div>";
}

class Categoria extends Sagyc{
	public $nivel_personal;
	public $nivel_captura;
	public function __construct(){
		parent::__construct();
		if(isset($_SESSION['idusuario']) and $_SESSION['autoriza'] == 1 and array_key_exists('CATEGORIA', $this->derecho)) {
			////////////////PERMISOS
			$sql="SELECT nivel,captura FROM usuarios_permiso where idusuario='".$_SESSION['idusuario']."' and modulo='CATEGORIA'";
			$stmt= $this->dbh->query($sql);

			$row =$stmt->fetchObject();
			$this->nivel_personal=$row->nivel;
			$this->nivel_captura=$row->captura;
		}
		else{
			include "../error.php";
			die();
		}
	}
	public function categoria_lista(){
		try{

			$sql="SELECT * FROM categorias where idtienda='".$_SESSION['idtienda']."'";
			$sth = $this->dbh->prepare($sql);
			$sth->execute();
			return $sth->fetchAll(PDO::FETCH_OBJ);
		}
		catch(PDOException $e){
			return "Database access FAILED!".$e->getMessage();
		}
	}
	public function categorias_buscar($texto){
		try{
			$sql="SELECT * FROM categorias where categorias.nombre like '%$texto%' and idtienda='".$_SESSION['idtienda']."'";
			$sth = $this->dbh->prepare($sql);
			$sth->execute();
			return $sth->fetchAll(PDO::FETCH_OBJ);
		}
		catch(PDOException $e){
			return "Database access FAILED!".$e->getMessage();
		}
	}
	public function categoria($id){
		try{
		  $sql="select * from categorias where idcat=:id";
		  $sth = $this->dbh->prepare($sql);
		  $sth->bindValue(":id",$id);
		  $sth->execute();
		  return $sth->fetch(PDO::FETCH_OBJ);
		}
		catch(PDOException $e){
		  return "Database access FAILED!".$e->getMessage();
		}
	}
	public function guardar_categoria(){
		$x="";
		$arreglo =array();
		$idcat=$_REQUEST['idcat'];
		if (isset($_REQUEST['nombre'])){
			$arreglo+=array('nombre'=>$_REQUEST['nombre']);
		}

		if($idcat==0){
			$arreglo+=array('idtienda'=>$_SESSION['idtienda']);
			$x=$this->insert('categorias', $arreglo);
		}
		else{
			$x=$this->update('categorias',array('idcat'=>$idcat), $arreglo);
		}
		return $x;
	}
	public function borrar_categoria(){
		if (isset($_REQUEST['id'])){ $id=$_REQUEST['id']; }
		return $this->borrar('categorias',"id",$id);
	}
	public function foto_cat(){
		$x="";
		$arreglo =array();
		$idcat=$_REQUEST['idcat'];

		$sql="select * from categorias where idcat=:id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":idcat",$idcat);
		$sth->execute();
		$prod=$sth->fetch(PDO::FETCH_OBJ);

		if(strlen($prod->archivo)>0){
			$ruta = '../'.$this->f_categoria.$prod->archivo;
			if (file_exists($ruta)){
				unlink($ruta);
			}
		}
		$extension = '';
		$ruta = '../'.$this->f_categoria;
		$archivo = $_FILES['foto']['tmp_name'];
		$nombrearchivo = $_FILES['foto']['name'];
		$tmp=$_FILES['foto']['tmp_name'];
		$info = pathinfo($nombrearchivo);
		if($archivo!=""){
			$extension = $info['extension'];
			if ($extension=='png' || $extension=='PNG' || $extension=='jpg'  || $extension=='JPG') {
				$nombreFile = "resp_".date("YmdHis").rand(0000,9999).".".$extension;
				move_uploaded_file($tmp,$ruta.$nombreFile);
				$ruta=$ruta."/".$nombreFile;
				$arreglo+=array('archivo'=>$nombreFile);
			}
			else{
				echo "fail";
				exit;
			}
		}
		return $this->update('categorias',array('idcat'=>$idcat), $arreglo);

	}
}

$db = new Categoria();
if(strlen($function)>0){
	echo $db->$function();
}
