<?php 
namespace Libs\MyClass;
/**
* Auth CLASS
* @author AlekPr
*/
class AUTH {
	protected $username;
	protected $password;
	private $class;
	public function __construct($username,$password,$class){
		$this->username = $username;
		$this->password = $password;
	}
	public function IsValid(){
		if($this->username == WEBSERVICE_USER && $this->password == WEBSERVICE_KEY){
			return true;
		}else{
			return false;
		}
	}
	public function __destruct() {
	}
}