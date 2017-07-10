<?php

namespace Example;

class REST {
	
	public function __construct($method, $object)
	{
		if($object instanceof ICRUD)
		{
			$this->{$method}($object);	
		}
		else
		{
			throw new \Exception('Not implemented from ICRUD');
		}
	}
	
	private function get($object)
	{
		$data_json = $object->select();		
		header('Content-Type: application/json');
		file_put_contents('php://output', json_encode($data_json));
	}
	
	private function post($object)
	{
		$data_json = json_decode(file_get_contents('php://input'));
		$data_json->{'id'} = $object->insert($data_json);
		file_put_contents('php://output', json_encode($data_json));
	}
	
	private function put($object)
	{
		$data_json = json_decode(file_get_contents('php://input'));
		$object->update($data_json);
	}
	
	private function delete($object)
	{
		$id = end(explode('/', $_SERVER['REQUEST_URI']));
		$object->delete($id);
	}
	
}
