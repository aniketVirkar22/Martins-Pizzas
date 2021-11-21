<?php

include('config/db_connect.php');

//deleting
if(isset($_POST['delete'])){

    //getting th id we want
    $id_to_be_deleted = mysqli_real_escape_string($conn, $_POST['id_to_be_deleted']);

    //sql query
    $sql = "DELETE FROM pizzas WHERE id = $id_to_be_deleted";

    //condition
    if(mysqli_query($conn,$sql)){
        header('Location: index.php');
    } {
        echo 'query error : '. mysqli_error($conn);
    }

}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    //getting query result
    $result = mysqli_query($conn ,$sql);

    //fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">

<style type=text/css>
        .details-c{
            margin: 125px 150px 150px 150px;
            border: 5px solid black;
            width: 40%;
            height: 450px;
            background-color: white;
        }
        .pizza-img{
            width: 150px;
            display: block;
            position: relative;
            margin-top: -50px;
            margin-left: auto;
            margin-right: auto;
        }
        /* .pizza-img{
            width:500px;
            display: block;
            position: relative;
            margin: 60px auto 0px 40px;
            overflow: hidden;
        } */
        .d-h{
            margin: 15px;
            font-size: 48px;
        }
        .d-details{
            margin: 20px;
        }
        .d-ing{
            padding: 5px;
            font-size: 25px;
        }
        .d-chef{
            padding: 5px;
            font-size: 25px;
        }
        .d-mail{
            padding: 5px;
            font-size: 25px;
        }
        .d-created{
            padding: 5px;
            font-size: 25px;            
        }
        .d-delete{
            width: 80px;
            color: white;
            background-color: #D2042D;
            padding: 3px;
            font-size: 15px;
            margin: 35px 0px 0px 475px;
        }
        footer{
            text-align: center;
            width: 100%;
            background-color: aquamarine;
            position: fixed;
            bottom: 0;
        }
</style>
    <?php include('template/header.php'); ?>

    <div class="details-c">
    <?php if($pizza): ?>
        <img src="images/pizza-1.png" alt="" class="pizza-img">
        <h1 class="d-h"><?php echo htmlspecialchars($pizza['title']);?></h1>
        <div class="d-details">
            <p class="d-ing">Ingredients-<?php echo htmlspecialchars($pizza['ingredients']);?></p>
            <p class="d-chef">Chef-<?php echo htmlspecialchars($pizza['chef_name']);?></p>
            <p class="d-mail">Mail-<?php echo htmlspecialchars($pizza['email']);?></p>
            <p class="d-created">Created at-<?php echo htmlspecialchars($pizza['created_at']);?></p>
            <!-- //DELETING FORM//-->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_be_deleted" value="<?php echo $pizza['id'];?>">
                <input class="d-delete" type="submit" name="delete" value="Delete">
            </form>
            <!-- <img src="images/pizza-1.png" alt="" class="pizza-img"> -->
        </div>

    </div>

    <?php else: ?>

    <?php endif ?>

    <?php include ('template/footer.php'); ?>

</html>