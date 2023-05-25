<head>
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <title>Populares</title>
    <link rel="stylesheet" 
    type = "text/css" href="diseño.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<?php
    session_start();
    include("grafos.php");
    $grafo = new Grafo();
    if (!isset($_SESSION['grafo'])) {
        $grafo->crearCanciones();
    }

    $canciones=array();

    if($_GET['popular']==1){
        $canciones = $grafo->cancionesPopulares();
    }
    elseif($_GET['recomendaciones']==1){
        $canciones = $grafo->obtenerRecomendaciones();
    }
    $cancionesExistentes=array();
    if(isset($canciones)){
        foreach($canciones as $cancion){
            if(empty($cancionesExistentes[$cancion['id']])){
            ?>
                <div class='panel'>
                <div class='cancion'>
                    <div class='imagen'> <img src="<?php echo $cancion['img'] ?>" ></div>
                    <br>
                    <div class='audio'><audio src ="<?php echo  $cancion['sound'] ?>" controls> 
                    </audio></div> 
                    <div class='nombre1'> 
                    <p class='nombre'><?php echo $cancion['nombre']?></p>
                    <a href='#like'> 
                    <button class='mg' onclick="frame2.location.href='agregarMG.php?id=<?php echo $cancion['id'] ?>'" > ❤ </button></a>
                    </div>
                </div>
            
            </div>  
            <?php
            $cancionesExistentes[$cancion['id']]=1;
            }
        }
    }
    else{
        echo "<div class='nombre'> No hemos encontrado nada en esta lista! :( </div> ";
    }
?>
<iframe style="display:none" name="frame2" src=""></iframe>  

