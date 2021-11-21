<style type="text/css">
    *{
        /* font-family:'Courier New', Courier, monospace; */
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        list-style-type: none;
        text-decoration: none;
        margin: 0px;
        padding: 0px;
    }
    .header{
        /* position: fixed;
        top: 0; */
        width: 100%;
        height: 40px;
        background-color: #D2042D;
        display: flex;
        justify-content: space-around;
    }
    .h-text{
        letter-spacing: 1.5px;
        font-weight: bold;
        font-size: 20px;
        color: black;
        text-decoration: none;
        line-height: 40px;
    }
    .links{
        display: flex;
        
        background-color: red;
        text-align: center;
    }
    .links a{
        font-size: 20px;
        line-height: 40px;
        color: black;
        font-weight: bolder;
    }
    .links img{
        width: 50px;
    }
    body{
        background-image: url('images/pizza-bg.jpeg');
        
    }
</style>
<body>
    <nav class="header">
        <div class="header-c">
            <a href="index.php" class="h-text">Martins Pizzas</a>
        </div>
        <div class="links">
            <img src="images/pizza-1.png" alt="">
            <li><a href="add.php">Add Pizza</a></li>
        </div>
    </nav>
    
