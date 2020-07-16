<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Todo;
use Application\View\Html;

class TodoCreateHtml extends Html
{
    /** @var object */
    protected $todo;

    /**
     * @param object $todo
     */
    public function __construct($todo)
    {
        $this->todo = $todo;
    }

    public function render()
    {
        $this->html =
            '<form method="post">
				<p>' . $this->htmlCreateTodo($this->todo) . '</p>			
		 </form>';
    }

    /**
     * @param Todo $todo
     * @return string
     */
    protected function htmlCreateTodo($todo)
    {
        return
            '<label for="Inhalt">Inhalt:</label>
            <input id="Inhalt" name="' . Name::Inhalt . '"
             value="' . htmlspecialchars($todo->getInhalt()) . '">
            <label for="Erledigt">Erledigt:
            <input id="Erledigt" name="' . Name::Erledigt . '"
             value="' . htmlspecialchars($todo->getIstErledigt()) . '">
            </label>
            <button name="Task" value="' . Task::CreateTodo . '">speichern</button>';
    }
}
