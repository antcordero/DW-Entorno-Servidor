<?php require __DIR__ . '/../../layout/header.php'; ?>

<h2>Editar jugador</h2>

<form action="index.php?action=actualizar" method="POST" enctype="multipart/form-data" class="mt-3">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($jugador['id']); ?>">

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" type="text" name="nombre" class="form-control"
               value="<?php echo htmlspecialchars($jugador['nombre']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="dorsal" class="form-label">Dorsal</label>
        <input id="dorsal" type="number" name="dorsal" class="form-control"
               value="<?php echo htmlspecialchars($jugador['dorsal']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="posicion" class="form-label">Posición</label>
        <select id="posicion" name="posicion" class="form-select" required>
            <option value="Portero"        <?php echo $jugador['posicion'] === 'Portero'        ? 'selected' : ''; ?>>Portero</option>
            <option value="Defensa"        <?php echo $jugador['posicion'] === 'Defensa'        ? 'selected' : ''; ?>>Defensa</option>
            <option value="Centrocampista" <?php echo $jugador['posicion'] === 'Centrocampista' ? 'selected' : ''; ?>>Centrocampista</option>
            <option value="Delantero"      <?php echo $jugador['posicion'] === 'Delantero'      ? 'selected' : ''; ?>>Delantero</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="goles" class="form-label">Goles</label>
        <input id="goles" type="number" name="goles" class="form-control"
               value="<?php echo htmlspecialchars($jugador['goles']); ?>">
    </div>

    <div class="mb-3">
        <p>Foto actual:</p>
        <?php
            $foto = $jugador['foto'] ?: 'sin_foto.png';
        ?>
        <img src="public/img/<?php echo htmlspecialchars($foto); ?>"
             alt="Foto de <?php echo htmlspecialchars($jugador['nombre']); ?>"
             style="width:80px; height:80px; object-fit:cover;">
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Cambiar foto (opcional)</label>
        <input id="foto" type="file" name="foto" class="form-control">
    </div>

    <button type="submit" class="btn btn-malaga">Actualizar datos</button>
    <a href="index.php" class="btn btn-secondary">Volver</a>
</form>

<?php require __DIR__ . '/../../layout/footer.php'; ?>
