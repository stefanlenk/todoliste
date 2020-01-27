<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\TodoSingleHtml;

class TodoSingle extends Page
{
    /** @var object */
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
        $view = new TodoSingleHtml($this->todo);
        $view->render();
        $result = $view->getHtml();
        return $result;
    }
}