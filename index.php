<?php
$soap = new SoapClient('http://test.dog.dev/wsdl.xml', array('trace' => true));
var_dump($soap->test('10086'));

