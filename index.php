<?php
//  var_dump ($_FILES);
//  var_dump(__DIR__);

 $uploaddir = __DIR__ . DIRECTORY_SEPARATOR;
 if(isset($_FILES['image'])) {
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    // var_dump($uploadfile);
    // var_dump($_FILES);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $pyscript = "C:\\wamp64\\www\\projet-laure\\tiler\\tiler.py";
        $python = "C:\\Anaconda3\\python.exe";
        $filePath = "C:\\wamp64\\www\\projet-laure\\" . basename($_FILES['image']['name']);
        $param = "C:\\wamp64\\www\\projet-laure\\tiler\\tiles\\lego\\gen_lego_h";

        $cmd = "$python $pyscript $filePath $param";
        passthru($cmd);
    } else {
        var_dump('error');
    };
 }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Titre</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <h1>Titre</h1>
        <h2>Sous-titre</h2>
        <p class="text-center">Bonjour</p>
    
        <form method="post" enctype="multipart/form-data">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="validatedCustomFile" required name="image">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <small id="emailHelp" class="form-text text-muted">Sélectionner un fichier.</small>
            </div>
            <!-- <div class="form-group">
                <input class="form-control" type="text" name="prenom" placeholder="Mon prénom ici...">
            </div> -->

            <div class="form-group text-right">
                <button type="submit" class="btn btn-success">Envoyer</button>
            </div>

        </form>

        <img src="out.png" alt="image modifiee">

    </div>
        
    </body>
</html>