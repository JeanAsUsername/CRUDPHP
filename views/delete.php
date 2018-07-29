<?php 

if (isset($_GET['id'])) {

    // import movies controller
    require_once($_SERVER['DOCUMENT_ROOT'] . "./CRUD/controllers/movie.controller.php");

    $movieController =  new MovieController();
    $movieId = $_GET['id'];

    // Delete the movie and redirect to the index.php
    $movieController->deleteMovie($_GET['id'], '/CRUD/index.php');

}

?>