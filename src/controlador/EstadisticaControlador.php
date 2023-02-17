<?php
namespace dwesgram\controlador;

use dwesgram\controlador\Controlador;
use dwesgram\modelo\Megusta;
use dwesgram\modelo\Entrada;
use dwesgram\modelo\EntradaBd;
use dwesgram\modelo\EstadisticaBd;
use dwesgram\modelo\MegustaBd;

class EstadisticaControlador extends Controlador
{
    public function mejorEntrada(): array {
        $this->vista = 'entrada/top';
        return EstadisticaBd::getTop();
    }
}