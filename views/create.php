

<?php

if (isset($_POST['movie_name'])) {

    // import movies controller
    require_once($_SERVER['DOCUMENT_ROOT'] . "./CRUD/controllers/movie.controller.php");

    $movieController =  new MovieController();
    $movieData = array(
        "movie_name"=> $_POST["movie_name"],
        "movie_author"=> $_POST["movie_author"],
        "movie_theme"=> $_POST["movie_theme"],
        "movie_rating"=> $_POST["movie_rating"],
        "movie_date"=> $_POST["movie_date"]
    );

    $movieController->createMovie($movieData, '/CRUD/index.php');

}

?>