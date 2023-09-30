
const flechaizquierda = document.querySelector('.flechaizquierda');
const flechaderecha = document.querySelector('.flechaderecha');
const contenedorVideos = document.querySelector('.contenedor-videos');
let videos = document.querySelectorAll('.card-video');
const $ul = document.querySelector('.section2-lista-ul');
const $contenedorInfo = document.querySelector('.section1-informacion');
const $bannerPrincipal = document.querySelector('.banner-layer img');
let cantidad = 0;
let cantidadenlista = 0;
let active = 0;
let $lisVideos = document.querySelectorAll('.item-lista');

const $headerH2 = document.querySelector('.header-titulo h2');
const $logoHeader = document.querySelector('.header-logo img');

const $ventanaModal = document.querySelector('#modal');

const $btnCerrarModal = document.getElementById('btn-CerrarModal');

const $ventanaModalH2 = document.querySelector('#modal h2');

let titleActive = '';
let player;

const $searchInput = document.getElementById('searchInput');

const $contenedorEmergente = document.querySelector('.contenedor-emergente');

const $cardsVideosEmergentes = document.querySelector('.contenedor-cards-emergente');


let FetchDatainfo = async () => {
    let response = await fetch('data.json');
    let data = await response.json();
    return data;
}; 



$searchInput.addEventListener('keyup', async e => {
    window.location.hash = '#/search';

    let res = await FetchDatainfo();

    let query = e.target.value.toLowerCase();

    if (query === '') {
        $cardsVideosEmergentes.innerHTML = '';
        return;
    };

    let contenido = [];

    res.videos.forEach((item) => {
        if(item.nombre.toLowerCase().includes(query)){
            contenido.push(item);
        }
    });

    res.series.forEach((item) => {
        if(item.nombre.toLowerCase().includes(query)){
            contenido.push(item);
        }
    });


    pintarContenidoEmergente(contenido);
    document.querySelector('.preloader').classList.add('hidden');

});


function widthresize(){
    $lisVideos.forEach((item) => {
        item.remove();
    });
    let anchoPantalla = window.innerWidth;

    let videosEnPantalla = 0;

    if (anchoPantalla <= 768){
        videosEnPantalla = 3;
    }else{
        videosEnPantalla = 5;
    }

    cantidad = videos.length;
    cantidadenlista = cantidad / videosEnPantalla;

    for (let i = 0; i < cantidadenlista; i++) {
        const $li = document.createElement('li');
        $li.classList.add('item-lista');
        $ul.appendChild($li);
    }

    $lisVideos = document.querySelectorAll('.item-lista');

    console.log($lisVideos);
    $lisVideos[active].classList.add('active');
}



document.addEventListener('DOMContentLoaded', async e  => {

    manejoHash(window.location.hash, true); 

    let res = await FetchDatainfo();
    document.querySelector('h2').textContent = res.info.nombre_sitio;
    let videosenInicio = [];

    res.videos.forEach((item) => {
        videosenInicio.push(item);
    });

    res.series.forEach((item) => {
        videosenInicio.push(item);
    });


    // escoger un video aleatorio
    let random = Math.floor(Math.random() * videosenInicio.length);
    let video = videosenInicio[random];
    console.log(video);
    $bannerPrincipal.src = video.link_img;

    document.querySelector('.section1-informacion img').src = video.link_titulo_img;

    document.querySelector('.section1-informacion p').textContent = video.descripcion;







    // pintar los videos en la lista
    let template_card = document.getElementById('template_card_video').content;

    videosenInicio.forEach((item) => {
        template_card.querySelector('.card-video').dataset.youtubeid = item.link_video;
        template_card.querySelector('.card-video img').src = item.link_img;

        let clone = template_card.cloneNode(true);
        contenedorVideos.appendChild(clone);
    });


    videos = document.querySelectorAll('.card-video');
    widthresize();

    // si hay menos de 5 videos no se muestran las flechas
    if (videos.length <= 5) {
        flechaderecha.classList.add('hidden');
        flechaizquierda.classList.add('hidden');
    }

});

window.addEventListener('resize', widthresize);

flechaizquierda.addEventListener('click', () => {
    // saber el ancho de pantalla del navegador
    let anchoPantalla = window.innerWidth;

    let sumaTotal = 0;

    if (anchoPantalla <= 768){
        sumaTotal = contenedorVideos.offsetWidth + 2;
    }else{
        sumaTotal = contenedorVideos.offsetWidth + 10;
    }


    contenedorVideos.scrollLeft -= sumaTotal;

    
    if (active <= 0) {
        return
    }
    active--;

    $lisVideos = document.querySelectorAll('.item-lista');


    $lisVideos.forEach((item) => {
        item.classList.remove('active');
    });

    $lisVideos[active].classList.add('active');
});

flechaderecha.addEventListener('click', () => {
    // saber el ancho de pantalla del navegador
    let anchoPantalla = window.innerWidth;

    let sumaTotal = 0;

    if (anchoPantalla <= 768){
        sumaTotal = contenedorVideos.offsetWidth + 2;
    }else{
        sumaTotal = contenedorVideos.offsetWidth + 10;
    }


    contenedorVideos.scrollLeft += sumaTotal;

    $lisVideos = document.querySelectorAll('.item-lista');
    
    if (active === $lisVideos.length - 1) {
        return
    }
    active++;

    $lisVideos.forEach((item) => {
        item.classList.remove('active');
    });

    $lisVideos[active].classList.add('active');

});




