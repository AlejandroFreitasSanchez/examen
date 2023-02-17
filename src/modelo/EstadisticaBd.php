<?php

namespace dwesgram\modelo;

use dwesgram\modelo\BaseDatos;
use dwesgram\modelo\Entrada;
use dwesgram\modelo\Usuario;
use dwesgram\modelo\MegustaBd;

class EstadisticaBd
{
    use BaseDatos;



    /**
     * Devuelve todas las entradas que hay ne la base de datos.
     */
    public static function getTop(): array
    {
        try {
            $conexion = BaseDatos::getConexion();
            $query = <<<END
                select
                    entrada,
                    usuario,
                    count(*) numeroMegusta
                from megusta group by entrada order by numeroMegusta desc limit 3
            END;
            $resultado = $conexion->query($query);
            $estadisticas = [];
            while (($fila = $resultado->fetch_assoc()) !== null) {
                $entrada = EntradaBd::getEntrada($fila['entrada']);
                //obtiene los usuarios que han dado like
                $query2 = <<<END
                    select usuario from megusta where entrada='{$fila['entrada']}'
                END;
                $resultado2 = $conexion->query($query2);
                $usuarios = [];
                while (($fila2 = $resultado2->fetch_assoc()) !== null ){
                    $usuario = UsuarioBd::getUsuarioPorId($fila2['usuario']);
                    $usuarios[] = $usuario;
                }

                $estadistica = new Estadistica(
                    entrada: $entrada,
                    numeroMegusta: $fila['numeroMegusta'],
                    usuarios: $usuarios
                );
              
                $estadisticas[] = $estadistica;
            }
            return $estadisticas;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }
}
