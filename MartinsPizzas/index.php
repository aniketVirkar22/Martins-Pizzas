<?php

    include('config/db_connect.php');
    // writng query for the pizzas
    $sql = 'SELECT * FROM pizzas';

    // make query and get result
    $result = mysqli_query($conn,$sql);

    // fetching result
    $pizzas = mysqli_fetch_all($result , MYSQLI_ASSOC);

    mysqli_free_result($result);

    // close db
    mysqli_close($conn);

    // printing
    // print_r($pizzas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
        <style type=text/css>
            .main{
                background-image: url(images/pizza-bg.jpeg);
            }
            /* .type{
                line-height: 37px;
                text-align: center;
                font-size: 38px;
                border: 3px solid black;
                width: 50px;
                height: 25px;
                margin: -10px 0px 0px 25px;
                background-color: #D2042D;
            } */
            .type{
                background-color: red;
                width: 18px;
                height: 32px;
                margin: -15px 0px 0px 30px;
                border: 2px solid black;
            }
            .type-1{
                background-color: red;
                width: 18px;
                height: 32px;
                margin: -36px 0px 0px 60px;
                border: 2px solid black;
            }
            .pizza-c{
                display: flex;
                margin: 80px 10px 100px 40px;
                /* width: 20%; */
            }
            .pizza-banner{
                margin: -50px -50px 0px 0px;
                width: 165px;
                display: block;
                /* position: relative; */
                margin-left: auto;
            }
            .pizza-details{
                display: block;
                background-color: white;
                border: 3px solid black;
                width: 33%;
            }
            .pizza-title{
                font-size: 40px;
                margin: -60px 10px 10px 10px;
            }
            .p-ingredients{
                padding: 10px;
                /* text-align: center; */
                font-size: 18px;
                margin-left: 10px;
                margin-bottom: 5px;
            }
            .p-chef_name{
                padding: 10px;
                /* text-align: center; */
                font-size: 18px;
                margin-left: 10px;
                margin-bottom: 5px;
            }
            .pizza-btn{
                color: white;
                background-color: #D2042D;
                margin-left: 75%;
                margin-bottom: 10px;
                padding: 5px;
            }
            footer{
                text-align: center;
                width: 100%;
                background-color: #D2042D	;
                /* position: fixed; */
                bottom: 0;
            }
        </style>
    <title>Martins Pizzas</title>
</head>

    <?php include('template/header.php'); ?>


    <?php foreach ($pizzas as $pizza){ ?>
        <div class="pizza-c">
            <div class="pizza-details">
                <div class="type"></div>
                <div class="type-1"></div>
                <img src="images/pizza-1.png" alt="" class="pizza-banner">
                <h1 class="pizza-title"> <?php echo htmlspecialchars($pizza['title']) ?></h1>
                <p class="p-ingredients">Ingredients: <?php echo htmlspecialchars($pizza['ingredients']) ?> </p>
                <p class="p-chef_name">Chef-<?php echo htmlspecialchars($pizza['chef_name']) ?> </p>
                <a href="details.php?id=<?php echo $pizza['id']?>"><button class="pizza-btn">More Info</button></a>
            </div>
        </div>
    <?php } ?>


    <?php include ('template/footer.php'); ?>

</html>