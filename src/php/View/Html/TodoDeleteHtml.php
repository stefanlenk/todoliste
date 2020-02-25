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

    public function render()
    {
        $this->html =
            '<table>
				<tbody>
					' . $this->htmlDelete() . '
				</tbody>
			</table>';
    }

    protected function htmlDelete()
    {
        return
        '<tr>
            <td>Sind Sie sicher?</td>
            <td>
                <button name="Task" value="' . Task::DeleteTodo .'">Endgültig löschen.</button>
            </td>
        </tr>';
    }
}