<div id="side-bar" class="container-fluid p-0 m-0">
    <div class="container-fluid p-0 m-0">
        <h1 class=" side-bar-container-header text-white text-center fs-5 p-2 bg-dark">Trabajador</h1>
        <p class="side-bar-container-p text-center">
            <?php 
            echo($_SESSION['user']['nombre']." ".$_SESSION['user']['apellido']);
            ?>
        </p>
    </div>
    <div class="container-fluid p-0 m-0">
        <h1 class=" side-bar-container-header text-white text-center fs-5 p-2 bg-dark">Tiempo</h1>
        <p  id="date"class=" side-bar-container-p text-center m-0"></p>
        <p id="time" class=" side-bar-container-p text-center m-0"></p>
    </div>
    <div id="client-info-container" class="container-fluid p-0 m-0">
        
    </div>
    <hr id="separator">
</div>

<script>
    <?php 
    include('js/time.js');
    ?>
</script>