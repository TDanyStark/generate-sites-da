<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Netflix App</title>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url('dashboard')?>">Generate sites</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" id="netflix" aria-current="page" href="<?php echo base_url('netflix')?>">Netflix</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="prime" href="<?php echo base_url('prime')?>">Prime Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="starplus" href="<?php echo base_url('starplus')?>">Starplus</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('logout')?>"><?= session('user')?> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <script>
        // capturar la url actual
        let url = window.location.href;
        // si la url termina en netflix se agrega la clase active al elemento con el id netflix
        if(url.endsWith('netflix')){
            document.getElementById('netflix').classList.add('active');

            // borrar la clase active de los otros elementos
            document.getElementById('prime').classList.remove('active');
            document.getElementById('starplus').classList.remove('active');
        }
        else if (url.endsWith('prime')){
            document.getElementById('prime').classList.add('active');

            document.getElementById('netflix').classList.remove('active');
            document.getElementById('starplus').classList.remove('active');
        }
        else if (url.endsWith('starplus')){
            document.getElementById('starplus').classList.add('active');

            document.getElementById('netflix').classList.remove('active');
            document.getElementById('prime').classList.remove('active');
        }
    </script>
        <div class="container">