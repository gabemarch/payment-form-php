<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Payment Form</title>
</head>
<body>
    <h1>Simple Payment Form</h1>
    <div class="form-container">
    <form action="results.php" method="POST">
        <input 
            name="creditcard_number"
            type="text" 
            pattern="[1-9][0-9]{15}" 
            maxlength="16" 
            placeholder="Credit Card Number">

            <?php if(isset($card_error)) { ?>
                <p><?php echo $card_error ?></p>
            <?php } ?>
        <div class="expiration-inputs">
          
            <input 
                name="exp_month" 
                type="number" 
                step="1"
                min='1'
                max='12'
                class="exp_month"
                placeholder="Expiration (Month)">

            <input 
                type="number" 
                min="2019"
                max="2099" 
                name="exp_year"
                step="1" 
                class="exp_year"
                placeholder="Expiration (Year)">

            </div>
            <?php if(isset($expiration_alert)) { ?>
                <p><?php echo $expiration_alert ?></p>
            <?php } ?>
        <input 
            name="amount_in_huf"
            type="number" 
            min="1" 
            pattern="[1-9]{6}"
            maxlength="7" 
            max="1000000" 
            placeholder="Amount to Pay (HUF)">
            <?php if(isset($amount_error)) { ?>
            <p><?php echo $amount_error ?></p>
            <?php } ?>
        <button type="submit">Submit</button>
    </form>
    </div>
</body>
</html>