<?php
$entradas = $datosParaVista['datos'];


echo "<div class='container'>";
if (count($entradas) == 0) {
    echo <<<END
    <div class="alert alert-primary" role="alert">
        No hay entradas con likes
    </div>
    END;
} else {
    echo "<h1>Top 3 entradas</h1>";
    echo "<div class='row'>";
    foreach ($entradas as $entrada) {
        $e = $entrada->getIdEntrada();
?>

        <div>
            <h1>
                <?= $e->getTexto(); ?>
            </h1>
            Usuarios que han dado like:
            <?php

            $usuarios = $entrada->getUsuarios();

            foreach ($usuarios as $usuario) {
                echo $usuario->getNombre();
                echo " ";
                ?>
                <img src="<?= $usuario->getAvatar() ?>" width="20" height="20"/>
                <?php
            }
            ?>
        </div>
<?php


    }
    echo "</div>";
}
echo "</div>";
