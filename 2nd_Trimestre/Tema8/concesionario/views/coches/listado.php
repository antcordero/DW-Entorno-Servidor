<h1><i class="fa-solid fa-car"></i> Inventario de Vehículos</h1>

<div class="grid-coches">
    <?php foreach ($listaCoches as $coche): ?>
        <?php
            // 1 = vendido, 0 = disponible
            $estaVendido = !empty($coche['vendido']) && $coche['vendido'] == 1;
        ?>
        <div class="card-coche <?php echo ($coche['destacado']) ? 'destacado' : ''; ?>">
            <div class="icon-placeholder">
                <i class="fa-solid fa-car"></i>
            </div>
            
            <div class="card-body">
                <h3><?php echo $coche['marca'] . ' ' . $coche['modelo']; ?></h3>
                
                <p class="precio">
                    <?php echo Util::moneda($coche['precio']); ?>
                </p>
                
                <p class="stock">
                    Stock: <strong><?php echo $coche['stock']; ?></strong> u.
                    <?php if ($estaVendido): ?>
                        <span style="color:red; font-weight:bold; margin-left:8px;">VENDIDO</span>
                    <?php endif; ?>
                </p>

                <?php if($coche['destacado']): ?>
                    <span class="badge-vip"><i class="fa-solid fa-star"></i> VIP</span>
                <?php endif; ?>
                
                <?php if ($estaVendido): ?>
                    <!-- Si ya está vendido, solo mostramos un botón desactivado -->
                    <button class="btn-detalles" disabled style="opacity:0.6; cursor:not-allowed;">
                        Vendido
                    </button>
                <?php else: ?>
                    <!-- Enlace a la ficha individual del coche -->
                    <a href="index.php?seccion=detalle_coche&id=<?php echo $coche['id']; ?>"
                       class="btn-detalles">
                        Ver Ficha
                    </a>

                    <!-- Botón para marcar como vendido (soft delete) -->
                    <a href="index.php?seccion=marcar_vendido&id=<?php echo $coche['id']; ?>"
                       class="btn-detalles"
                       style="background:#e74c3c; margin-left:8px;"
                       onclick="return confirm('¿Marcar este coche como vendido?');">
                        Vender
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
