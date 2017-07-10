<?php

namespace Example;

class User implements ICRUD {

	private $connection = null;
	
	public function __construct()
	{
		$this->connection = Connection::get_instance()->get_connection(
			Settings::$db_name, 
			Settings::$user_name, 
			Settings::$user_password
		);
	}
	
	public function __destruct()
	{
		$this->connection = null;
	}
	
	public function select()
	{
		foreach($this->connection->query('SELECT * FROM user') as $row)
		{
			$array[] = array(
				'id' => $row['id'],
				'firstName' => $row['first_name'],
				'secondName' => $row['second_name'],
				'eMail' => $row['e_mail'],
			);
		}
		return $array;
	}
	
	public function insert($data_json)
	{
		$query = $this->connection->prepare('INSERT INTO user VALUES(NULL, :first_name, :second_name, :e_mail)');
		$query->bindParam(':first_name', $data_json->{'firstName'}, \PDO::PARAM_STR);
		$query->bindParam(':second_name', $data_json->{'secondName'}, \PDO::PARAM_STR);
		$query->bindParam(':e_mail', $data_json->{'eMail'}, \PDO::PARAM_STR);
		$query->execute();
		return $this->connection->lastInsertId();
	}
	
	public function update($data_json)
	{
		$query = $this->connection->prepare('UPDATE user SET first_name = :first_name, second_name = :second_name, e_mail = :e_mail WHERE id = :id');
		$query->bindParam(':first_name', $data_json->{'firstName'}, \PDO::PARAM_STR);
		$query->bindParam(':second_name', $data_json->{'secondName'}, \PDO::PARAM_STR);
		$query->bindParam(':e_mail', $data_json->{'eMail'}, \PDO::PARAM_STR);
		$query->bindParam(':id', $data_json->{'id'}, \PDO::PARAM_STR);
		$query->execute();
	}
	
	public function delete($id)
	{
		$query = $this->connection->prepare('DELETE FROM user WHERE id = :id');
		$query->bindParam(':id', $id, \PDO::PARAM_STR);
		$query->execute();
	}
	
}
