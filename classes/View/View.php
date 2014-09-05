<?php

class View {

	private $templatePath;
	private $renderedTemplate;
	private $variables;

	public function __construct($template){
		$this->templatePath = $this->findTemplate($template);
	}

	private function findTemplate($template){
		$glob = new Glob;
		return $glob->search($template.'.html')->first();
	}

	private function loadContent(){
		return file_get_contents($this->templatePath);
	}

	public function render($variables = array()){
		$this->variables = $variables;//store variables as member;
		$this->renderedTemplate = $this->loadContent();
		$this->addVariables();
		$this->addIncludes();
		return $this->renderedTemplate;
	}

	public function addVariables(){
		foreach ($this->variables as $key => $value) {
			$this->renderedTemplate = str_replace('$'.$key, $value , $this->renderedTemplate);
		}
		return $this;
	}

	public function addIncludes(){

		$overflow = 0;

		while (preg_match('/<% include ([a-zA-Z0-9_]+) %>/i', $this->renderedTemplate, $includes)) {

			$match = $includes[0];
			$template = $includes[1];

			$templatePath = $this->findTemplate($template);

			if ($templatePath) {
				$view = new View($template);
				$include = $view->render($this->variables);
				$this->renderedTemplate = str_replace($match, $include, $this->renderedTemplate);
			} else {
				echo "Template not found!";
				die;
			}

			$overflow++;
			if ($overflow > 2000) break;
		};

		return $this;
	}

}
