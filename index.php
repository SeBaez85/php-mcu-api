<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

//! Inicializar una nueva sesión de cURL. ch = cURL handle
$ch = curl_init(API_URL);

//! Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//! Ejecutamos la petición y guardamos el resultado
$result = curl_exec($ch);

//! Una alternativa sería usar file_get_contents
//! $result = file_get_contents(API_URL); Si sólo queremos hacer peticiones GET de una API

$data = json_decode($result, true);

curl_close($ch);


?>

<head>
    <meta charset="utf-8">
    <title>La próxima película de Marvel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <!--<pre style="font-size: 8px; overflow:scroll; height: 250px;"><?php var_dump($data); ?></pre>-->
    <section>
        <img src="<?= $data["poster_url"]; ?>" alt="<?= $data["title"]; ?>" width="300" style="border-radius: 16px;">
    </section>
    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente peli/serie es: <?= $data["following_production"]["title"]; ?> que sale el <?= $data["following_production"]["release_date"]; ?></p>
    </hgroup>
    
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>
