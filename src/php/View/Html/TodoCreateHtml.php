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
         '<form action="TodoCreateHtml.php">
				' . $this->htmlCreateTodo($this->todo) . '				
			</form>';
     }

     protected function htmlCreateTodo()
     {
         return
            '<label for ' . Name::Inhalt . '>Inhalt</label>
            <input id="Inhalt" name="Inhalt">
            <button name="Task" value="' . Task::Create .'">speichern</button>
            
            ';
     }
}
