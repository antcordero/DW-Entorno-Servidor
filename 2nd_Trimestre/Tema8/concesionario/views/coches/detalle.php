<h1><i class="fa-solid fa-circle-info"></i> Ficha del Vehículo</h1>

<div class="ficha-coche">
    <div class="ficha-icon">
        <i class="fa-solid fa-car-side"></i>
    </div>

    <div class="ficha-datos">
        <h2><?php echo $coche['marca'] . ' ' . $coche['modelo']; ?></h2>

        <p><strong>Precio:</strong> <?php echo Util::moneda($coche['precio']); ?></p>

        <p>
            <strong>Stock:</strong> <?php echo (int)$coche['stock']; ?> unidades
        </p>

        <p>
            <strong>Estado:</strong>
            <?php if (!empty($coche['vendido']) && $coche['vendido'] == 1): ?>
                <span style="color:red; font-weight:bold;">VENDIDO</span>
            <?php else: ?>
                <span style="color:green; font-weight:bold;">Disponible</span>
            <?php endif; ?>
        </p>

        <?php if (!empty($coche['destacado']) && $coche['destacado'] == 1): ?>
            <p>
                <strong>Tipo:</strong>
                <span class="badge-vip"><i class="fa-solid fa-star"></i> Vehículo VIP</span>
            </p>
        <?php endif; ?>

        <?php if (!empty($coche['imagen'])): ?>
            <p style="margin-top: 20px;">
                <strong>Imagen:</strong><br>
                <img src="assets/img/<?php echo htmlspecialchars($coche['imagen']); ?>"
                     alt="Foto del coche"
                     style="max-width: 300px; border-radius: 8px;">
            </p>
        <?php endif; ?>

        <div style="margin-top: 25px;">
            <a href="index.php?seccion=coches" class="btn-detalles" style="margin-right:10px;">
                Volver al listado
            </a>

            <?php if (empty($coche['vendido']) || $coche['vendido'] == 0): ?>
                <a href="index.php?seccion=marcar_vendido&id=<?php echo $coche['id']; ?>"
                   class="btn-detalles"
                   style="background:#e74c3c;"
                   onclick="return confirm('¿Marcar este coche como vendido?');">
                    Marcar como vendido
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
