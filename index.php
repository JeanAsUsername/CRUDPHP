
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- RESET CSS -->
    <link rel="stylesheet" href="./css/reset.css">
     <!-- PAGE CSS -->
    <link rel="stylesheet" href="./css/pages/index.css">
    <title>Movie CRUD</title>
</head>
<body>
    <!-- CONTROLLER -->
    <?php 
        require_once('controllers/movie.controller.php');
        $movieController = new MovieController();
        $movies = $movieController->getMovies();
    ?>


    <!-- HEADER  -->
    <?php require_once("./components/Header.html") ?>

    <main class="main">
        <section class="main__crud">
            <div class="crud__container">
                <table border="1" class="crud__table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Author</td>
                            <th>Theme</th>
                            <th>Rating</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($movies as $movie):
                        ?>
                        <tr>
                            <td class="crud__item" ><?php echo $movie['movie_id'] ?></td>
                            <td class="crud__item"><?php echo $movie['movie_name'] ?></td>
                            <td class="crud__item" ><?php echo $movie['movie_author'] ?></td>
                            <td class="crud__item" ><?php echo $movie['movie_theme'] ?></td>
                            <td class="crud__item" ><?php echo $movie['movie_rating'] ?></td>
                            <td class="crud__item" ><?php echo $movie['movie_date'] ?></td>
                            <td> <a href="/CRUD/views/delete.php?id=<?php echo $movie['movie_id'] ?>">Delete</a> </td>
                            <td> <a href="/CRUD/views/update.php?id=<?php echo $movie['movie_id'] ?>">Update</a> </td>
                        </tr>
                            <?php endforeach ?>
                    </tbody>

                    <tfoot>
                        <form action="/CRUD/views/create.php" method="post">
                            <tr>
                                <td></td>
                                <td><input type="text" name="movie_name"></td>
                                <td><input type="text" name="movie_author"></td>
                                <td><input type="text" name="movie_theme"></td>
                                <td><input type="text" name="movie_rating"></td>
                                <td><input type="text" name="movie_date"></td>
                                <td><input type="submit" value="Create"></td>
                            </tr>
                        </form>
                    </tfoot>
                </table>
            </div>
        </section>
    </main>

    <!-- FOOTER  -->
    <?php require_once("./components/Footer.html") ?>

</body>
</html>