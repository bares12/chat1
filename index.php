<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = '0MZ23nJcb0Rtcn4jkjdm/RjNS07Dx7zj34q2SE84mlbZbrtoGunYlxb6jDIvcYisd+gyBuzGROVx0JGTPoi3DWCQHbm8YJ5aycbWf4gAL7RGx+/b/J2Kkb75Vh7Qo2NmGwi3MDQzUYPAFmbocQypWAdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '4350db3555e5530136cd07b53fa4091a';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];
//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='hi')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
    'type' => 'carousel',
    'actions' => 
    array (
    ),
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://u1.photofunia.com/1/results/a/U/aUVFabImIWVMqVCrLtkaAQ_r.jpg',
        'title' => 'Admin',
        'text' => 'Creator : Renn',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Admin 1',
            'uri' => 'https://goo.gl/KL5D5y',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Admin 2',
            'uri' => 'http://line.me/ti/p/~pashmt',
          ),
        ),
      ),
    ),
  ),
)
							)
						);
				
	}
}
 
$result =  json_encode($balas);
//$result = ob_get_clean();
file_put_contents('./balasan.json',$result);
$client->replyMessage($balas);

?>