function onYouTubeIframeAPIReady(youtubeid) {
    player = new YT.Player('videoYoutube', {
        videoId: youtubeid,
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
        });
}
    // 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {

    if (event.target.videoTitle == '') return;

    titleActive = event.target.videoTitle;
    $ventanaModalH2.textContent = titleActive;
    $ventanaModal.classList.remove('hidden');
    event.target.playVideo();
}

function onPlayerStateChange(event) {
    console.log(YT.PlayerState);
}


document.addEventListener("click", e =>{

    if(e.target.classList.contains('fa-xmark')){
        document.querySelector('.searchInput').classList.toggle('focused');
        document.querySelector('.searchTab').classList.toggle('hidden');
        $contenedorEmergente.classList.add('hidden');
        $searchInput.value = '';
        window.location.hash = '';
        return;
    }

    if (e.target.parentElement.classList.contains('searchTab') || e.target.parentElement.parentElement.classList.contains('searchTab')) {
        let $btnSearch = null;
        if(e.target.parentElement.classList.contains('searchTab')){
            $btnSearch = e.target.parentElement;
        }else{
            $btnSearch = e.target.parentElement.parentElement;
        }

        console.log($btnSearch);
        document.querySelector('.searchInput').classList.toggle('focused');
        $btnSearch.classList.toggle('hidden');
    }


    // comprobar si es el id btn-CerrarModal
    if(e.target.parentElement === $btnCerrarModal){
        player.stopVideo();
        $ventanaModal.classList.add('hidden');

        // // if video esta en pausa 
        // if(video.paused){
        //     video.play();
        // }

        $ventanaModalH2.textContent = '';
    }

    // identificar si el elemento padre contiene la clase padre-btn
    if(e.target.parentElement.classList.contains('reproductor') || e.target.parentElement.parentElement.classList.contains('reproductor')){
        // mostrar la ventana modal
        let $card_video = null;
        if(e.target.parentElement.classList.contains('reproductor')){
            $card_video = e.target.parentElement;
        }else{
            $card_video = e.target.parentElement.parentElement;
        }

        // video.pause();
        let youtubeid = $card_video.dataset.youtubeid;

        // destuyo el player para que no se reproduzca el video anterior y volver a cargar las configuraciones y que el titulo cargue
        player.destroy();
        onYouTubeIframeAPIReady(youtubeid);
    }
});





const pintarContenidoEmergente = (contenido) => {

    if (contenido.length === 0) {
        $cardsVideosEmergentes.innerHTML = '<h2 class="no-results">No se encontraron resultados</h2>';
        return;
    }


    $cardsVideosEmergentes.innerHTML = '';
    let template_card_emergente = document.getElementById('template_card_emergente').content;

    contenido.forEach((item) => {
        template_card_emergente.querySelector('.card-video-emergente').dataset.youtubeid = item.link_video;
        template_card_emergente.querySelector('.card-video-emergente').dataset.tipo = item.tipo;
        template_card_emergente.querySelector('.card-video-emergente img').src = item.link_img;

        let clone = template_card_emergente.cloneNode(true);
        $cardsVideosEmergentes.appendChild(clone);
    });

};




let manejoHash = async (hash, loaded=false) => {
    if(hash === ''){
        console.log('estas en el home');
        $contenedorEmergente.classList.add('hidden');
        document.querySelector('.searchInput').classList.remove('focused');
        document.querySelector('.searchTab').classList.remove('hidden');
        $searchInput.value = '';
        $cardsVideosEmergentes.innerHTML = '';


    }else if(hash === '#/series'){
        console.log('estas en series');
        $contenedorEmergente.classList.remove('hidden');
        document.querySelector('.searchInput').classList.remove('focused');
        document.querySelector('.searchTab').classList.remove('hidden');
        $searchInput.value = '';

        let res = await FetchDatainfo();

        pintarContenidoEmergente(res.series);


        document.querySelector('.preloader').classList.add('hidden');


    }else if(hash === '#/videos'){
        console.log('estas en videos');
        $contenedorEmergente.classList.remove('hidden');
        document.querySelector('.searchInput').classList.remove('focused');
        document.querySelector('.searchTab').classList.remove('hidden');
        $searchInput.value = '';

        let res = await FetchDatainfo();

        pintarContenidoEmergente(res.videos);

        document.querySelector('.preloader').classList.add('hidden');



    }else if(hash === '#/agregados'){
        console.log('estas en agregados');
        $contenedorEmergente.classList.remove('hidden');
        document.querySelector('.searchInput').classList.remove('focused');
        document.querySelector('.searchTab').classList.remove('hidden');
        $searchInput.value = '';


    }else if(hash === '#/search'){

        if (loaded) {
            window.location.hash = '';
            return;
        }

        console.log('estas en search');
        $contenedorEmergente.classList.remove('hidden');
        document.querySelector('.searchInput').classList.add('focused');
        document.querySelector('.searchTab').classList.add('hidden');
    }
};


window.addEventListener("hashchange", e => {
    console.log(e.target.location.hash);
    manejoHash(e.target.location.hash);
});