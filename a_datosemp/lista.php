<?php
	require_once("db_.php");
	$pd = $db->tienda_lista();
	echo "<div class='container' >";
?>
<div class='tabla_css' id='tabla_css'>
	<div class='row titulo-row'>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>
			DATOS DE LA EMPRESA
		</div>
	</div>
	<div class='row header-row'>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>#</div>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>Razon Social</div>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>Calle</div>
		<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>No</div>
	</div>

		<?php
			foreach($pd as $key){
				echo "<div class='row body-row' draggable='true'>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2'>";
					echo "<div class='btn-group'>";
					echo "<button class='btn btn-warning btn-sm' type='button' is='b-link' des='a_datosemp/editar' dix='trabajo' v_idtienda='$key->idtienda'><i class='fas fa-pencil-alt'></i></button>";
					echo "</div>";
					echo "</div>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2 '>".$key->razon."</div>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2 '>".$key->calle."</div>";
					echo "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-2 '>".$key->no."</div>";
				echo "</div>";
			}
		?>
	</div>
	</tbody>
	</table>
</div>
