<?php
//keine Verwendung mehr
namespace Application\View\Html\Page;

use Application\View\Html\ConfirmDeleteHtml;
use Application\View\Html\Page;
use Application\View\Html\TodoListHtml;

class TodoConfirmDelete extends Page
{
    /** @var array */
    protected $todos;

    /**
     * @param array $todos
     */
    public function __construct($todos)
    {
        $this->todos = $todos;
    }

    /**
     * @inheritDoc
     */
    protected function htmlPageTitle()
    {
        return 'gelöscht';
    }

    /**
     * @inheritDoc
     */
    protected function htmlBody()
    {
        return $this->htmlTodoTabelle();
    }

    protected function htmlDelete()
    {
        $view = new ConfirmDeleteHtml($this->todos);
        $view->render();
        $result = $view->getHtml();
        return $result;
    }

    protected function htmlTodoTabelle()
    {
        $view = new TodoListHtml($this->todos);
        $view->render();
        $result = $view->getHtml();
        return $result;
    }
}
