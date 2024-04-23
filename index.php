<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bild Galleri</title>
   <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
   <div class="main">
      <h1>Bild Galleri</h1>
      <div class="gallery">
         <?php
            $directory = "bilder/";

            // Hämta alla filer
            $files = scandir($directory);

            // Tar bort . och .. från listan
            $files = array_diff($files, array('.', '..'));

            // Loopar igenom alla filer och displayar dem
            foreach ($files as $file) {
               echo '<img src="' . $directory . $file . '" alt="' . $file . '">';
            }
         ?>
      </div>
   </div>
</body>
</html>