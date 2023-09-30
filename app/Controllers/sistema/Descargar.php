<?php namespace App\Controllers\sistema;

use App\Controllers\BaseController;

class Descargar extends BaseController{
    public function index($nombreDir){
        // obtener el nombre del directorio
        echo $nombreDir;

        // directorio sea la ruta donde se encuentra el archivo

        $directorioRaiz = '../uploads/';
        // nombre del directorio a crear

        $directorioCreado = $directorioRaiz . $nombreDir;
        // comprobar si el directorio ya existe

        if (!is_dir($directorioCreado)) {
            // crear el directorio
            $rta = mkdir($directorioCreado, 0777, true);

            // create a new file index.html with a h1 tag
            $HTML_content = <<<EOT
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
                    <script src="https://kit.fontawesome.com/b61d0d6b73.js" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="styles.css">
                    <script>
                        // YOUTUBE
                        // 2. This code loads the IFrame Player API code asynchronously.
                        let tag = document.createElement('script');

                        tag.src = "https://www.youtube.com/iframe_api";
                        let firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                    </script>
                </head>

                <body>
                    <div class="fondo">
                        <div class="fondo-video">
                            <div class="banner-layer">
                                <img src="img1.png" alt="Banner images">
                            </div>
                            <video muted id="video">
                                <source src="video.mp4" type="video/mp4">
                            </video>
                            <div class="capafinalvideo"></div>
                        </div>
            EOT;

            
            $file = fopen($directorioCreado . '/index.html', 'w');
            fwrite($file, <<<EOT
                        <div id="contenedor">
                            <header>
                                <div class="contenedor-header">
                                    <div class="header-titulo">
                                        <h2>Titulo</h2>
                                    </div>
                                    <div class="header-logo">
                                        <img src="LOGO_MARKET.png" alt="">
                                    </div>
                                </div>
                            </header>
                            <main>
                                <section id="section1">
                                    <div class="contenedor-section1">
                                        <div class="section1-informacion">
                                            <img src="netflix_title.webp" alt="">
                                            <h1>Esto es espacio para texto</h1>
                                            <div class="botones-section1">
                                                <div class="boton1">
                                                    <button>
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr-0 e1mhci4z1" data-name="Play" aria-hidden="true"><path d="M5 2.69127C5 1.93067 5.81547 1.44851 6.48192 1.81506L23.4069 11.1238C24.0977 11.5037 24.0977 12.4963 23.4069 12.8762L6.48192 22.1849C5.81546 22.5515 5 22.0693 5 21.3087V2.69127Z" fill="currentColor"></path></svg>
                                                            <span>Reproducir</span>
                                                    </button>
                                                </div>
                                                <div class="boton2">
                                                    <a href="#">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr-0 e1mhci4z1" data-name="CircleI" aria-hidden="true"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12ZM13 10V18H11V10H13ZM12 8.5C12.8284 8.5 13.5 7.82843 13.5 7C13.5 6.17157 12.8284 5.5 12 5.5C11.1716 5.5 10.5 6.17157 10.5 7C10.5 7.82843 11.1716 8.5 12 8.5Z" fill="currentColor"></path></svg>
                                                            <span>Información</span>
                                                    </a>
                                                </div>
                                            
                                            </div>                        
                                        </div>
                                        <div class="section1-play">
                                            
                                        </div>
                                    </div>
                                </section>
                                <section class="intermedia">
                                    <div class="muted">
                                        <button>
                                            <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                width="800px" height="800px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                            <g>
                                                <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472
                                                    c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                                <path d="M380.766,365.172L146.844,131.234c-4.312-4.312-11.297-4.312-15.609,0s-4.312,11.266,0,15.594l233.938,233.938
                                                    c4.312,4.312,11.297,4.312,15.594,0C385.078,376.469,385.078,369.484,380.766,365.172z"/>
                                                <g>
                                                    <path d="M352,325.094V166.109c0-19.75-3.828-27.797-20.859-17.812l-97.266,58.672L352,325.094z"/>
                                                    <path d="M181.094,208H168c-4.422,0-8,3.578-8,8v80c0,4.422,3.578,8,8,8h67.5l95.641,59.719c3.891,2.281,7.031,3.5,9.656,3.984
                                                        L181.094,208z"/>
                                                </g>
                                                <path d="M380.766,365.172L146.844,131.234c-4.312-4.312-11.297-4.312-15.609,0s-4.312,11.266,0,15.594l233.938,233.938
                                                    c4.312,4.312,11.297,4.312,15.594,0C385.078,376.469,385.078,369.484,380.766,365.172z"/>
                                            </g>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="sound hidden">
                                        <button>
                                            <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                width="800px" height="800px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256
                                                    S397.391,0,256,0z M256,472c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                                <path d="M331.141,148.297L232.156,208H168c-4.422,0-8,3.578-8,8v80c0,4.422,3.578,8,8,8h67.5l95.641,59.719
                                                    c17.031,9.969,20.859,1.938,20.859-17.844V166.109C352,146.359,348.172,138.312,331.141,148.297z"/>
                                            </g>
                                            </svg>
                                        </button>
                                    </div>
                                </section>
                                <section id="section2">
                                    <div class="contenedor-section2">
                                        <div class="section2-info">
                                            <div class="section2-info-titulo">
                                                <h2>ESPACIO PARA UN TITULO</h2>
                                            </div>
                                            <div class="section2-info-descripcion">
                                                <ul class="section2-lista-ul">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="section2-videos">
                                            <button class="flechaizquierda">
                                                <i class="fa-solid fa-chevron-left"></i>
                                            </button>
                                            <div class="contenedor-videos">
                                                <div class="card-video" data-youtubeid="QubZpGgHLME">
                                                    <div class="img-card">
                                                        <img src="img1.png" alt="">
                                                    </div>
                                                    <i class="fa-regular fa-circle-play"></i>
                                                </div>
                                                <div class="card-video" data-youtubeid="jTO8xEXE2Oc">
                                                    <div class="img-card">
                                                        <img src="img2.png" alt="">
                                                    </div>
                                                    <i class="fa-regular fa-circle-play"></i>
                                                </div>
                                                <div class="card-video" data-youtubeid="QubZpGgHLME">
                                                    <div class="img-card">
                                                        <img src="img1.png" alt="">
                                                    </div>
                                                    <i class="fa-regular fa-circle-play"></i>
                                                </div>
                                                <div class="card-video" data-youtubeid="jTO8xEXE2Oc">
                                                    <div class="img-card">
                                                        <img src="img2.png" alt="">
                                                    </div>
                                                    <i class="fa-regular fa-circle-play"></i>
                                                </div>
                                                <div class="card-video" data-youtubeid="QubZpGgHLME">
                                                    <div class="img-card">
                                                        <img src="img1.png" alt="">
                                                    </div>
                                                    <i class="fa-regular fa-circle-play"></i>
                                                </div>
                                                <div class="card-video" data-youtubeid="jTO8xEXE2Oc">
                                                    <div class="img-card">
                                                        <img src="img2.png" alt="">
                                                    </div>
                                                    <i class="fa-regular fa-circle-play"></i>
                                                </div>
                                                <div class="card-video" data-youtubeid="QubZpGgHLME">
                                                    <div class="img-card">
                                                        <img src="img1.png" alt="">
                                                    </div>
                                                    <i class="fa-regular fa-circle-play"></i>
                                                </div>
                                                <div class="card-video" data-youtubeid="jTO8xEXE2Oc">
                                                    <div class="img-card">
                                                        <img src="img2.png" alt="">
                                                    </div>
                                                    <i class="fa-regular fa-circle-play"></i>
                                                </div>
                                            </div>
                                            <button class="flechaderecha">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                                <!-- Ventana modal oculta por defecto -->
                                <div id="modal" class="modal-background hidden">
                                    <div class="modal">
                                        <button id="btn-CerrarModal"><i class="fa-sharp fa-solid fa-circle-xmark"></i></button>
                                        <h2>Ventana Modal</h2>
                                        <div id="videoYoutube"></div>

                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>

                <script src="main.js"></script>

                </body>

                </html>
                EOT);


            
            fwrite($file, 'Hola mundo');
            
            // cerrar el archivo
            fclose($file);

            // copiar un archivo css a esta carpeta
            copy('../generate-netflix-plantilla/' . 'styles.css', $directorioCreado . '/styles.css');

            // copiar un archivo js a esta carpeta
            copy('../generate-netflix-plantilla/' . 'main.js', $directorioCreado . '/main.js');

            // comprimir el directorio
            $zip = new \ZipArchive();
            $zip->open($directorioCreado . '.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($directorioCreado),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file) {
                // Skip directories (they would be added automatically)
                if (!$file->isDir()) {
                    // Get real and relative path for current file
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($directorioCreado) + 1);
                    

                    // split the string y quedarme con la 1 posicion
                    $array = explode('uploads\\', $relativePath);
                    $relativePath = $array[1];


                    // Add current file to archive
                    $zip->addFile($filePath, $relativePath);

                }
            }

            
            $zip->close();

            // limpiar el buffer
            ob_clean();

            // enviar el archivo al navegador
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename='.$nombreDir.'.zip');
            header('Content-Length: ' . filesize($directorioCreado . '.zip'));
            header('cache-control: no-cache, must-revalidate');
            header('Expires: 0');
            readfile($directorioCreado . '.zip');


            // eliminar el directorio
            function removeRecurive($dirname){
                $archivos = glob($dirname . '/*');
                foreach ($archivos as $archivo) {
                    if (is_dir($archivo)) {
                        removeRecurive($archivo);
                    } else {
                        unlink($archivo);
                    }
                }
                if (is_dir($dirname)) {
                    rmdir($dirname);
                }
            }
            removeRecurive($directorioCreado);

            // eliminar el archivo zip
            unlink($directorioCreado . '.zip');
        } else {
            echo 'El directorio ya existe ss.';
        }
    }
}