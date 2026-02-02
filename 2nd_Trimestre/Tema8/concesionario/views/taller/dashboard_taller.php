
<h1><i class="fa-solid fa-calendar-check"></i> Agenda de Taller</h1>

<table class="tabla-pro">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Matrícula</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listaCitas as $cita): ?>
            <tr>
                <td><?php echo Util::fecha($cita['fecha']); ?></td>
                <td><?php echo $cita['cliente']; ?></td>
                <td><span class="matricula"><?php echo $cita['matricula']; ?></span></td>
                <td><?php echo Util::acortar($cita['descripcion'], 30); ?></td>
                
                <td>
                    <?php 
                        $clase = 'status-pending';
                        if($cita['estado'] == 'En Proceso') $clase = 'status-process';
                        if($cita['estado'] == 'Terminado') $clase = 'status-done';
                    ?>
                    <span class="badge <?php echo $clase; ?>"><?php echo $cita['estado']; ?></span>
                </td>
                
                <td>
                    <a href="#" class="btn-action"><i class="fa-solid fa-pen"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>