<?php

const PORT = 8081; // changer le port pour celui utilisé par le virtual host
const API_URL = 'http://192.168.121.223:' . PORT . '/';

//Cette fonction est suffisante pour faire des GET vers l'API
function API_call($endpoint, $data) { // $data doit être un tableau avec les arguments que l'on veut utiliser dans le lien de l'API
    $parameters = http_build_query($data);

    $full_url = API_URL . $endpoint . '?' . $parameters;
    $result = file_get_contents($full_url);

    return $result;
}

//exemple d'utilisation
$res = API_call("measures/get", ['option' => "all", 'sensor' => "2"]);
echo $res;
