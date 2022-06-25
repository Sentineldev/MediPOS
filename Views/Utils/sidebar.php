<div id="side-bar" class="container-fluid p-0 m-0">
    <div class="container-fluid p-0 m-0">
        <h1 class="text-white text-center fs-5 p-2 bg-dark">Trabajador</h1>
        <p class="text-center">
            <?php
            echo($_SESSION['user']['nombre']." ".$_SESSION['user']['apellido']);
            ?>
        </p>
    </div>
    <div class="container-fluid p-0 m-0">
        <h1 class="text-white text-center fs-5 p-2 bg-dark">Tiempo</h1>
        <p  id="date"class="text-center m-0"></p>
        <p id="time" class="text-center m-0"></p>
    </div>
    <hr id="separator">
</div>

<script>
    <?php 
    include('js/time.js');
    ?>
</script>