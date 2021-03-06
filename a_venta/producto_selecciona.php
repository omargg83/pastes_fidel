<?php
	require_once("db_.php");
	$idproducto=$_REQUEST['idproducto'];
	$idventa=$_REQUEST['idventa'];

	$sql="SELECT * from productos
	left outer join productos_catalogo on productos_catalogo.idcatalogo=productos.idcatalogo
	where idproducto=:id";
	$sth = $db->dbh->prepare($sql);
	$sth->bindValue(":id",$idproducto);
	$sth->execute();
	$producto=$sth->fetch(PDO::FETCH_OBJ);

	if($producto->tipo==3){
		$sql="select sum(cantidad) as total from bodega where idsucursal='".$_SESSION['idsucursal']."' and idproducto='$producto->idproducto'";
		$sth = $db->dbh->prepare($sql);
		$sth->execute();
		$cantidad=$sth->fetch(PDO::FETCH_OBJ);
		$exist=$cantidad->total;
	}
	else{
		$exist=$producto->cantidad;
	}

	//////////////////////variables a utilizar para los 2 esquemas que se requieren segun el ejemplo de excel que te mande men
	$producto->esquema;

	$producto->cantidad;
	$producto->precio; //precio unitario * cantidad (menudeo)

	$producto->monto_mayor;
	$producto->monto_distribuidor;

	echo "<form id='form_prod' is='is-selecciona'>";

		echo "<input type='hidden' class='form-control form-control-sm' name='idproducto' id='idproducto' value='$producto->idproducto' readonly>";
		echo "<div class='modal-header'>";
	  	echo "<h5 class='modal-title'>Agregar producto</h5>";
	  echo "</div>";

		echo "<div class='modal-body' style='max-height:580px;overflow: auto;'>";
			echo "<div class='row'>";
				echo "<div class='col-2'>";
					if(strlen($producto->archivo)>0 and file_exists("../".$db->f_productos."/".$producto->archivo)){
						echo "<img src='".$db->f_productos."/".$producto->archivo."' width='100%' class='img-thumbnail'/>";
					}
					else{
						echo "<img src='img/unnamed.png' width='100%' class='img-thumbnail'/>";
					}

				echo "</div>";
				echo "<div class='col-10'>";
					echo "<div class='row'>";
						echo "<div class='col-12'>";
							echo "<input type='text' class='form-control' name='nombre' id='nombre' value='".$producto->nombre."' readonly>";
							echo "<br>";
							echo $producto->descripcion;
							echo "<hr>";
						echo "</div>";
					echo "</div>";

					echo "<div class='row'>";

						echo "<div class='col-sm-6 col-md-12 col-lg-3 col-xl-3'>";
							echo "<label><b>Cantidad</b></label>";
							echo "<input type='number' min=0 max=9999 class='form-control' is='f-cantidad' name='cantidad' id='cantidad' value='1' required>";
						echo "</div>";

						echo "<div class='col-sm-6 col-md-12 col-lg-3 col-xl-3'>";
							echo "<label><b>Precio a aplicar x Unidad</b></label>";
							echo "<input type='text' class='form-control' name='precio' id='precio' value='".$producto->precio."' readonly>";
						echo "</div>";

						echo "<div class='col-sm-6 col-md-12 col-lg-3 col-xl-3'>";
							echo "<label><b>Existencia</b>:</label>";
							echo "<input type='text' class='form-control' name='existencia' id='existencia' value='$exist' readonly>";
						echo "</div>";

						echo "<div class='col-sm-6 col-md-12 col-lg-3 col-xl-3'>";
							echo "<label>Total</label>";
							echo "<input type='text' class='form-control form-control-sm' name='normal' id='normal' value='".$producto->precio."' readonly>";
						echo "</div>";

					echo "</div>";


				echo "</div>";

			echo "</div>";

		echo "</div>";
		echo "<div class='modal-footer'>";
			echo "<div class='row'>";
				echo "<div class='col-12'>";
					echo "<div class='btn-group'>";
							echo "<button class='btn btn-warning btn-xs' type='submit' ><i class='fas fa-cart-plus'></i>Agregar</button>";
							echo "<button class='btn btn-warning btn-xs' type='button' is='b-link' cmodal='1' ><i class='fas fa-sign-out-alt'></i>Cancelar</button>";
					echo "</div>";
				echo "</div>";
			echo "</di	v>";
		echo "</div>";

	echo "</form>";
?>
