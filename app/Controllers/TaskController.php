<?php
namespace App\Controllers;

use App\Models\Task;
use App\Enums\TaskStatus;

class TaskController {
    public function index() {
        $tasks = Task::all();
        require __DIR__ . '/../../views/tasks.php';
    }
    
    public function store() {
        $task = new Task(
            title: $_POST['title'] ?? '',
            description: $_POST['description'] ?? '',
            status: TaskStatus::TODO
        );
        $task->save();
        header('Location: /');
        exit;
    }
    
    public function complete(int $id) {
        if ($task = Task::find($id)) {
            $task->status = TaskStatus::DONE;
            $task->save();
        }
        header('Location: /');
        exit;
    }
    
    public function destroy(int $id) {
        if ($task = Task::find($id)) {
            $task->delete();
        }
        header('Location: /');
        exit;
    }
}
