<?php

namespace dwesgram\modelo;

use dwesgram\modelo\Entrada;

class Estadistica
{
    public function __construct(
        private Entrada $entrada,
        private int $numeroMegusta,
        private array $usuarios
    ) {
    }

    public function getIdEntrada(): Entrada{
        return $this->entrada;
    }

    public function getUsuarios(): array{
        return $this->usuarios;
    }
    
    
}
