
<?php

// import the MySQL connection
require_once($_SERVER['DOCUMENT_ROOT'] . "./CRUD/models/connection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "./CRUD/models/conf.php");

Class MovieModel extends Connection {

    function __construct() {
        parent::__construct();
    }
    
    public function getMovies() {

        $sql = "SELECT * FROM moviedb.movies";
        $prepare = $this->db->prepare($sql);

        $prepare->execute(array());

        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        $prepare->closeCursor();

        return $result;
    }

    public function deleteMovie($id, $path) {
        
        $sql = "DELETE FROM moviedb.movies WHERE movie_id=$id";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $prepare->closeCursor();
        // delete the movie and redirect to the root directory
        header("Location:$path");
    }

    public function getMovie($id) {

        $sql = "SELECT * FROM moviedb.movies WHERE movie_id=$id";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();

        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $prepare->closeCursor();

        return $result;
    }

    public function updateMovie($movieData, $path) {

        $sql = "UPDATE moviedb.movies 
        SET movie_name = '" . $movieData["movie_name"] . "', 
            movie_author='" . $movieData["movie_author"] . "',
            movie_theme='" . $movieData["movie_theme"] . "',
            movie_rating='" . $movieData["movie_rating"] . "',
            movie_date='" . $movieData["movie_date"] . "' 
        WHERE movie_id=" . $movieData["movie_id"];

        $prepare = $this->db->prepare($sql);
        $prepare->execute();

        $prepare->closeCursor();

        header("Location:$path");
    }
    
    public function createMovie($movieData, $path) {
        $sql = "INSERT INTO moviedb.movies (
                    movie_name,
                    movie_author,
                    movie_theme,
                    movie_rating,
                    movie_date )
                VALUES (
                    '" . $movieData['movie_name'] . "',
                    '" . $movieData['movie_author'] . "',
                    '" . $movieData['movie_theme'] . "',
                    '" . $movieData['movie_rating'] . "',
                    '" . $movieData['movie_date'] . "'
                )";
        
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $prepare->closeCursor();

        header("Location:$path");
    }
}

?>