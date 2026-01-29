<?php
require_once __DIR__ . '/../models/Jugador.php';

class JugadorController
{
    private Jugador $modelo;

    public function __construct()
    {
        $this->modelo = new Jugador();
    }

    /**
     * Acción por defecto: listar jugadores
     */
    public function index(): void
    {
        $jugadores = $this->modelo->getAll();
        require __DIR__ . '/../views/jugadores/index.php';
    }

    /**
     * Mostrar formulario de creación
     */
    public function crear(): void
    {
        require __DIR__ . '/../views/jugadores/crear.php';
    }

    /**
     * Guardar nuevo jugador (procesa el form de crear)
     */
    public function guardar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre   = $_POST['nombre']   ?? '';
            $dorsal   = (int)($_POST['dorsal'] ?? 0);
            $posicion = $_POST['posicion'] ?? '';
            $goles    = (int)($_POST['goles'] ?? 0);

            $foto = 'sin_foto.png';

            if (!empty($_FILES['foto']['name']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $nombreArchivo = basename($_FILES['foto']['name']);
                $rutaDestino   = __DIR__ . '/../public/img/' . $nombreArchivo;

                if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
                    $foto = $nombreArchivo;
                }
            }

            $this->modelo->create($nombre, $dorsal, $posicion, $foto, $goles);

            header('Location: index.php');
            exit;
        }
    }

    /**
     * Mostrar formulario de edición con datos de un jugador
     */
    public function editar(int $id): void
    {
        $jugador = $this->modelo->getById($id);

        if (!$jugador) {
            //Si no existe el jugador, volver al listado
            header('Location: index.php');
            exit;
        }

        require __DIR__ . '/../views/jugadores/editar.php';
    }

    /**
     * Actualizar jugador
     */
    public function actualizar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id       = (int)($_POST['id'] ?? 0);
            $nombre   = $_POST['nombre']   ?? '';
            $dorsal   = (int)($_POST['dorsal'] ?? 0);
            $posicion = $_POST['posicion'] ?? '';
            $goles    = (int)($_POST['goles'] ?? 0);

            $foto = null;

            //Si se envía una nueva foto
            if (!empty($_FILES['foto']['name']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $nombreArchivo = basename($_FILES['foto']['name']);
                $rutaDestino   = __DIR__ . '/../public/img/' . $nombreArchivo;

                if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
                    $foto = $nombreArchivo;
                }
            }

            $this->modelo->update($id, $nombre, $dorsal, $posicion, $goles, $foto);

            header('Location: index.php');
            exit;
        }
    }

    /**
     * Eliminar un jugador por su ID
     */
    public function eliminar(int $id): void
    {
        $this->modelo->delete($id);
        header('Location: index.php');
        exit;
    }
}
