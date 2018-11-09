<?php
    namespace App\Controllers;

    use PsrHttpMessageServerRequestInterface as Request;
    use PsrHttpMessageResponseInterface as Response;
    use App\Models\Image;

    class ImageController{

        private $view;
        public function __construct($c){
            $this->view = $c->view;
        }
        public function index($request, $response, $args)
        {
            dd($request);
        }
    }