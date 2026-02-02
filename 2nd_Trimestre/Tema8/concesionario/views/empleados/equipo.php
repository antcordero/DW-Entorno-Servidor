<div class="header-section">
    <h1><i class="fa-solid fa-users"></i> Equipo Motor Pro</h1>
    
    <?php if ($_SESSION['usuario']['rol'] == 'admin'): ?>
        <a href="index.php?seccion=crear_empleado" class="btn-primary">
            <i class="fa-solid fa-user-plus"></i> Contratar Nuevo
        </a>
    <?php endif; ?>
</div>

<div class="stats-box">
    <h3>💰 Gasto Mensual en Salarios</h3>
    <div class="big-number">
        <?php echo Util::moneda($gastoTotal); ?>
    </div>
    <p class="small-text"><?php echo count($listaEmpleados); ?> empleados activos</p>
</div>

<table class="tabla-pro">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Email</th>
            <th>Sueldo</th>
            <?php if ($_SESSION['usuario']['rol'] == 'admin'): ?>
                <th>Acciones</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listaEmpleados as $emp): ?>
            <tr>
                <td style="font-weight: bold;"><?php echo $emp['nombre']; ?></td>
                <td>
                    <?php 
                        $color = 'gray';
                        if($emp['cargo'] == 'Jefe Taller') $color = '#e67e22';
                        if($emp['cargo'] == 'Vendedor') $color = '#3498db';
                        if($emp['cargo'] == 'Gerente') $color = '#9b59b6';
                    ?>
                    <span class="badge" style="background:<?php echo $color; ?>; color:white;">
                        <?php echo $emp['cargo']; ?>
                    </span>
                </td>
                <td><a href="mailto:<?php echo $emp['email']; ?>"><?php echo $emp['email']; ?></a></td>
                <td><?php echo Util::moneda($emp['sueldo']); ?></td>
                
                <?php if ($_SESSION['usuario']['rol'] == 'admin'): ?>
                <td>
                    <a href="index.php?seccion=borrar_empleado&id=<?php echo $emp['id']; ?>" 
                       class="btn-cancel" 
                       onclick="return confirm('¿Despedir a este empleado?');"
                       style="padding: 5px 10px; font-size: 0.8rem;">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>