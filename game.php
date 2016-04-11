
<?php ob_start(); //set the page titel and embed header
$page_title = null;
$page_title = 'Video Game Listings';
require_once ('header.php');

// initialize an empty id variable
$name_id = null;
$name = null;
$age_limit = null;
$release_date = null;
$size = null;


//check if we have a game in the querystring
if (is_numeric($_GET['game_id'])) {

}

    //if we do, store in a variable
    $game_id = $_GET['game_id'];

    //connect
    require_once ('db.php');

    //select all the data for the selected games
    $sql = "SELECT * FROM games WHERE game_id = :game_id";
    $cmd = $conn->prepare($sql);
    $cmd-> bindParam(':game_id', $game_id, PDO::PARAM_INT);
    $cmd->execute();
    $games = $cmd->fetchAll();

    //disconnect
    $conn = null;

    //store each value from the database into a variable
?>

<h1>Game Information</h1>



<p>* indicates Required Fields</p>
<form method="post" action="save-game.php">
    <fieldset>
        <label for="name" class="col-sm-2">Name: </label>
        <input name="name" id="name" required placeholder="Game Name" value="<?php echo $name; ?>" />
    </fieldset>
    <fieldset>
        <label for="release_date" class="col-sm-2">Release Date: </label>
        <input name="release_date" id="release_date" required value="<?php echo $release_date; ?>" />
    </fieldset>
    <fieldset>
        <label for="age_limit" class="col-sm-2">Age Limit: </label>
        <input name="age_limit" id="age_limit"required placeholder="Age Limit" value=" <?php echo $age_limit; ?>
    </fieldset>
    <fieldset>
        <label for="size" class="col-sm-2">Size: </label>
        <input name="size" id="size" required placeholder="Size" value="<?php echo $size; ?>" />
    </fieldset>

    <input type="hidden" name="game_id" id="game_id" value="<?php echo $game_id; ?>" />
    <button class="btn btn-primary col-sm-offset-2">Save</button>
</form>

<?php //embed footer
require_once('footer.php');
?>