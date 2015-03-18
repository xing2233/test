<?php
class rpcclient {
	private $url;

	public function __construct($url = '') {
		$this->url = $url;
	}

	private function query($request){
		$content = stream_context_create(array('http' => array(
			'method' => 'POST',
			'header' => 'Content-Type:text/xml',
			'content' => $request
		)));

		$xml = file_get_contents($this->url, false, $content);
		return xmlrpc_decode($xml);
	}

	public function __call($method, $args) {
		$request = xmlrpc_encode_request($method, $args);
		return $this->query($request);
	}
}

$rpc = new rpcclient('http://test.dog.dev/xmlrpc/xmlrpc.php');
var_dump($rpc->hello());
var_dump($rpc->sum(4,5,6));