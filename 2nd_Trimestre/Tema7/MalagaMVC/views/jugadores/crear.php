<?php require __DIR__ . '/../../layout/header.php'; ?>

<h2>Fichar nuevo jugador</h2>

<form action="index.php?action=guardar" method="POST" enctype="multipart/form-data" class="mt-3">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="dorsal" class="form-label">Dorsal</label>
        <input id="dorsal" type="number" name="dorsal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="posicion" class="form-label">Posición</label>
        <select id="posicion" name="posicion" class="form-select" required>
            <option value="">-- Selecciona posición --</option>
            <option value="Portero">Portero</option>
            <option value="Defensa">Defensa</option>
            <option value="Centrocampista">Centrocampista</option>
            <option value="Delantero">Delantero</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="goles" class="form-label">Goles</label>
        <input id="goles" type="number" name="goles" class="form-control" value="0">
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto (opcional)</label>
        <input id="foto" type="file" name="foto" class="form-control">
    </div>

    <button type="submit" class="btn btn-malaga">Guardar jugador</button>
    <a href="index.php" class="btn btn-secondary">Volver</a>
</form>

<?php require __DIR__ . '/../../layout/footer.php'; ?>
