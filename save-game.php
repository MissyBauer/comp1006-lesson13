<?php ob_start(); ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <title>Game Saved</title>
    </head>
    <body>
    <?php
    // initialize variables
    $name = null;
    $age_limit =null;
    $release_date = null;
    $size = null;
    $game_id = null;

    // store the form inputs in variables
    $name = $_POST['name'];
    $age_limit = $_POST['age_limit'];
    $release_date = $_POST['release_date'];
    $size = $_POST['size'];

    // display the values
    echo $name . '<br />';
    echo $age_limit . '<br />';
    echo $release_date . '<br />';
    echo $size . '<br />';


    // validate our inputs individually
    $ok = true;

    if (empty($name)) {
        echo 'Name is required<br />';
        $ok = false;
    }

    if ((empty($age_limit)) || (!is_numeric($age_limit))
        || ($age_limit < 0)) {
        echo 'Age Limit is required and must be 0 or greater<br />';
        $ok = false;
    }

    if ((empty($release_date)) || (!is_numeric($release_datee))
        || ($release_date < 0)) {
        echo 'Release Date is required and must be 0 or greater<br />';
        $ok = false;
    }

    // check if the form is ok to save or not
    if ($ok == true) {

        // connect to the db
        require_once ('db.php');
        // set up the SQL command to save the data
        if (empty($game_id_id)) {
            $sql = "INSERT INTO games (name, age_limit, release_date,size)
      VALUES (:name, :age_limit, :release_date, :size)";
        }
        else {
            $sql = "UPDATE games SET name = :name, age_limit = :age_limit,
      release_date = :release_date, size =:size WHERE game_id = :game_id";
        }

        // create a command object
        $cmd = $conn->prepare($sql);

        // put each input value into the proper field
        $cmd -> bindParam(':name', $name, PDO::PARAM_STR);
        $cmd -> bindParam(':age_limit', $age_limit, PDO::PARAM_INT);
        $cmd -> bindParam(':release_date', $release_date, PDO::PARAM_BOOL);
        $cmd -> bindParam(':size', $size, PDO::PARAM_BOOL);


        // add the game if we have one for an update
        if (!empty($game_id)) {
            $cmd -> bindParam(':game_id', $game_id, PDO::PARAM_INT);
        }

        // execute the save
        $cmd -> execute();

        // disconnect
        $conn = null;

        /* echo '<h1>Game Saved</h1>
             <a href="games.php" title="View Games">*/
        // redirect
        header('location:games.php');
    }
    ?>
    </body>
    </html>

