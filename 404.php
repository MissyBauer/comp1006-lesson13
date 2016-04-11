<?php ob_start();
$page_title = null;
$page_title = 'COMP1006 Web Application | Page Not Found';

require_once ('header.php');
ob_flush();
?>
<div class="jumbotron">
    <h3>Hmmm... Something's missing...</h3>
    <p>We can't find the page you requested. Give one of the links above a try!</p>
</div>