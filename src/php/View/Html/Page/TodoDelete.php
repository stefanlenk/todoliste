<?php

namespace Application\View\Html\Page;

use Application\Model\Request;
use Application\View\Html\Page;
use Application\View\Html\TodoDeleteHtml;

class TodoDelete extends Page
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
        return 'Todo entfernen';
    }

    /**
     * @inheritDoc
     */
    protected function htmlBody()
    {
        return $this->htmlDelete();
    }

    protected function htmlDelete()
    {
        $view = new TodoDeleteHtml($this->request);
        $view->render();
        $result = $view->getHtml();
        return $result;
    }
}
