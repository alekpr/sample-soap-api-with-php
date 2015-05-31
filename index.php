<?php
require_once 'init.php';
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server as SoapServer;


// Helloworld class used defined web service method
// Remark : "Zend\Soap\AutoDiscover" use function description , @param and @return to generate WSDL. 
class Helloworld 
{
	public function __construct()
	{
	}
	/**
   	* SayHello Function
	* Use test soap service
	* @param string $name
	* @return string Hello ,$name
  	*/
	public function SayHello($name){
		return "Hello, ".$name;
	}
}


//Use slim group route to defined web service version
$app->group("/v1",function() use ($app){

	// wsdl route - Use "Zend\Soap\AutoDiscover" class to auto generate WSDL detail for your web service
	$app->get("/wsdl",function() use ($app){
		$autodiscover = new AutoDiscover();
    	$autodiscover 	->setClass('Helloworld')
						->setServiceName('MyServices')
                    	->setUri(WEBSERVICE_URL);
    	$response = $app->response();
		$response->header('Content-type', 'Content-type: application/xml');
    	echo $autodiscover->toXml();
	});

	//URL Endpoint of your web service
	$app->post("/",function() use ($app){
		$options = array('uri' =>WEBSERVICE_URL,'location' => WEBSERVICE_URL);
		$server = new SoapServer(WEBSERVICE_URL."/wsdl",$options);
		$server->setClass("Helloworld");
		$server->handle();
	});
});

$app->run();
