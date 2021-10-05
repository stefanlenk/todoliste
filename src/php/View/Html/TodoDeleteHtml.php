<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Todo;
use Application\View\Html;

class TodoDeleteHtml extends Html
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

    /*public function render()
    {
        $this->html =
            '<table>
            <tbody>
                <tr>
                <td>Sind Sie sicher?</td>
				<td>'. $this->htmlConfirmDelete($this->todo) .'</td>
				</tr>
				<tr>
				<td>'. $this->htmlAktionHomepage () .'</td>
				</tr>
			</tbody>				
			</table>';
    }*/

    public function render()
    {
        $this->html =
            '<table>
            <tbody>
                <li class="button">Sind Sie sicher?</li>
				<li class="button">'. $this->htmlConfirmDelete($this->todo) .'</li>
				<li class="button">'. $this->htmlAktionHomepage () .'</li>
			</tbody>				
			</table>';
    }

    /**
     * @param Todo $todo
     * @return string
     */
    protected function htmlConfirmDelete($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::ConfirmDelete,
            Name::TodoId => $todo->getTodoId(),
        ));

        $result = '<a href="/?' . $query . '">Endgültig löschen</a>';
        return $result;
    }

    protected function htmlAktionHomepage()
    {
        $query = http_build_query(array(
            Name::Task => Task::ShowTodoList
        ));

        $result = '<a href="/?' . $query . '">Nein</a>';
        return $result;
    }
}