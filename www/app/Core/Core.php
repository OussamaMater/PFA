<?php

/**
 * Core
 *
 * Core class, routes the url to controllers
 * URL FORMAT - /controller/method/params
 */
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod     = 'index';
    protected $params            = [];
    
    /**
     * __construct
     *
     * Maps the controller and its method passed in the url, else loads the default controller 'Pages'
     * @access public
     * @return void
     */
    public function __construct()
    {
        $url=$this->getUrl();
        if (!file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) {
            redirect('errors/notfound');
        }
        $this->currentController=ucwords($url[0]);
        unset($url[0]);
        require_once '../app/Controllers/'. $this->currentController . '.php';
        $this->currentController = new $this->currentController;
        if (isset($url[1])) {
            if (!method_exists($this->currentController, $url[1])) {
                redirect('errors/notfound');
            }
            $this->currentMethod = $url[1];
            unset($url[1]);
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
    /**
     * getUrl
     *
     * Checks for GET request, if so it explodes the url into an array
     * @access public
     * @return array
     */
    public function getUrl()
    {
        if (filter_has_var(INPUT_GET, 'url')) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        // Redirect to the default controller
        redirect('pages/index');
        exit;
    }
}
