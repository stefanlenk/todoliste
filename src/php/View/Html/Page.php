<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\View\Html;

abstract class Page extends Html
{
	public function render()
	{
		$this->html =
			'<!DOCTYPE html>
			<html lang="de">
			  <head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<title>' . $this->htmlPageTitle() . ' | ToDo-Liste</title>
			  </head>
			  ' . $this->htmlAktionHomepage() . '			  
			  		            
			  ' . $this->htmlBody() . '
			  
			</html>';
	}

	/**
	 * @return string
	 */
	abstract protected function htmlPageTitle();

	/**
	 * @return string|null
	 */
	abstract protected function htmlBody();

    protected function htmlAktionHomepage()
    {
        $query = http_build_query(array(
            Name::Task => Task::ShowTodoList
        ));

        $result = '<a href="/?' . $query . '">Todo-Liste</a>';
        return $result;
    }
}
