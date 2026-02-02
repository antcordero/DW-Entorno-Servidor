<div class="header-section">
    <h1><i class="fa-solid fa-chart-line"></i> Panel de Control General</h1>
    <p class="subtitle">Bienvenido al sistema ERP de Motor Pro. Aquí tienes el estado actual de la empresa.</p>
</div>

<div class="dashboard-grid">
    
    <div class="stat-card blue">
        <div class="stat-icon">
            <i class="fa-solid fa-car"></i>
        </div>
        <div class="stat-data">
            <h3>Vehículos en Stock</h3>
            <span class="number"><?php echo $totalCoches; ?></span>
            <small><?php echo $vipCoches; ?> son VIP</small>
        </div>
    </div>

    <div class="stat-card orange">
        <div class="stat-icon">
            <i class="fa-solid fa-wrench"></i>
        </div>
        <div class="stat-data">
            <h3>Citas Activas</h3>
            <span class="number"><?php echo $citasPendientes; ?></span>
            <small>Vehículos en taller</small>
        </div>
    </div>

    <div class="stat-card green">
        <div class="stat-icon">
            <i class="fa-solid fa-users"></i>
        </div>
        <div class="stat-data">
            <h3>Plantilla</h3>
            <span class="number"><?php echo $totalEmpleados; ?></span>
            <small>Empleados contratados</small>
        </div>
    </div>

    <div class="stat-card purple">
        <div class="stat-icon">
            <i class="fa-solid fa-cash-register"></i>
        </div>
        <div class="stat-data">
            <h3>Facturación Mes</h3>
            <span class="number">125.000 €</span>
            <small>+15% vs mes anterior</small>
        </div>
    </div>

</div>

<h2 style="margin-top: 40px;">Acciones Rápidas</h2>
<div class="quick-actions">
    <a href="index.php?seccion=crear_empleado" class="action-btn">
        <i class="fa-solid fa-user-plus"></i> Contratar Empleado
    </a>
    <a href="index.php?seccion=coches" class="action-btn">
        <i class="fa-solid fa-list"></i> Ver Inventario
    </a>
    <a href="index.php?seccion=taller" class="action-btn">
        <i class="fa-solid fa-calendar-plus"></i> Gestionar Citas
    </a>
</div>