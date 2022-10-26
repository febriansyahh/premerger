<?php

function _wsumkdosen($module_url, $param = '', $token = '')
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ws.umk.ac.id/'. $module_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $param,
        CURLOPT_HTTPHEADER => array(
            'umk_api_key: 98d04264dde002562a8620a16598cbcb40acc31f',
            'Cookie: PHPSESSID=8bbgupsnq6hl6u7kktgsg2k3b9q6amek'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response, true);
    return $result;
}
?>