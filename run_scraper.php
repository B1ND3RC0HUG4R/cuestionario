<?php
    header('Content-Type: application/json');

    if (isset($_POST['link'])) {
        $link = urlencode($_POST['link']); // Sanitiza la URL para HTTP
        $apiKey = '0xfc02d52ef4ba62813ef3c48fbfae4c78eb43842a'; // Debe coincidir con la API_KEY en Render
        $endpoint = "https://scraper-service-v2-production.up.railway.app/scrape?url={$link}&key={$apiKey}";

        // Configura timeout y cabeceras
        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'timeout' => 10, // segundos
                'header' => "Accept: application/json\r\n"
            ]
        ]);

        $response = @file_get_contents($endpoint, false, $context);

        if ($response === false) {
            echo json_encode([
                "error" => "No se pudo conectar al microservicio",
                "detalle" => error_get_last()
            ]);
            exit;
        }

        $json = json_decode($response, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            echo json_encode($json); // Devuelve JSON limpio
        } else {
            echo json_encode([
                "error" => "El microservicio no devolvió JSON válido",
                "raw" => $response
            ]);
        }
    } else {
        echo json_encode(["error" => "No se recibió la URL"]);
    }
?>