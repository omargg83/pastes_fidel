<?php
	require_once("db_.php");
  $categoria=$db->categoria_lista();
	echo "<div class='container-fluid' style='background-color:".$_SESSION['cfondo']."; '>";
?>

<div class='tabla_css' id='tabla_css'>
	<div class='row titulo-row'>
		<div class='col-xl col-auto'>
			LISTA DE CATEGORÍAS
		</div>
	</div>
		<?php
      echo "<div class='row'>";
			foreach($categoria as $key){
				echo "<div class='col-6'>";
          echo "<button type='button' class='btn btn-warning btn-sm mb-4' id='categorias' is='p-categoria' title='Editar' v_idcategoria='$key->idcategoria'>";
            if(strlen($key->archivo)>0 and file_exists("../".$db->f_categoria."/".$key->archivo)){
              echo "<img src='".$db->f_categoria."/".$key->archivo."' width='100px' height='100px' class='img-thumbnail'/>";
            }
            else{
              echo "<img src='img/unnamed.png' width='100px' height='100px' class='img-thumbnail'/>";
            }
            echo "<br>";
            echo $key->nombre;
				  echo "</button>";
				echo "</div>";
			}
      echo "</div>";
		?>
	</div>
</div>