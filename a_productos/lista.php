<?php
	require_once("db_.php");

	$pag=0;
	$texto="";
	if(isset($_REQUEST['buscar'])){
		$texto=$_REQUEST['buscar'];
		$pd = $db->producto_buscar($texto);
		$texto=1;
	}
	else{
		if(isset($_REQUEST['pag'])){
			$pag=$_REQUEST['pag'];
		}
		$pd = $db->productos_lista($pag);
	}
	$sucursal=$db->sucursal();

	echo "<div class='container-fluid'>";
?>


<div class='tabla_css' id='tabla_css'>
	<div class='row titulo-row'>
		<div class='col-12'>
			LISTA DE PRODUCTOS
		</div>
	</div>
	<div class='row header-row'>
		<div class='col-6 col-sm-6 col-md-3 col-lg-4 col-xl-3'>#</div>
		<div class='col-6 col-sm-6 col-md-3 col-lg-4 col-xl-3'>ID</div>
		<div class='col-6 col-sm-6 col-md-3 col-lg-4 col-xl-3'>Codigo</div>
		<div class='col-6 col-sm-6 col-md-3 col-lg-4 col-xl-3'>Nombre</div>
	</div>

		<?php
			foreach($pd as $key){
				echo "<div class='row body-row' draggable='true'>";
					echo "<div class='col-6 col-sm-6 col-md-3 col-lg-4 col-xl-3'>";
						echo "<div class='btn-group'>";

						echo "<button type='button' class='btn btn-warning btn-sm' id='edit_persona' is='b-link' title='Editar' des='a_productos/editar' dix='trabajo' v_idcatalogo='$key->idcatalogo'><i class='fas fa-pencil-alt'></i></button>";

						////////////quitar este boton o esconder
					//	echo "<button type='button' class='btn btn-danger btn-sm' id='edit_persona' is='b-link' title='Editar' des='a_productos/homologar' omodal=1 v_idcatalogo='$key->idcatalogo'><i class='fas fa-pencil-alt'></i>HOMOLOGAR</button>";

						echo "</div>";
					echo "</div>";

					echo "<div class='col-6 col-sm-6 col-md-3 col-lg-4 col-xl-3'>";
						if($key->tipo==0) echo "Servicio";
						if($key->tipo==3) echo "Producto";
					echo "</div>";

					echo "<div class='col-6 col-sm-6 col-md-3 col-lg-4 col-xl-3'>".$key->codigo."</div>";
					echo "<div class='col-6 col-sm-6 col-md-3 col-lg-4 col-xl-3'>".$key->nombre."</div>";
				echo '</div>';
			}
		?>

	</div>
</div>


	<?php
		if(strlen($texto)==0){
			$sql="SELECT count(productos_catalogo.idcatalogo) as total
			from productos_catalogo	where productos_catalogo.idtienda='".$_SESSION['idtienda']."'";
			$sth = $db->dbh->query($sql);
			$contar=$sth->fetch(PDO::FETCH_OBJ);
			$paginas=ceil($contar->total/$_SESSION['pagina']);
			$pagx=$paginas-1;
			echo $db->paginar($paginas,$pag,$pagx,"a_productos/lista","trabajo");
		}
	?>
