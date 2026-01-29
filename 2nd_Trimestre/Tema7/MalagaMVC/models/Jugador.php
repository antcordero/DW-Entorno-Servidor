<?php
require_once __DIR__ . '/../config/Database.php';

class Jugador
{
    private PDO $pdo;

    public function __construct()
    {
        //la instancia única de Database (Singleton)
        $this->pdo = Database::getInstance();
    }

    /**
     * Obtener todos los jugadores ordenados por dorsal
     */
    public function getAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM plantilla ORDER BY dorsal ASC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener un jugador por su ID
     */
    public function getById(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM plantilla WHERE id = ?');
        $stmt->execute([$id]);
        $jugador = $stmt->fetch();
        return $jugador ?: null;
    }

    /**
     * Crear un nuevo jugador
     */
    public function create(string $nombre, int $dorsal, string $posicion, string $foto, int $goles): bool
    {
        try {
            $sql = 'INSERT INTO plantilla (nombre, dorsal, posicion, foto, goles)
                    VALUES (?, ?, ?, ?, ?)';
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$nombre, $dorsal, $posicion, $foto, $goles]);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Actualizar un jugador existente
     * Si se pasa una foto nueva, se actualiza también el campo foto.
     */
    public function update(
        int $id,
        string $nombre,
        int $dorsal,
        string $posicion,
        int $goles,
        ?string $foto = null
    ): bool {
        try {
            if ($foto) {
                $sql = 'UPDATE plantilla
                        SET nombre = ?, dorsal = ?, posicion = ?, goles = ?, foto = ?
                        WHERE id = ?';
                $params = [$nombre, $dorsal, $posicion, $goles, $foto, $id];
            } else {
                $sql = 'UPDATE plantilla
                        SET nombre = ?, dorsal = ?, posicion = ?, goles = ?
                        WHERE id = ?';
                $params = [$nombre, $dorsal, $posicion, $goles, $id];
            }

            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Eliminar un jugador por su ID
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM plantilla WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
