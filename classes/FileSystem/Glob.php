<?php

class Glob {

	private $files;

	public function search($query="*"){
		$this->files = $this->rGlob($query);
		return $this;
	}

	private function rglob($glob){
		$files = glob($glob);
		foreach (glob(dirname($glob).'/*') as $dir) {
			//execute rglob again to search subdirectories
			$searchAgain = $this->rglob($dir.'/'.basename($glob));
			$files = array_merge($files, $searchAgain);
		}
		return $files;
	}

	public function get(){
		return $this->files;
	}

	public function first(){
		if (count($this->files)){
			return $this->files[0];
		};
	}



}