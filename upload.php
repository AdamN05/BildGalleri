<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form</title>
   <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
   <div class="main">
      <form action="" method="post" enctype="multipart/form-data">
         <div class="file">
            <label for="file">Upload Image:</label><br>
            <input type="file" id="file" name="file" accept="image/*">
         </div>
         <input type="submit" name="submit" value="Submit">
      </form>
   </div>

   <?php
    // kollar om en bild laddades upp
    $uploadedFilePath = '';
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

        // kollar om filen har en allowed extension
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            // Berättar att Directoryn är bilder
            $uploadDirectory = 'bilder/';

            // Gör en unik id så det inte blir krångel i filerna
            $uploadedFilePath = $uploadDirectory . uniqid() . '.' . $fileExtension;

            // Flyttar filen till bilder
            if (!move_uploaded_file($fileTmpName, $uploadedFilePath)) {
                echo "Error uploading file.";
                $uploadedFilePath = ''; // Clear uploaded file path if an error occurred
            }
        } else {
            echo "Invalid file format";
        }
    } elseif (isset($_FILES['file'])) {
        echo "Error uploading file: " . $_FILES['file']['error'];
    }
?>
</body>
</html>