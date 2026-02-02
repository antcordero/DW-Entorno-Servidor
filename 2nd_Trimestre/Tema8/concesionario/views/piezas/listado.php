<h1><i class="fa-solid fa-boxes-stacked"></i> Almacén de Recambios</h1>

<div style="margin-bottom: 20px;">
    <a href="index.php?seccion=crear_pieza" class="btn-primary">
        <i class="fa-solid fa-plus"></i> Nueva pieza
    </a>
</div>

<table class="tabla-pro">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre pieza</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Ubicación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listaPiezas as $pieza): ?>
            <?php
                $stock = (int)$pieza['stock'];
                $esCritico = $stock < 3;
            ?>
            <tr>
                <td><?php echo $pieza['id']; ?></td>
                <td><?php echo $pieza['nombre']; ?></td>
                <td><?php echo $pieza['referencia']; ?></td>
                <td><?php echo Util::moneda($pieza['precio']); ?></td>
                <td>
                    <?php if ($esCritico): ?>
                        <span style="color:red; font-weight:bold;">
                            <?php echo $stock; ?> ⚠️
                        </span>
                    <?php else: ?>
                        <?php echo $stock; ?>
                    <?php endif; ?>
                </td>
                <td><?php echo $pieza['ubicacion']; ?></td>
                <td>
                    <a href="index.php?seccion=editar_pieza&id=<?php echo $pieza['id']; ?>"
                       class="btn-action">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="index.php?seccion=borrar_pieza&id=<?php echo $pieza['id']; ?>"
                       class="btn-cancel"
                       onclick="return confirm('¿Borrar esta pieza del almacén?');"
                       style="padding:4px 8px; font-size:0.8rem;">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
