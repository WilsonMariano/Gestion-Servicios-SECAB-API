<?php

    include_once __DIR__ . '/../FacturaPaga.php';
    include_once __DIR__ . '/../Factura.php';

    class facturaPagaApi
    {
        public static function TraerTodo($request, $response, $args){

            return $response->withJson(FacturaPaga::TraerTodo($args['id']) , 200);
        }

         public static function Insertar($request, $response, $args){

            $datosRecibidos = $request->getParsedBody();

            $factura = new FacturaPaga();
            $factura->idFactura = $datosRecibidos['idFactura'];
            $factura->montoPagado = $datosRecibidos['montoPagado'];
            $factura->fechaPago = $datosRecibidos['fechaPago'];

            $resultado = FacturaPaga::Insertar($factura);

            if(is_numeric($resultado))
            {
                $proxVencimiento = $datosRecibidos['proxVencimiento'];
                $resultado = Factura::EditarVencimiento($factura->idFactura, $proxVencimiento);
                
                if(is_numeric($resultado) == true)
                    return $response->withJson(true, 200);
                else
                    return $response->withJson("Ha ocurrido un error insertando el pago. Inténtelo nuevamente.", 500);
            }
            else
                return $response->withJson("Ha ocurrido un error insertando el pago. Inténtelo nuevamente.", 500);
        }

        // public static function Editar($request, $response, $args){

        //     $datosRecibidos = $request->getParsedBody();

        //     $factura = new Factura();
        //     $factura->id = $datosRecibidos['id'];
        //     $factura->idEmpresa = $datosRecibidos['idEmpresa'];
        //     $factura->domicilio = $datosRecibidos['domicilio'];
        //     $factura->proxVencimiento = $datosRecibidos['proxVencimiento'];
        //     $factura->montoAnterior = $datosRecibidos['montoAnterior'];

        //     $resultado = Factura::Editar($factura);  
        //     // var_dump($resultado);
        //     if($resultado != 0)
        //         return $response->withJson(true, 200);  
        //     else
        //         return $response->withJson("Ha ocurrido un error editando la factura. Inténtelo nuevamente.", 500);
        // }

    }
