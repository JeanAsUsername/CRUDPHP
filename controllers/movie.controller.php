
<?php

    // import the Movie model
    require_once($_SERVER['DOCUMENT_ROOT'] . './CRUD/models/movie.model.php');

    class MovieController {

        private $model;

        function __construct() {

            $this->model = new MovieModel();

        }

        public function getMovies() {
            return $this->model->getMovies();
        }

        public function deleteMovie($id, $path) {
            $this->model->deleteMovie($id, $path);
        }

        public function getMovie($id) {
            return $this->model->getMovie($id);
        }

        public function updateMovie($movieData, $path) {
            $this->model->updateMovie($movieData, $path);
        }

        public function createMovie($movieData, $path) {
            $this->model->createMovie($movieData, $path);
        }
    }

?>