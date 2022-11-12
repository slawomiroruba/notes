<?php
declare(strict_types=1);

namespace App;

require_once('Exception/StorageException.php');

use App\Exception\StorageException;
use PDO;
use PDOException;
use Throwable;

class Database
{
    private PDO $connection;

    /**
     * @throws StorageException
     */
    public function __construct(array $config)
    {
        $this->validateConfig($config);

        try {
            $this->createConnection($config);
        } catch (PDOException $e){
            throw new StorageException('Establishing connection error');
        }

    }

    public function createConnection(array $config): void
    {
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $user = $config['user'];
        $password = $config['password'];
        $options = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $this->connection = new PDO($dsn, $user, $password, $options);
    }

    /**
     * @throws StorageException
     */
    private function validateConfig(array $config): void
    {
        if(
            empty($config['database'])
            || empty($config['user'])
            || empty($config['password'])
            || empty($config['host'])
        ){
            throw new StorageException('Błąd z plikiem konfiguracyjnym');
        }
    }
    public function getNotes(): array
    {
        $notes = [];
        $query = "SELECT id, title FROM notes";
        $result = $this->connection->query($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNote(int $id): array
    {
        $notes = [];
        $query = "SELECT id, title, description, created FROM notes WHERE id=$id";
        $result = $this->connection->query($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createNote(?array $data): void
    {
        try {
            $title = $this->connection->quote($data['title']);
            $description = $this->connection->quote($data['description']);
            $date = $this->connection->quote(date('Y-m-d H:i:s'));

            $query = "
                INSERT INTO notes(title, description, created) 
                VALUES ($title, $description, $date)
            ";
            $this->connection->exec($query);
        } catch (Throwable $e){
            dump($e);
            exit();
        }
    }
}