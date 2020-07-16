<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\View\Html;

class ConfirmDeleteHtml extends Html
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
				' . $this->htmlDelete($this->todo) . '
				</tbody>
			</table>';
    }

    protected function htmlDelete($todo)
    {
        return
            '<tr><td>gelöscht</td></tr>';
    }

    protected function htmlAktion($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::ShowTodoList,
        ));
        $result = '<a herf="/?' . $query . '">zurück zur Übersicht</a>';
        return $result;
    }
}