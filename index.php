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
	if($pesan_datang=='testboy')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
array (
  'type' => 'bubble',
  'hero' => 
  array (
    'type' => 'image',
    'url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png',
    'size' => 'full',
    'aspectRatio' => '20:13',
    'aspectMode' => 'cover',
    'action' => 
    array (
      'type' => 'uri',
      'uri' => 'http://linecorp.com/',
    ),
  ),
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Brown Cafe',
        'weight' => 'bold',
        'size' => 'xl',
      ),
      1 => 
      array (
        'type' => 'box',
        'layout' => 'baseline',
        'margin' => 'md',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'icon',
            'size' => 'sm',
            'url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png',
          ),
          1 => 
          array (
            'type' => 'icon',
            'size' => 'sm',
            'url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png',
          ),
          2 => 
          array (
            'type' => 'icon',
            'size' => 'sm',
            'url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png',
          ),
          3 => 
          array (
            'type' => 'icon',
            'size' => 'sm',
            'url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png',
          ),
          4 => 
          array (
            'type' => 'icon',
            'size' => 'sm',
            'url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gray_star_28.png',
          ),
          5 => 
          array (
            'type' => 'text',
            'text' => '4.0',
            'size' => 'sm',
            'color' => '#999999',
            'margin' => 'md',
            'flex' => 0,
          ),
        ),
      ),
      2 => 
      array (
        'type' => 'box',
        'layout' => 'vertical',
        'margin' => 'lg',
        'spacing' => 'sm',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'box',
            'layout' => 'baseline',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'text' => 'Place',
                'color' => '#aaaaaa',
                'size' => 'sm',
                'flex' => 1,
              ),
              1 => 
              array (
                'type' => 'text',
                'text' => 'Miraina Tower, 4-1-6 Shinjuku, Tokyo',
                'wrap' => true,
                'color' => '#666666',
                'size' => 'sm',
                'flex' => 5,
              ),
            ),
          ),
          1 => 
          array (
            'type' => 'box',
            'layout' => 'baseline',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'text' => 'Time',
                'color' => '#aaaaaa',
                'size' => 'sm',
                'flex' => 1,
              ),
              1 => 
              array (
                'type' => 'text',
                'text' => '10:00 - 23:00',
                'wrap' => true,
                'color' => '#666666',
                'size' => 'sm',
                'flex' => 5,
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'spacing' => 'sm',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'style' => 'link',
        'height' => 'sm',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'CALL',
          'uri' => 'https://linecorp.com',
        ),
      ),
      1 => 
      array (
        'type' => 'button',
        'style' => 'link',
        'height' => 'sm',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'WEBSITE',
          'uri' => 'https://linecorp.com',
        ),
      ),
      2 => 
      array (
        'type' => 'spacer',
        'size' => 'sm',
      ),
    ),
    'flex' => 0,
  ),
)
									)
							)
						);
				
	}

}
 
$result =  json_decode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);

?>
