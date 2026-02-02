<h1><i class="fa-solid fa-box"></i> Nueva pieza de recambio</h1>

<div class="form-container">
    <form action="index.php?seccion=guardar_pieza" method="POST">
        
        <div class="form-group">
            <label>Nombre de la pieza:</label>
            <input type="text" name="nombre" required placeholder="Ej: Filtro de aceite 1.6 TDI">
        </div>

        <div class="form-group">
            <label>Referencia:</label>
            <input type="text" name="referencia" required placeholder="Ej: REF-1234-XYZ">
        </div>

        <div class="form-group">
            <label>Precio (€):</label>
            <input type="number" name="precio" step="0.01" required placeholder="Ej: 25.50">
        </div>

        <div class="form-group">
            <label>Stock inicial (unidades):</label>
            <input type="number" name="stock" required placeholder="Ej: 10" min="0">
        </div>

        <div class="form-group">
            <label>Ubicación en almacén:</label>
            <input type="text" name="ubicacion" required placeholder="Ej: Pasillo A, Estantería 3">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-success">
                <i class="fa-solid fa-save"></i> Guardar pieza
            </button>
            <a href="index.php?seccion=piezas" class="btn-cancel">Cancelar</a>
        </div>

    </form>
</div>
