<h1><i class="fa-solid fa-user-plus"></i> Contratar Nuevo Empleado</h1>

<div class="form-container">
    <form action="index.php?seccion=guardar_empleado" method="POST">
        
        <div class="form-group">
            <label>Nombre Completo:</label>
            <input type="text" name="nombre" required placeholder="Ej: Laura Martínez">
        </div>

        <div class="form-group">
            <label>Cargo:</label>
            <select name="cargo" required>
                <option value="Mecánico">Mecánico</option>
                <option value="Jefe Taller">Jefe Taller</option>
                <option value="Vendedor">Vendedor</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Gerente">Gerente</option>
            </select>
        </div>

        <div class="form-group">
            <label>Email Corporativo:</label>
            <input type="email" name="email" required placeholder="usuario@motorpro.com">
        </div>

        <div class="form-group">
            <label>Sueldo Bruto Mensual:</label>
            <input type="number" name="sueldo" step="0.01" required placeholder="Ej: 1500.00">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-success">
                <i class="fa-solid fa-save"></i> Guardar Ficha
            </button>
            <a href="index.php?seccion=empleados" class="btn-cancel">Cancelar</a>
        </div>

    </form>
</div>