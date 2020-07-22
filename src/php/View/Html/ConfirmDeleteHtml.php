<?php
//keine Verwendung mehr
namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\View\Html;

class ConfirmDeleteHtml extends Html
{
    /** @var object */
    protected $todos;

    /**
     * @param object $todos
     */
    public function __construct($todos)
    {
        $this->todos = $todos;
    }

    public function render()
    {
        $this->html =
            '<table>
                <tbody>
				' . $this->htmlDelete($this->todos) . '
				</tbody>
			</table>';
    }

    protected function htmlDelete($todos)
    {
        return
            '<tr><td>gelöscht</td></tr>';
    }

    protected function htmlAktion($todos)
    {
        $query = http_build_query(array(
            Name::Task => Task::ShowTodoList,
        ));
        $result = '<a herf="/?' . $query . '">zurück zur Übersicht</a>';
        return $result;
    }
}