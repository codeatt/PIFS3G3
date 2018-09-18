<?php
session_start();
if (isset($_SESSION["email"])){
  $emailSessao=$_SESSION["email"];
  // header ("Location:index.php");
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
   <meta charset="utf-8" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
   integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/styles.css">
     <title>Livraria Global - Pagina Inicial</title>
   </head>
   <body>
     <?php include("header.php");
     ?>
     <div class="container-fulid">
     <h1 style="text-align:center"><?php echo "Ola, $emailSessao"; ?></h1>
      <p style="text-align:center"><a style="text-align:center" href="#">Logout</a></p>
       <?php// include('footer.html'); ?>
   </div>
   </body>
 </html>
