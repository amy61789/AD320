<?php

    //retrieves data from form
    $product_description = filter_input(INPUT_POST, 'product_description');
    $list_price = filter_input(INPUT_POST, 'list_price');
    $discount_percent = filter_input(INPUT_POST, 'discount_percent');
    $tax_percent = filter_input(INPUT_POST, 'tax');
    
    //calculations
    $discount_amount = $list_price * $discount_percent * .01;
    $discount_price = $list_price - $discount_amount;
    $tax_amount = $list_price * $tax_percent * .01; 
    
    //formatting
    $list_price_f = "$". number_format($list_price, 2);
    $discount_percent_f = $discount_percent."%";
    $discount_amount_f = "$". number_format($discount_amount, 2);
    $discount_price_f = "$".number_format($discount_price + $tax_amount, 2);
    $tax_percent_f = $tax_percent."%";
    $tax_amount_f = "$".number_format($tax_amount, 2);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price_f); ?></span><br>
        
        <label>Tax Percent:</label>
        <span><?php echo htmlspecialchars($tax_percent_f); ?></span><br>
        
        <label>Tax Amount:</label>
        <span><?php echo $tax_amount_f; ?><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($discount_percent_f); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_amount_f; ?></span><br>

        <label>Discount Price with Tax:</label>
        <span><?php echo $discount_price_f; ?></span><br>
    </main>
</body>
</html>