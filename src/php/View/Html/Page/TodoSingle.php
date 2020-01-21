<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\TodoRow;

class TodoSingle extends Page
{
    /** @var array */
    protected $todo;

    /**
     * @param $todo
     */
    public function __construct($todo)
    {
        $this->todo = $todo;
    }

    protected function htmlPageTitle()
    {
        return 'Todo anzeigen';
    }

    protected function htmlBody()
    {
        return $this->htmlTodoRow();
    }

    protected function htmlTodoRow()
    {
        $view = new TodoRow($this->todo);
        $view->render();
        $result = $view->getHtml();
        return $result;
    }
}