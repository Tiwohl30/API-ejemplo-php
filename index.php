<?php 

declare(strict_types=1);    // strict type arriba del todo

// API a utilizar
const API_URL = "https://whenisthenextmcufilm.com/api";



// Funcion para reutilizar el metodo GET a una API

function get_data(string $url) : array
    
    {
    $result = file_get_contents(API_URL); // si solo se quiere hacer un GET de una API
    $data = json_decode($result, true);   // Decodificar el Json para visualizarlo

    return $data;
    }



$data = get_data(API_URL);
?>


<head>
    <meta charset="UTF-8" />
    <meta name="description" content="La proxima pelicula de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de marvel</title>
    <!-- Centered viewport -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
>
</head>

<main>

    
    
    <section>

        
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>" 
        style="border-radius: 16px" />

    </section>

    <hgroup>

        <h2><?= $data["title"]; ?></h2>
        <h3>Se estrena en: <?= $data["days_until"]; ?> dias </h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>Overview: <?= $data["overview"]; ?></p>
        <p>La siguiente pelicula es <?= $data["following_production"]["title"]; ?></p>
   
    </hgroup>
    


</main>


<style>

    :root {
        color-scheme: light dark;
    }


    body{
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }

</style>