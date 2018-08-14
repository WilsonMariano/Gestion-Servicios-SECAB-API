<?php

    include_once __DIR__ . '/../Empresa.php';

    class empresaApi
    {
        public static function TraerTodo($request, $response, $args){

            return $response->withJson(Empresa::TraerTodo() , 200);
        }

    }
