<?php

require_once('./line_class.php');

$channelAccessToken = '0MZ23nJcb0Rtcn4jkjdm/RjNS07Dx7zj34q2SE84mlbZbrtoGunYlxb6jDIvcYisd+gyBuzGROVx0JGTPoi3DWCQHbm8YJ5aycbWf4gAL7RGx+/b/J2Kkb75Vh7Qo2NmGwi3MDQzUYPAFmbocQypWAdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '4350db3555e5530136cd07b53fa4091a';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$type 		= $client->parseEvents()[0]['type'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];
//pesan bergambar

if($type=='join')
{
    $textjoin = "Terima kasih telah mengundang saya ke grup!\nKetik 'key' untuk lihat command!";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $textjoin
            )
        )
    );
}
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
	if($pesan_datang=='bunuhdiri')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'this is a confirm template',
  'template' => 
  array (
    'type' => 'confirm',
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'message',
        'label' => 'Yes',
        'text' => 'Nah akhirnya gua mati juga!',
      ),
      1 => 
      array (
        'type' => 'message',
        'label' => 'No',
        'text' => 'Yah kenapa gua nolak anjir.. Aturan mati bae!',
      ),
    ),
    'text' => 'Mau mati sekarang?',
  ),
)
							)
						);
				
	}
	if($pesan_datang=='naga')
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
        'thumbnailImageUrl' => 'https://u1.photofunia.com/1/results/Q/T/QT37jGdlWmuQNG0QY6aPww_r.jpg',
        'text' => 'Naga Up Chat 1',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'Sticker 1',
            'text' => 'Sticker 1',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'Sticker 2',
            'text' => 'Sticker 2',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://u1.photofunia.com/1/results/Q/T/QT37jGdlWmuQNG0QY6aPww_r.jpg',
        'text' => 'Naga Up Chat 2',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'Sticker 3',
            'text' => 'Sticker 3',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'Sticker 4',
            'text' => 'Sticker 4',
          ),
        ),
      ),
      2 => 
      array (
        'thumbnailImageUrl' => 'https://u1.photofunia.com/1/results/Q/T/QT37jGdlWmuQNG0QY6aPww_r.jpg',
        'text' => 'Naga Up Chat 3',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'Sticker 5',
            'text' => 'Sticker 5',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'Sticker 6',
            'text' => 'Sticker 6',
          ),
        ),
      ),
      3 => 
      array (
        'thumbnailImageUrl' => 'https://u1.photofunia.com/1/results/Q/T/QT37jGdlWmuQNG0QY6aPww_r.jpg',
        'text' => 'Naga Up Chat 4',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'Sticker 7',
            'text' => 'Sticker 7',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'Sticker 8',
            'text' => 'Sticker 8',
          ),
        ),
      ),
    ),
  ),
)
							)
						);
				
	}
	if($pesan_datang=='help')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'audio',
  'originalContentUrl' => 'https://vocaroo.com/media_command.php?media=s1EnBlvWWa6H&command=download_mp3',
  'duration' => 4000,
)
							)
						);
				
	}
	if($pesan_datang=='serius')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'image',
  'originalContentUrl' => 'https://stickershop.line-scdn.net/stickershop/v1/product/9528/LINEStorePC/main@2x.png;compress=true',
  'previewImageUrl' => 'https://stickershop.line-scdn.net/stickershop/v1/product/9528/LINEStorePC/main@2x.png;compress=true',
  'animated' => true,
)
							)
						);
				
	}
	if($pesan_datang=='key')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'text',
  'text' => '[ Menu Command ]

>help
>hi

[ Sticker IMG ]

>serius

[ Funchat Response ]

>bunuhdiri',
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
