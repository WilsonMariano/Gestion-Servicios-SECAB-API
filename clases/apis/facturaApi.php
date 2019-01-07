<?php

    include_once __DIR__ . '/../Factura.php';

    class facturaApi
    {
        public static function TraerTodo($request, $response, $args){

            return $response->withJson(Factura::TraerTodo() , 200);
        }

         public static function Insertar($request, $response, $args){

            $datosRecibidos = $request->getParsedBody();

            $factura = new Factura();
            $factura->idEmpresa = $datosRecibidos['idEmpresa'];
            $factura->domicilio = $datosRecibidos['domicilio'];
            $factura->proxVencimiento = $datosRecibidos['proxVencimiento'];
            $factura->datosCuenta = $datosRecibidos['datosCuenta'];

            $resultado = Factura::Insertar($factura);

            if(is_numeric($resultado) == true)
                return $response->withJson(true, 200);
            else
                return $response->withJson("Ha ocurrido un error insertando la factura. Inténtelo nuevamente.", 500);
        }

        public static function Editar($request, $response, $args){

            $datosRecibidos = $request->getParsedBody();

            $factura = new Factura();
            $factura->id = $datosRecibidos['id'];
            $factura->idEmpresa = $datosRecibidos['idEmpresa'];
            $factura->domicilio = $datosRecibidos['domicilio'];
            $factura->proxVencimiento = $datosRecibidos['proxVencimiento'];
            $factura->datosCuenta = $datosRecibidos['datosCuenta'];

            $resultado = Factura::Editar($factura);  
            if($resultado != 0)
                return $response->withJson(true, 200);  
            else
                return $response->withJson("Ha ocurrido un error editando la factura. Inténtelo nuevamente.", 500);
        }

    }
