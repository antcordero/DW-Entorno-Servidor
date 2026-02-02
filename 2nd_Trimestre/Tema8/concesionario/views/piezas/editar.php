<h1><i class="fa-solid fa-pen-to-square"></i> Editar pieza</h1>

<div class="form-container">
    <form action="index.php?seccion=actualizar_pieza" method="POST">
        
        <input type="hidden" name="id" value="<?php echo $pieza['id']; ?>">

        <div class="form-group">
            <label>Nombre de la pieza:</label>
            <input type="text" name="nombre" required
                   value="<?php echo $pieza['nombre']; ?>">
        </div>

        <div class="form-group">
            <label>Referencia:</label>
            <input type="text" name="referencia" required
                   value="<?php echo $pieza['referencia']; ?>">
        </div>

        <div class="form-group">
            <label>Precio (€):</label>
            <input type="number" name="precio" step="0.01" required
                   value="<?php echo $pieza['precio']; ?>">
        </div>

        <div class="form-group">
            <label>Stock (unidades):</label>
            <input type="number" name="stock" required min="0"
                   value="<?php echo $pieza['stock']; ?>">
        </div>

        <div class="form-group">
            <label>Ubicación en almacén:</label>
            <input type="text" name="ubicacion" required
                   value="<?php echo $pieza['ubicacion']; ?>">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-success">
                <i class="fa-solid fa-save"></i> Actualizar pieza
            </button>
            <a href="index.php?seccion=piezas" class="btn-cancel">Volver</a>
        </div>

    </form>
</div>
