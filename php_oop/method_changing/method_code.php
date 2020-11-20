<?php

	class method{
		public $m = 0;
		public $n = 0;
		public $result;
		public function value($x,$y){
			$this->m = $x;
			$this->n = $y;
			return $this;
		}
		public function calculation(){
			$this->result = $this->m * $this->n;
			echo "Your result is : ".$this->result;
		}
	}


?>