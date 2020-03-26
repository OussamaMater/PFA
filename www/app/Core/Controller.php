<?php

/**
 * Controller
 *
 * Base Controller
 */
class Controller
{
    /**
     * model
     *
     * Loads a model
     * @access public
     * @param  string $model
     * @return model
     */
    public function model($model)
    {
        require_once '../app/Models/' . $model . '.php';
        return new $model();
    }


    /**
     * model
     *
     * Loads a view
     * @access public
     * @param  string $view
     * @param  array $data
     * @return view
     */
    public function view($view, $data = [])
    {
        if (file_exists('../app/Views/' . $view . '.php')) {
            require_once '../app/Views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
