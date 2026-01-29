<?php require __DIR__ . '/../../layout/header.php'; ?>

<h1 class="mb-3">Plantilla del Málaga CF</h1>

<div class="mb-3">
    <a href="index.php?action=crear" class="btn btn-malaga">Fichar jugador</a>
</div>

<table class="table table-striped table-malaga">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Dorsal</th>
            <th>Posición</th>
            <th>Goles</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($jugadores as $jugador): ?>
        <tr>
            <td>
                <?php
                    //Si no hay foto -> sinfoto.png
                    $foto = $jugador['foto'] ?: 'sinfoto.png';
                ?>
                <img src="public/img/<?php echo htmlspecialchars($foto); ?>"
                    alt="Foto de <?php echo htmlspecialchars($jugador['nombre']); ?>"
                    style="width:60px; height:60px; object-fit:cover;">
            </td>
            <td><?php echo htmlspecialchars($jugador['nombre']); ?></td>
            <td><?php echo htmlspecialchars($jugador['dorsal']); ?></td>
            <td><?php echo htmlspecialchars($jugador['posicion']); ?></td>
            <td><?php echo htmlspecialchars($jugador['goles']); ?></td>
            <td>
                <a href="index.php?action=editar&id=<?php echo $jugador['id']; ?>"
                    class="btn btn-sm btn-primary">Editar</a>
                
                <a href="index.php?action=eliminar&id=<?php echo $jugador['id']; ?>"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Seguro que quieres eliminar a este jugador?');">
                    Eliminar
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../../layout/footer.php'; ?>
