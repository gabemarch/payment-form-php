<?php
  function convertCurrency($amount,$from_currency,$to_currency){
    $apikey = '5d2cf53d2ed461542f0b';

    $from_Currency = urlencode($from_currency);
    $to_Currency = urlencode($to_currency);
    $query =  "{$from_Currency}_{$to_Currency}";

    $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
    $obj = json_decode($json, true);

    $val = floatval($obj["$query"]);

    $total = $val * $amount;
    return number_format($total, 2, '.', '');
  }
    echo "<h3>HUF: $amount_in_huf</h3>", "<h3>EUR: ", convertCurrency($amount_in_huf, 'HUF', 'EUR'), " </h3>" ;
?>