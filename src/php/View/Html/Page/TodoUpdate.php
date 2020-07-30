<?php

namespace Application\View\Html\Page;

use Application\Model\Request;
use Application\View\Html\Page;
use Application\View\Html\TodoUpdateHtml;

class TodoUpdate extends Page
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
		return 'Todo bearbeiten';
	}

	/**
	 * @inheritDoc
	 */
	protected function htmlBody()
	{
		return $this->htmlTodoUpdate();
	}

	protected function htmlTodoUpdate()
	{
		$view = new TodoUpdateHtml($this->request);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
