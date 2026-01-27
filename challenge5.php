<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Assign price variable
        $price = 50;
        
        #assign discount variable
        $discount = 10;

        /*This code gets the final price
        by subtraction*/
        $finalPrice = $price - $discount;

        //display final price
        echo "Total price: $" . $finalPrice;
    ?>
</body>
</html>