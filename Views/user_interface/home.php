<?php
if(sizeof($_SESSION) == 1){
    header("Location: ".$_SESSION['url']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
        <?php
            include('boostrap/css/bootstrap.css');
            include('CSS/navbar.css');
            include('CSS/content.css');
            include('CSS/base.css');
        ?>
    </style>

</head>
<body>
    <?php
        include_once('Views/Utils/navbar.php');
    ?>
    <section id="main">
      <section id="content">
        <?php
          include_once('Views/Utils/sidebar.php');
        ?>
        <div id="middle-content" class="container-fluid">
          <h1 class="display-5">hola mundo</h1>
        </div>
      </section> 
    </section>
    
</body>
<script>
    <?php
    include('boostrap/js/bootstrap.bundle.js');
    ?>
</script>
</html>