<?php
	require_once("db_.php");
	$pd = $db->sucursal_lista();
	echo "<div class='container' style='background-color:".$_SESSION['cfondo']."; '>";
?>
<div class='tabla_css' id='tabla_css'>
	<div class='row titulo-row'>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>
			SUCURSAL
		</div>
	</div>
	<div class='row header-row'>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>#</div>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>Nombre</div>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>Ubicación</div>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>Ciudad</div>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>Teléfono 1</div>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>Teléfono 2</div>
	</div>

		<?php
			foreach($pd as $key){
				echo "<div class='row body-row' draggable='true'>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2 text-center'>";
					echo "<div class='btn-group'>";

					echo "<button class='btn btn-warning btn-sm' type='button' is='b-link' des='a_sucursal/editar' dix='trabajo' v_idsucursal='$key->idsucursal'><i class='fas fa-pencil-alt'></i></button>";

					echo "</div>";
					echo "</div>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>".$key->nombre."</div>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>".$key->ubicacion."</div>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>".$key->ciudad."</div>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>".$key->tel1."</div>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>".$key->tel2."</div>";
				echo "</div>";
			}
		?>
	</div>
	</tbody>
	</table>
</div>
