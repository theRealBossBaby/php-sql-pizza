<?php

    include('config/db_connect.php');

    // // MySQLi or PDO 
    // //connect to database
    // $conn = mysqli_connect('localhost', 'pizza_admin', 'password', 'charles_pizza');

    // //check connection
    // if(!$conn){
    //     echo 'Connection error :' . mysqli_connect_error();
    // }

    //query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    //make query and get result
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free results from memory - good practice
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

    //print_r($pizzas);


    ##splitting a string
    //print_r(explode(',', $pizzas[0]['ingredients']));




?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>


    <h4 class="center grey-text">Pizzas!!</h4>

    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-5">
                        <img src="img/pizza1.jpg" class="pizzastyle">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <div>
                                <ul>
                                    <?php foreach(explode(',', $pizza['ingredients']) as $ing):  ?>
                                        <li><?php echo htmlspecialchars($ing); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $pizza['id']?>" >more info</a>
                        </div>
                    </div>
                </div>
            <?php  endforeach;  ?>
        </div>
    </div>


    <?php include('templates/footer.php'); ?>

</html>