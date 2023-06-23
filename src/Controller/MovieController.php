<?php

namespace Controller;

use Core\Controller;
use Model\MovieModel;

class MovieController extends Controller
{
    public function allMovieAction($args = [])
    {
        $movieId = $args[0] ?? null;

        if ($movieId == null) {
            $movieModel = new MovieModel([]);
            $result = $movieModel->findAll([]);
            $this->render('allmovie', ['movies' => $result]);
        } else {
            $movieModel = new MovieModel();
            $result = $movieModel->findAll(array(
                'WHERE' => 'id = $movieId'
            ));
            $movie = $result[0] ?? null;
            if ($movie == null) {
                echo '<p>aucun film n\'a été trouvé</p>';
                return null;
            }

            $this->render('movie', ['movies' => $result]);
        }
    }

    public function movieAction($args = [])
    {
        $movieId = $args[0] ?? null;

        if ($movieId == null) {
            $movieModel = new MovieModel([]);
            $result = $movieModel->findAll([]);
            $this->render('movie', ['movies' => $result]);
        } else {
            $movieModel = new MovieModel();
            $result = $movieModel->findAll(array(
                "WHERE" => "id = $movieId"
            ));
            $movie = $result[0] ?? null;
            if ($movie == null) {
                echo '<p>aucun film n\'a été trouvé</p>';
                return null;
            }

            $this->render('movie', ['movies' => $result]);
        }
    }

}
