<?php
	require_once("db_.php");

	$pag=0;
	$texto="";
	if(isset($_REQUEST['buscar'])){
		$texto=$_REQUEST['buscar'];
		$pd = $db->producto_buscar($texto);
	}
	else{
		if(isset($_REQUEST['pag'])){
			$pag=$_REQUEST['pag'];
		}
		$pd = $db->productos_lista($pag);
	}
?>
<div class='container'>

	<div class='tabla_v' id='tabla_css'>
		<div class='title-row'>
			<div>
				INVENTARIO DE PRODUCTOS
			</div>
		</div>
		<div class='header-row'>
			<div class='cell'>#</div>
			<div class='cell'>Código</div>
			<div class='cell'>Nombre</div>
			<div class='cell'>Existencia</div>
			<div class='cell'>Precio de venta</div>
		</div>

			<?php
				foreach($pd as $key){
					echo "<div class='body-row' >";
						echo "<div class='cell'>";
							echo "<div class='btn-group'>";

							echo "<button type='button' class='btn btn-warning btn-sm' id='edit_persona' is='b-link' title='Editar' des='a_inventario/editar' dix='trabajo' v_idproducto='$key->idproducto'><i class='fas fa-pencil-alt'></i></button>";

							if($_SESSION['nivel']==66){
								echo "<button type='button' class='btn btn-warning btn-sm' id='edit_persona' is='b-link' title='Editar' des='a_inventario/editar' omodal='1' dix='trabajo' v_idproducto='$key->idproducto' v_rapido='1'><i class='fab fa-searchengin'></i></button>";
							}

							if($key->tipo==3){
								$sql="select sum(cantidad) as total from bodega where idsucursal='".$_SESSION['idsucursal']."' and idproducto='$key->idproducto'";
								$sth = $db->dbh->prepare($sql);
								$sth->execute();
								$cantidad=$sth->fetch(PDO::FETCH_OBJ);
								if(strlen($cantidad->total)>0){
									$exist=$cantidad->total;
								}
								else{
									$exist=0;
								}
							}
							else{
								$exist=$key->cantidad;
							}
							if($key->tipo==3){
							if($cantidad->total>0 and $key->activo_producto==1 ){
								echo "<button type='button'  id='0' des='' dix='0' v_idproducto='0' class='btn btn-warning btn-sm' title='Producto en existencia' omodal='1'><i class='far fa-thumbs-up'></i></button>";
							}
							else if ($cantidad->total<=0 and $key->activo_producto==1){
								echo "<button type='button'  id='0' des='' dix='0' v_idproducto='0' class='btn btn-danger btn-sm' title='Producto sin stock' omodal='1'><i class='far fa-thumbs-down'></i></button>";
							}
							else if ($key->activo_producto==0){
								echo "<button type='button'  id='0' des='' dix='0' v_idproducto='0' class='btn btn-secondary btn-sm' title='Producto inactivo' omodal='1'><i class='fas fa-ban'></i></button>";
							}
							}
							//////
							echo "</div>";
						echo "</div>";

						echo "<div class='cell' data-titulo='Código'>";
							echo $key->codigo;
						echo "</div>";

						echo "<div class='cell' data-titulo='Nombre'>".$key->nombre."</div>";

						echo "<div class='cell' data-titulo='Existencia'>";

							if($_SESSION['nivel']==66){
								echo "Sum:".$exist;
								echo "<br>Tabla:".$key->cantidad;
								$sql="select * from bodega where idproducto='$key->idproducto' order by fecha desc limit 1";
								$sth = $db->dbh->prepare($sql);
								$sth->execute();
								if($sth->rowCount()>0){
									$bod=$sth->fetch(PDO::FETCH_OBJ);
									echo "<br>Bodega: ".$bod->existencia;
									$bod=$bod->existencia;
								}
								else{
									$bod=0;
									echo "<br>Bodega: 0";
								}
								if($exist==$key->cantidad and $key->cantidad==$bod){

								}
								else{
									echo "<B>MAL</B>";
								}
							}
							else{
								echo $exist;
							}
						echo "</div>";

						echo "<div class='cell text-right' data-titulo='Precio de venta'>".moneda($key->precio)."</div>";
					echo '</div>';
				}
			?>
		</div>
	</div>

<?php
	if(strlen($texto)==0){
		$sql="SELECT count(productos.idproducto) as total
		from productos LEFT OUTER JOIN productos_catalogo ON productos_catalogo.idcatalogo = productos.idcatalogo	where productos.idsucursal='".$_SESSION['idsucursal']."' and productos_catalogo.tipo=3";
		$sth = $db->dbh->query($sql);
		$contar=$sth->fetch(PDO::FETCH_OBJ);
		$paginas=ceil($contar->total/$_SESSION['pagina']);
		$pagx=$paginas-1;

		echo $db->paginar($paginas,$pag,$pagx,"a_inventario/lista","trabajo");
	}
?>
