<?php
namespace Libs\MyClass;
/**
* BaseSoap CLASS
* @author AlekPr
*/
class BaseSoap 
{
	protected $Username;
	protected $Authenticated = false;
	public function __construct()
	{
		//not thing
	}
	/**
     * Authentication function
     * This is called by the Soap header of the same name. The function name is a Ws-security standard auth tag
     * and corresponds to the header tag.
     *
     * @param string username
     * @param string key
     */
    public function Authentication( $username, $keyparse ){
        // Store username for logging
        $this->Username = $username;
        $auth = new Auth( $username, $keyparse, get_class($this) );
        if( $auth->IsValid() ){
            $this->Authenticated = true;
        } else {
            $this->Authenticated = false;
        }
    }
	public function __destruct(){
		//not thing
	}
}