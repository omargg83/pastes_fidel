<?php
	require_once("db_.php");

	if(isset($_REQUEST['buscar'])){
		$texto=$_REQUEST['buscar'];
		$pd = $db->gastos_buscar($texto);
	}
	else{
		$pd = $db->gastos_lista();
	}

	echo "<div class='container-fluid' style='background-color:".$_SESSION['cfondo']."; '>";
?>
<div class='tabla_css' id='tabla_css'>
	<div class='row titulo-row'>
		<div class='col-12'>
			LISTA DE GASTOS
		</div>
	</div>
	<div class='row header-row'>
		<div class='col-2'>#</div>
		<div class='col-2'>Fecha</div>
		<div class='col-2'>Gasto</div>
		<div class='col-4'>Descripción</div>
		<div class='col-2'>Costo</div>
	</div>

		<?php
			foreach($pd as $key){
				echo "<div class='row body-row' draggable='true'>";
					echo "<div class='col-2'>";
						echo "<div class='btn-group'>";

						echo "<button type='button' class='btn btn-warning btn-sm' id='edit_persona' is='b-link' title='Editar' des='a_gastos/editar' dix='trabajo' v_idg='$key->idgastos'><i class='fas fa-pencil-alt'></i></button>";

						echo "<button type='button' class='btn btn-warning btn-sm' is='b-link' db='a_gastos/db_' des='a_gastos/lista' fun='borrar_gasto' dix='trabajo' v_id='$key->idgastos' id='eliminar' tp='¿Desea eliminar el gasto seleccionado?'><i class='far fa-trash-alt'></i></button>";

						echo "</div>";
					echo "</div>";

					echo "<div class='col-2'>".$key->fecha."</div>";
					echo "<div class='col-2'>".$key->gasto."</div>";
					echo "<div class='col-4'>".$key->descripcion."</div>";
					echo "<div class='col-2'>".moneda($key->costo)."</div>";
				echo "</div>";
			}
		?>
	</div>
	</div>
