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

    protected function htmlDelete($todo)
    {
        return
        '<tr>
            <td>Sind Sie sicher?</td>
            <td>
                ' . $this->htmlAktionen($todo) . '
            </td>
        </tr>';
    }

    protected function htmlAktionen($todo)
    {
        return $this->htmlAktionEntfernen($todo);
    }

    protected function htmlAktionEntfernen($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::ConfirmDelete,
            /*Name::TodoId => $todo->getTodoId(),*/
        ));

        $result = '<a href="/?' . $query . '">Endgültig löschen</a>';
        return $result;
    }
}