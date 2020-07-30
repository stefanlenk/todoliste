<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Todo;
use Application\View\Html;

class TodoUpdateHtml extends Html
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
				<p>' . $this->htmlUpdateTodo($this->todo) . '</p>	
		    </form>';
    }

    /**
     * @param Todo $todo
     * @return string
     */
    /*protected function htmlUpdateTodo($todo)                    //htmlAktionen
    {
        return
            '<label for="Inhalt">Inhalt:</label>
            <input id="Inhalt" name="' . Name::Inhalt . '"
             value="' . htmlspecialchars($todo->getInhalt()) . '">
            '. $this->htmlAktionEntfernen($todo) .'
            <label for="Erledigt">Erledigt:
            <input type="checkbox" id="Erledigt" name="' . Name::Erledigt . '" 
            '. $this->htmlIstErledigt($todo) . '></label>'
            . $this->htmlAktionSpeichern($todo);
    }*/

    protected function htmlUpdateTodo($todo)                      //Buttons
    {
        return
            '<label for="Inhalt">Inhalt:</label>
            <input id="Inhalt" name="' . Name::Inhalt . '"
             value="' . htmlspecialchars($todo->getInhalt()) . '">
             <button name="Task" value="' . Task::DeleteTodo . '">löschen</button>
            <label for="Erledigt">Erledigt:
            <input type="checkbox" id="Erledigt" name="' . Name::Erledigt . '" 
            ' . $this->htmlIstErledigt($todo) . '></label>
            <button name="Task" value="' . Task::UpdateTodo . '">speichern</button>
            ';
    }

    /**
     * @param Todo $todo
     * @return string
     */
    protected function htmlIstErledigt($todo)
    {
        return ($todo->getIstErledigt())
            ? "checked='checked'"
            : "";
    }

    /**
     * @param Todo $todo
     * @return string
     */
    protected function htmlAktionEntfernen($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::DeleteTodo,
            Name::TodoId => $todo->getTodoId(),
        ));

        $result = '<a href="/?' . $query . '">Entfernen</a>';
        return $result;
    }

    protected function htmlAktionSpeichern($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::UpdateTodo,
            Name::TodoId => $todo->getTodoId(),
        ));

        $result = '<a href="/?' . $query . '">Speichern</a>';
        return $result;
    }
}
