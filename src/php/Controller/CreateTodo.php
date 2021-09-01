<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\Model\Todo;
use Application\View\Html\Page\TodoCreate;
use LogicException;

class CreateTodo extends Controller
{
    public function handleRequest()
    {
        $requestMethod = $this->request->methodLowercased();
        $todo = new Todo();

        switch ($requestMethod) {
            case 'get':
                $this->response = $this->responseShowForm($todo);
                break;
            case 'post':
                $this->assignRequestToTodo($todo);
                $inputIsValid = $this->inputIsValid($todo);

                if ($inputIsValid)
                    $this->response = $this->handleValidInput($todo);
                else $this->response = $this->handleInvalidData($todo);
                break;
            default:
                throw new LogicException('Unknown request method: ' . $requestMethod);
                break;
        }
    }

    protected function responseShowForm($todo)
    {
        $view = new TodoCreate($todo);
        $view->render();
        return new Html($view->getHtml());
    }

    protected function gotoHomepage()
    {
        return header('Location: ?'. Name::Task .' = '. Task::ShowTodoList);
    }

    /**
     * @param Todo $todo
     */
    protected function assignRequestToTodo($todo)
    {
        $inhalt = $this->request->valueOfParameter(Name::Inhalt);
        $istErledigt = $this->request->valueOfParameter(Name::Erledigt);

        $todo->setInhalt($inhalt);
        $todo->setIstErledigt($istErledigt);
    }

    protected function inputIsValid($todo)
    {
        return true;
    }

    /**
     * @param Todo $todo
     */
    protected function handleValidInput($todo)
    {
        $connection = $this->setup->databaseConnection();
        $storage = new Database($connection);
        $storage->createTodo($todo);
        return $this->gotoHomepage();
    }

    protected function handleInvalidData($todo)
    {
        return $this->responseShowForm($todo);
    }
}