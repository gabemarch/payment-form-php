<?php
    $creditcard_number = $_POST["creditcard_number"];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $amount_in_huf = $_POST['amount_in_huf'];

    if(empty($creditcard_number)) {
        $card_error = '<p>Please insert your credit card number</p>';
    } elseif(strlen($creditcard_number) < 16) {
        $card_error = "Your credit card number must be 16 digits";
    } elseif(is_nan($creditcard_number)) {
        $card_error = "Only numerical inputs are valid";
    }

    if(empty($amount_in_huf)) {
        $amount_error = "<p>Please give valid amount</p>";
    } elseif($amount_in_huf > 1000000) {
        $amount_error = "This number can't be higher than 1.000.000";
    }


  
    $expires = \DateTime::createFromFormat('my', $_POST['exp_month'].$_POST['exp_year']);
    $now     = date('M Y');

    if ($expires < $now) {
        $expiration_error = 'Expired';
    }


    function isValid($num) {
        $num = preg_replace('/[^\d]/', '', $num);
        $sum = '';
    
        for ($i = strlen($num) - 1; $i >= 0; -- $i) {
            $sum .= $i & 1 ? $num[$i] : $num[$i] * 2;
        }
    
        return array_sum(str_split($sum)) % 10 === 0;
    }

    

    include('index.php');
    include('exchange.php');
?>
