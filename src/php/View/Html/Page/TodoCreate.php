<?php

namespace Application\View\Html\Page;

use Application\Model\Request;
use Application\View\Html\Page;
use Application\View\Html\Page\TodoUpdate;
use Application\View\Html\TodoCreateHtml;

class TodoCreate extends Page
{
    /** @var  Request */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    protected function htmlPageTitle()
    {
        return 'Todo anlegen';
    }

    /**
     * @inheritDoc
     */
    protected function htmlBody()
    {
        return $this->htmlCreate();
    }

    protected function htmlCreate()
    {
        $view = new TodoCreateHtml($this->request);
        $view->render();
        $result = $view->getHtml();
        return $result;
    }
}
