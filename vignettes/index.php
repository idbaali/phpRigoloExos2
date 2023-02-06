<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>

    <!-- début traitement image upload-->

    <!-- fin traitement image upload-->



<div class="general-content">
<h1>Les vignettes</h1>
    <h2>Explications sur l'exercice</h2>
    <p>Vous devez faire le script pour que les vignettes soient enregistrées dans le répertoires "vignettes", les vignettes dans ce répertoire doivent être visibles sur cette page. La vignette doit avoir le même nom que le fichier original. Pour info, le format pour l'image envoyée par le formulaire est un .png, il vous faudra donc convertir d'une manière ou d'une autre l'image téléchargée pour que l'image finale soit au format .jpg
    </p>
<h2>Faire une vignette</h2>
<div>
<div class="image-uploader">
    <form action="/vignettes/"  method="post">
      <div class="image-editor">
        <input type="file" class="cropit-image-input btn btn-default btn-lg" name="NomVignette">
        <div class="cropit-preview"></div>
        <div class="image-size-label">
          Redimensionner l'image
        </div>
        <input type="range" class="cropit-image-zoom-input">
        <input type="hidden" name="image-data" class="hidden-image-data" />
        <button type="submit" class="btn btn-default btn-lg">Enregistrer la vignette</button>
      </div>
    </form>
 </div>
 </div>
 <h2>Vignettes disponibles</h2>

      <!-- début gallerie image -->
 
<?php
if (isset($_POST['image-data'])) {
  // Récupération de l'image envoyée par l'utilisateur
  $base64_string =$_POST["image-data"]; // remplacer avec les données de l'image
  $output_file = "image.png";
  $base64_string = str_replace("data:image/png;base64,", "", $base64_string);

  // Décodez la chaîne en données binaires
  $binary_data = base64_decode($base64_string);
  
  // Écrivez les données binaires dans un fichier
  file_put_contents($output_file, $binary_data);
  $image = imagecreatefrompng($output_file);
  $image_nom_tableau = explode(".",$_POST["NomVignette"]);


  imagejpeg($image, "vignettes/".$image_nom_tableau[0].".jpeg", 75);
  imagedestroy($image);
  unlink($output_file); 
}

?>
<img src="/vignettes/vignettes/ballerine-acajou-gris.jpg" class="vignettes"><img src="/vignettes/vignettes/ballerine-ella-rose.jpg" class="vignettes"><img src="/vignettes/vignettes/ballerine-ella-taupe.jpg" class="vignettes"><img src="/vignettes/vignettes/lpb-escarpin-beige.jpg" class="vignettes"><img src="/vignettes/vignettes/lpb-escarpin-noir.jpg" class="vignettes"><img src="/vignettes/vignettes/reine.jpg" class="vignettes"><img src="/vignettes/vignettes/saumon.jpg" class="vignettes"><img src="/vignettes/vignettes/savoyarde.jpg" class="vignettes">

<!-- Fin gallerie image -->
<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
} );
</script>
    <script>
      $(function() {
        $('.image-editor').cropit();

        $('form').submit(function() {
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);

          return true;
        });
      });
    </script>
<?php  include '../footer.php'; ?>