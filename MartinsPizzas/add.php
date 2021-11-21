<?php

include('config/db_connect.php');

$errors=array("chef_name"=>"","email"=>"", "recipe"=>"", "ingredients"=>"","title"=>"");
$email = $chef_name = $ingredients = $title = "";

if(isset($_POST['submit'])){
    // echo htmlspecialchars($_POST['name']);
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['recipe']);
    // echo htmlspecialchars($_POST['ingredients']);

    // check name
    if(empty($_POST['chef_name'])){
        $errors["chef_name"] = 'A name is required';
    } else {
        $chef_name=$_POST['chef_name'];
    }

    // check email
    if(empty($_POST['email'])){
        $errors["email"] = 'An email is required';
    } else {
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors["email"] = 'Enter a valid email';
        }
    }

    // check recipe
    if(empty($_POST['title'])){
        $errors["title"] = 'A recipe name is required';
    } else {
        $title=$_POST['title'];
        // if(!preg_match('/^[a-zA-Z0-9_]*$/',$title)){
        //     $errors["title"] = 'Enter a proper recipe name';
        // }
    }

    // check ingredients
    if(empty($_POST['ingredients'])){
        $errors["ingredients"] = 'Ingredients are required';
    } else {
        $ingredients=$_POST['ingredients'];
        if(!preg_match('/[0-9a-zA-Z]+(,[0-9a-zA-Z]+)*/',$ingredients)){
            $errors["ingredients"] = 'Enter the ingredients used seperted by commas';
        }
    }

    if(array_filter($errors)){
        echo "Invalid Form";
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
        $chef_name = mysqli_real_escape_string($conn, $_POST['chef_name']);

        //creating sql
        $sql = "INSERT INTO pizzas(chef_name,title,email,ingredients) VALUES ('$chef_name','$title','$email','$ingredients')";
        
        if(mysqli_query($conn,$sql)){
            header('Location:index.php');
        } else {
            echo "query error" . mysqli_error($conn);
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Martins</title>
    <style type="text/css">
        .form-c{
            background-color: white;
            width: 35%;
            height: 25rem;
            border: 1px solid black;
            margin: 150px;
        /* border: none; */
        }
        .form-c h3{
            text-align: center;
            margin: 18px;
        }
        .form{
            padding: 30px;
            margin: 20px;
        }
        .inputs{
            border: none;
            /* background-color: rgba(207, 216, 216, 0.425); */
            height: 20px;
            width: 60%;
            border-bottom: 3px solid #D2042D;
            border-top: none;
            border-left: none;
            border-right: none;
            margin-bottom: 10px;
        }
        .submit-b{
            color: white;
            background-color: #D2042D;
            margin: 15px auto;
            width: 15%;
            padding: 5px;
            font-size: 13px;
            border: none;
            cursor: pointer;
        }
        .form-img{
            position: relative;
            width: 50%;
            height: 12rem;
            background-color: cyan;
        }
        .form-img img{
            width: auto;
        }
        footer{
            width: 100%;
            background-color: aquamarine;
            position: fixed;
            bottom: 0;
        }

    </style>
</head>

    <?php include('template/header.php'); ?>

    <form action="add.php" class="form-c" method="POST">
        <h3>Details</h3>
        <div class="form">
            <label for="">Name:</label><br>
            <input type="text"  class="inputs"  name="chef_name" value="<?php echo htmlspecialchars($chef_name) ?>"><br>
            <div class="red-error"><?php echo $errors['chef_name']?></div>
            <label for="">E-mail:</label><br>
            <input type="email"  class="inputs"  name="email" value="<?php echo htmlspecialchars($email) ?>"><br>
            <div class="red-error"><?php echo $errors['email']?></div>
            <label for="">Recipe name:</label><br>
            <input type="text" class="inputs"   name="title" value="<?php echo htmlspecialchars($title) ?>"><br>
            <div class="red-error"><?php echo $errors['title']?></div>
            <label for="">Ingredients:</label><br>
            <input type="text"  class="inputs"  name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>"><br>
            <div class="red-error"><?php echo $errors['ingredients']?></div>
            <input type="submit" name="submit" class="submit-b" value="Submit">
        </div>
        <!-- <div class="form-img">
            <img src="https://images.unsplash.com/photo-1584365685547-9a5fb6f3a70c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
        </div> -->
    </form>

    <?php include('template/footer.php'); ?>

</html>