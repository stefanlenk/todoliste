<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Storage\Database;

class ConfirmDelete extends Controller
{
    public function handleRequest()
    {
        $todo = $this->modelTodo();
        return $this->gotoHomepage();
    }

    protected function modelTodo()
    {
        $connection = $this->setup->databaseConnection();
        $storage = new Database($connection);
        $todoId = $this->request->valueOfParameter(Name::TodoId);
        $result = $storage->deleteTodo($todoId);

        return $result;
    }

 /*   protected function modelTodos()
    {
        $connection = $this->setup->databaseConnection();
        $storage = new Database($connection);
        $result = $storage->getAllTodos();

        return $result;
    }*/

    protected function gotoHomepage()
    {
        return header('Location: ?'. Name::Task .' = '. Task::ShowTodoList);
    }
}
