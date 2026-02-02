<div class="header-section">
    <h1><i class="fa-solid fa-user-shield"></i> Gestión de Accesos</h1>
</div>

<div class="form-container" style="margin-bottom: 40px;">
    <h3>Añadir Nuevo Usuario</h3>
    <form action="index.php?seccion=crear_usuario" method="POST">
        <div class="form-group">
            <input type="text" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email (Login)" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
            <select name="rol">
                <option value="empleado">Empleado (Acceso normal)</option>
                <option value="admin">Administrador (Jefe)</option>
            </select>
        </div>
        <button type="submit" class="btn-success">Crear Usuario</button>
    </form>
</div>

<table class="tabla-pro">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?php echo $u['id']; ?></td>
            <td><?php echo $u['nombre']; ?></td>
            <td><?php echo $u['email']; ?></td>
            <td>
                <?php if($u['rol'] == 'admin'): ?>
                    <span class="badge status-process">ADMIN</span>
                <?php else: ?>
                    <span class="badge status-done">EMPLEADO</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if($u['id'] != $_SESSION['usuario']['id'] && $u['id'] != 1): ?>
                    <a href="index.php?seccion=borrar_usuario&id=<?php echo $u['id']; ?>" 
                       class="btn-cancel" style="padding:5px 10px; font-size:0.8rem;"
                       onclick="return confirm('¿Seguro que quieres eliminar este acceso?');">
                       <i class="fa-solid fa-trash"></i> Borrar
                    </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>