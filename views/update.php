<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- RESET CSS -->
    <link rel="stylesheet" href="../css/reset.css">
     <!-- PAGE CSS -->
    <link rel="stylesheet" href="../css/pages/update.css">
    <title>Movie CRUD</title>
    <title>Update movie</title>
</head>
<body>

    <!-- HEADER  -->
    <?php require_once("../components/Header.html") ?>

    <main class="main">
        <section class="main__update">

            <?php

            // import the movie controller
            require_once($_SERVER["DOCUMENT_ROOT"] . "./CRUD/controllers/movie.controller.php");
            $movieController = new MovieController();

            // if the constant exists, update the movie
            if (isset($_POST["movie_id"])) {

                $movieData = array(
                    "movie_id"=> $_POST["movie_id"],
                    "movie_name"=> $_POST["movie_name"],
                    "movie_author"=> $_POST["movie_author"],
                    "movie_theme"=> $_POST["movie_theme"],
                    "movie_rating"=> $_POST["movie_rating"],
                    "movie_date"=> $_POST["movie_date"]
                );
                
                $movieController->updateMovie($movieData, '/CRUD/index.php');

            // else, fill the form
            } else {

                $id = $_GET['id'];
                $movie = $movieController->getMovie($id)[0]; // [[data]] <-- select the [0] that is the data
            ?>
                <form class="update__form" method="post">

                    <fieldset class="update__fieldset">
                        <legend class="update__legend">Update movie</legend>

                        <div class="update__field">
                            <label for="movie_id">ID</label>
                            <input type="text" name="movie_id" id="movie_id" value="<?php echo $movie['movie_id'] ?>" disabled>
                            <input type="text" name="movie_id" value="<?php echo $movie['movie_id'] ?>" hidden>
                        </div>
                        
                        <!-- Generate the same structure that above -->
                        <?php
                        $fields = array(
                            "movie_name"=>"Name", 
                            "movie_author"=>"Author",
                            "movie_theme"=>"Theme",
                            "movie_rating"=>"Rating",
                            "movie_date"=>"Date");
                        foreach ($fields as $key => $field):
                        ?>

                        <div class="update__field">
                            <label for="<?php echo $key ?>"><?php echo $field ?></label>
                            <input type="text" name="<?php echo $key ?>" id="<?php echo $key ?>" value="<?php echo $movie[$key] ?>">
                        </div>

                        <?php endforeach ?>
                        <!-- /////////////////////// -->

                    </fieldset>
                    <div class="update__submit">
                        <input type="submit" value="Update">
                    </div>
                    
                </form>

            <?php } ?>

        </section>
    </main>

    <!-- FOOTER  -->
    <?php require_once("../components/Footer.html") ?>

</body>

</html>




