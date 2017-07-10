<?php

namespace Example;

interface ICRUD {
	
	public function select();
	public function insert($value);
	public function update($value);
	public function delete($value);
	
}
