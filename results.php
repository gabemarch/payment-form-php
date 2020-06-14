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
  
    function expiration_check($month, $year) {
        $exp = mktime(0, 0, 0, $month + 1, 1, $year);
        $current = time();
        $max_exp = $current + (10 * 365 * 24 * 60 * 60);

        if ($exp > $current && $exp < $max_exp) {
            return true;
        } else {
            return false;
        }
    }

    if(expiration_check($exp_month, $exp_year)) {
       
    } else {
        $expiration_alert = 'Expired Credit Card';
    }

    include('index.php');
    include('exchange.php');
    include('luhnValidation.php');
?>
