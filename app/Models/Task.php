<?php
namespace App\Models;

use App\Enums\TaskStatus;
use PDO;

class Task {
    public function __construct(
        public ?int $id = null,
        public string $title = '',
        public string $description = '',
        public TaskStatus $status = TaskStatus::TODO,
        public ?string $created_at = null,
        public ?string $updated_at = null
    ) {}
    
    private static function db(): PDO {
        static $pdo = null;
        if (!$pdo) {
            $pdo = new PDO('sqlite:' . __DIR__ . '/../../database/database.sqlite');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $pdo;
    }
    
    public static function all(): array {
        $stmt = self::db()->query('SELECT * FROM tasks ORDER BY created_at DESC');
        return array_map(fn($row) => new self(
            $row['id'],
            $row['title'],
            $row['description'],
            TaskStatus::from($row['status']),
            $row['created_at'],
            $row['updated_at']
        ), $stmt->fetchAll());
    }
    
    public static function find(int $id): ?self {
        $stmt = self::db()->prepare('SELECT * FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ? new self($row['id'], $row['title'], $row['description'], TaskStatus::from($row['status']), $row['created_at'], $row['updated_at']) : null;
    }
    
    public function save(): void {
        $db = self::db();
        if ($this->id) {
            $stmt = $db->prepare('UPDATE tasks SET title=?, description=?, status=?, updated_at=CURRENT_TIMESTAMP WHERE id=?');
            $stmt->execute([$this->title, $this->description, $this->status->value, $this->id]);
        } else {
            $stmt = $db->prepare('INSERT INTO tasks (title, description, status, created_at, updated_at) VALUES (?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)');
            $stmt->execute([$this->title, $this->description, $this->status->value]);
            $this->id = (int)$db->lastInsertId();
        }
    }
    
    public function delete(): void {
        if ($this->id) {
            $stmt = self::db()->prepare('DELETE FROM tasks WHERE id = ?');
            $stmt->execute([$this->id]);
        }
    }
}
