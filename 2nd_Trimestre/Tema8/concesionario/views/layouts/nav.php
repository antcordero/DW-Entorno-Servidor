<aside class="sidebar">
    <div style="padding: 20px; text-align: center; border-bottom: 1px solid #445;">
        <i class="fa-solid fa-circle-user" style="font-size: 3rem; color: #bdc3c7;"></i>
        <p style="color: white; margin-top: 10px; font-weight: bold;">
            <?php echo $_SESSION['usuario']['nombre']; ?>
        </p>
        <span class="badge" style="background:<?php echo ($_SESSION['usuario']['rol']=='admin')?'#e74c3c':'#3498db'; ?>; color:white;">
            <?php echo strtoupper($_SESSION['usuario']['rol']); ?>
        </span>
    </div>

    <nav>
        <ul>
            <li><a href="index.php?seccion=dashboard"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
            <li><a href="index.php?seccion=coches"><i class="fa-solid fa-car"></i> Ventas</a></li>
            <li><a href="index.php?seccion=taller"><i class="fa-solid fa-wrench"></i> Taller</a></li>
            <li><a href="index.php?seccion=piezas"><i class="fa-solid fa-boxes-stacked"></i> Almacén</a></li>
            <li><a href="index.php?seccion=empleados"><i class="fa-solid fa-users"></i> RRHH</a></li>


            <?php if($_SESSION['usuario']['rol'] == 'admin'): ?>
                <li style="margin-top: 20px; border-top: 1px solid #445;">
                    <a href="index.php?seccion=admin_usuarios" style="color: #f1c40f;">
                        <i class="fa-solid fa-user-shield"></i> Gestión Accesos
                    </a>
                </li>
            <?php endif; ?>
            
            <li style="margin-top: 20px;">
                <a href="index.php?seccion=logout" style="color: #e74c3c;">
                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                </a>
            </li>
        </ul>
    </nav>
</aside>