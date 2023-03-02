<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="stylet9.css">
    <title>TELETIENDA FOC</title>
</head>
<body>
    <header class="head p-3 w-100 d-flex justify-content-center align-items-center mb-5">
        <h1 id="title-page">TELETIENDA FOC</h1>
    </header>
       
    <div class="d-flex flex-column justify-content-center">
        <h2 class="text-center">El mayor catálogo del mercado al mejor precio</h2>
        <form action="" method="get" class="d-flex flex-column justify-content-center align-items-center">
            <input type="text" name="producto" id="idtienda" require placeholder="Introduzca ID numerico entre el 1 y el 20" class="mt-3 w-50">
            <input type="submit" value="Buscar" name="search" class="mt-3 w-25" >
        </form>
    </div>

    <div class="result d-flex justify-content-center align-items-center mt-5">
        <?php
        /**
        * @author Antonio Cantos
        * @global mixed $_GET['search'] Contiene valor si se ha pulsado el input submit
        * @global string $_GET['producto'] Valor recogido en el input tipo text de nuestro formulario
        */
        if (isset($_GET['search'])){
            $regex = "/^[0-9]+$/";
            //controlamos si el valor introducido es texto o numero sin espacios
            if(preg_match($regex, $_GET['producto'])){
                //recuperamos los datos de la API
                $respPro = @file_get_contents("https://fakestoreapi.com/products/".strtolower($_GET['producto']));
                $respPro = json_decode($respPro);
                //controlamos si esa respuesta tiene datos
                if($respPro){
                    $img = $respPro->image;
                    echo '<div class="w-50 d-flex flex-column justify-content-center p-3  ms-5 me-5 bg-light border border-5 border-dark rounded">';
                    echo "<img src='".$img."' alt='".$respPro->title."' >";
                    echo "<h3 class='mt-3 text-center'>".$respPro->id."-".ucfirst($respPro->title)."</h3>";
                    echo "<p class='mt-3 text-center'>".$respPro->description."</p>";
                    echo "<h3 class='mt-3 text-center'> Precio: ".$respPro->price." €</h3>";
                    echo '</div>';
                } 
                else {
                    echo '<div class="alert alert-warning w-50 mt-5" role="alert">¡EL ID NO EXISTE!</div>';
                }
            }
            else{
                echo '<div class="alert alert-warning w-50 mt-5" role="alert">¡DEBES INTRODUCIR UN ID DEL PRODUCTO!</div>';
            }
        }
        ?>

        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="./scriptst9.js"></script>
    
</body>
</html>