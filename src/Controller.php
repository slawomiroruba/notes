<?php

declare(strict_types=1);

namespace App;

use App\Exception\AppException;
use App\Exception\StorageException;
use Throwable;

require_once('src/Database.php');
require_once('src/View.php');

class Controller
{
    private const DEFAULT_ACTION = 'list';

    public static array $configuration = [];

    private array $request;
    private Database $database;
    private string $action;
    private array $viewParams;

    private View $view;

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function __construct(array $request)
    {
        try {
            $this->database = new Database(self::$configuration['db']);
        } catch (StorageException $e) {
            throw new StorageException($e->getMessage());
        }

        $this->request = $request;
        $this->action = $this->request['get']['action'] ?? self::DEFAULT_ACTION;
        $this->view = new View();
        $this->viewParams = [];

    }


    public function run(): void
    {
        switch ($this->action){
            case 'create':
                $page = 'create';
                $data = $this->getRequestPost();
                if(!empty($data)){
                    $this->database->createNote([
                        'title' => $data['title'],
                        'description' => $data['description']
                    ]);
                    header('Location: /notes/?before=created');
                }

                break;
            case 'show':
                $page = 'show';
                $data = $this->getRequestGet();
                try {
                    $noteId = (int) $data['id'];
                    $note = $this->database->getNote($noteId);
                } catch (Throwable $e) {
                    throw new AppException("Nie udało się pobrać notatki o ID $noteId");
                }
                $this->viewParams = [
                    'note' => $note
                ];
                break;
            default:
                $page = 'list';
                $data = $this->getRequestGet();

                $this->viewParams = [
                    'before' => $data['before'] ?? null,
                    'notes' => $this->database->getNotes()
                ];
                break;
        }

        $this->view->render($page, $this->viewParams);
    }

    private function getRequestPost(): array
    {
        return $this->request['post'] ?? [];
    }

    private function getRequestGet(): array
    {
        return $this->request['get'] ?? [];
    }
}