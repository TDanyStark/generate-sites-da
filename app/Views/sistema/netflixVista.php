<div class="contenedor-netflix">
    <section class="contenido-fondo">
        <h2>Seccion del fondo</h2>

        <label for="video-banner"> Suba archivo de video para el fondo del netflix </label>
        <input type="file" id="video-banner">
        <label for="img-banner"> Suba el banner general del netflix<span class="asterisco">*</span></label>
        <input type="file" class="required"  id="img-banner">
    </section>
    <section class="contenido-header">
        <h2>Seccion del header</h2>

        <label for="titulo-header"> Escriba el titulo del sitio<span class="asterisco">*</span></label>
        <input type="text" class="required"  id="titulo-header">
        <label for="img-header"> Suba el logo del sitio<span class="asterisco">*</span></label>
        <input type="file" class="required"  id="img-header">
    </section>
    <section class="contenido-informacion">
        <h2>Seccion informacion</h2>

        <label for="img-informacion"> Suba la imagen de informacion</label>
        <input type="file" id="img-informacion">
        <label for="titulo-informacion"> Escriba el titulo de la informacion<span class="asterisco">*</span></label>
        <input type="text" class="required"  id="titulo-informacion">
        <label for="descripcion-informacion"> coloca en el enlace hacia donde redirigira informacion</label>
        <input type="text"  id="link-informacion">
    </section>
    <section class="contenido-videos">
        <h2>Seccion de videos</h2>
        <div class="video">
            <h3 class="numero-video">Video 1</h3>
            <label for="img-video"> Suba la imagen del video<span class="asterisco">*</span></label>
            <input type="file" id="img-video-1" class="required img-video">
            <label for="enlace-video"> coloca en el enlace de youtube del video<span class="asterisco">*</span></label>
            <input type="text" id="enlace-video-1" class=" required enlace-video">
        </div>
        <button class="btn btn-primary" id="add-video">Agregar video</button>
    </section>
    <template id="video-template">
        <div class="video">
            <h3 class="numero-video"></h3>
            <label for="img-video"> Suba la imagen del video<span class="asterisco">*</span></label>
            <input type="file" class="required img-video">
            <label for="enlace-video"> coloca en el enlace de youtube del video<span class="asterisco">*</span></label>
            <input type="text" class="required enlace-video">
        </div>
    </template>

    <section class="comprobacion">
        <button class="form-control btn btn-primary" id="comprobar">Comprobar</button>
    </section>
</div>

<script>
    let numeroVideo = 1;
    let videos = document.getElementsByClassName('video');

    document.getElementById('add-video').addEventListener('click', function() {
        // Obtén el contenido del template
        const template = document.getElementById('video-template');
        const templateContent = template.content;

        // Clona el contenido del template
        const clonedContent = document.importNode(templateContent, true);

        clonedContent.querySelector('.numero-video').textContent = `Video ${++numeroVideo}`;
        clonedContent.querySelector('.img-video').id = `img-video-${numeroVideo}`;
        clonedContent.querySelector('.enlace-video').id = `enlace-video-${numeroVideo}`;
        // Inserta el contenido clonado encima del botón
        this.parentNode.insertBefore(clonedContent, this);

        videos = document.getElementsByClassName('video');

    });


    document.getElementById('comprobar').addEventListener('click', e =>{
        // traer todos los innputs en general
        let inputs = document.querySelectorAll('input[type="text"]');

        let incompleto = false;

        let errores = [];

        inputs.forEach(input => {
            // comprobar si el input tiene la clase required
            if(input.classList.contains('required')){
                // si el input esta vacio
                if(input.value == ''){
                    // agregarle la clase error
                    input.classList.add('error');

                    // comprobar si el error ya existe en el array
                    let existe = errores.find(error => error.id == 1);
                    // si no existe, agregarlo
                    if(!existe){
                        errores.push({
                            id: 1,
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Algunos campos obligatorios estan vacios',
                        })
                    }
                    incompleto = true;
                }
                else{
                    // si el input tiene contenido, quitarle la clase error
                    input.classList.remove('error');
                }
            }
        })
        
        // traer los inputs de tipo file
        let files = document.querySelectorAll('input[type="file"]');

        files.forEach(file =>{
            if(file.id == 'video-banner'){
                if(file.files.length == 1){
                    console.log('revisando video');
                    // comprobar si el archivo es de tipo video
                    if(file.files[0].type.includes('video')){
                        file.classList.remove('error');
                    }
                    else{
                        file.classList.add('error');
                         // comprobar si el error ya existe en el array
                        let existe = errores.find(error => error.id == 2);
                        // si no existe, agregarlo
                        if(!existe){
                            errores.push({
                                    id: 2,
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'El primer archivo no es un archivo de video',
                                })
                        }
                        incompleto = true;
                    }
                }
            }else if(file.id.includes('img') || file.classList.contains('img-video')){
                if(file.files.length == 1){
                    // comprobar si el archivo es de tipo video
                    if(file.files[0].type.includes('image')){
                        file.classList.remove('error');
                    }
                    else{
                        file.classList.add('error');
                         // comprobar si el error ya existe en el array
                        let existe = errores.find(error => error.id == 3);
                        // si no existe, agregarlo
                        if(!existe){
                            errores.push({
                                    id: 3,
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'hay archivos que no son imagenes',
                                })
                        }
                        incompleto = true;
                    }
                }else{
                    if(file.classList.contains('required')){
                        file.classList.add('error');
                         // comprobar si el error ya existe en el array
                        let existe = errores.find(error => error.id == 1);
                        // si no existe, agregarlo
                        if(!existe){
                            errores.push({
                                    id: 1,
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Algunos campos obligatorios estan vacios',
                                })
                        }
                        incompleto = true;
                    }
                }
            }
        });

        let mensaje = '';
        let contador = 1;
        errores.forEach(error =>{
            mensaje += `${contador}. ${error.text}   `;
            contador++;
        })

        if(mensaje !== ''){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: mensaje,
                })
        }

        if (incompleto == true){
            return
        }


        // enviar los datos al servidor php
        let formDatos = new FormData();


        inputs.forEach(input =>{
            formDatos.append(input.id, input.value);
        });

        files.forEach(file =>{
            formDatos.append(file.id, file.files[0]);
        });

        // enviar los datos al servidor
        fetch('<?= base_url('archivos/subirArchivosNetflix')?>', {
            method: 'POST',
            body: formDatos
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })


    });


</script>