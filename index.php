<?php

require_once('./line_class.php');

$channelAccessToken = 'W87tpLbjGorG1Oinv3DWM8XdNriJ2NsCmnos6VaI6D5obHTIM6NkC/UUMN24XdpAduwc5YDuFV45gQqRxVt3Ibu1O4CgRbCNJU+lru5RumhP0vYeFMgtycbiNOz3gQGwsNgGjXloAaqV1rj5S4ma0QdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '941b173d5a8b59b29b2bc1d00657f826';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$groupId 	= $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$type 		= $client->parseEvents()[0]['type'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$pesan_datang = strtolower($message['text']);
$profil = $client->profil($userId);
$textsplit = explode("|", $message['text']);
$command = $textsplit[0];
$options = $textsplit[1];
if (count($textsplit) > 2) {
    for ($i = 2; $i < count($textsplit); $i++) {
        $options .= '+';
        $options .= $textsplit[$i];
    }
}
//pesan bergambar
function cuaca($keyword) {
    $uri = "http://api.openweathermap.org/data/2.5/weather?q=" . $keyword . ",ID&units=metric&appid=e172c2f3a3c620591582ab5242e0e6c4";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $resultcuaca = "Halo Kak ^_^ Ini ada Ramalan Cuaca Untuk Daerah ";
    $resultcuaca .= $json['name'];
    $resultcuaca .= " Dan Sekitarnya";
    $resultcuaca .= "\n\nCuaca : ";
    $resultcuaca .= $json['weather']['0']['main'];
    $resultcuaca .= "\nDeskripsi : ";
    $resultcuaca .= $json['weather']['0']['description'];
    return $resultcuaca;
}
if($type=='join')
{
    $textjoin = "Terima kasih telah mengundang saya ke grup!\nKetik '/menu' untuk lihat command!";
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
	if($pesan_datang=='admin')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'Ini Admin',
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
        'thumbnailImageUrl' => 'https://pm1.narvii.com/6448/76156a7706585cb6b463531e9aa42cdc7f6180fe_hq.jpg',
        'title' => 'Admin',
        'text' => 'Ini Adalah Kontak Admin',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Admin 1',
            'uri' => 'https://bit.ly/2J3ywc3',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Admin 2',
            'uri' => 'https://bit.ly/2J3ywc3',
          ),
        ),
      ),
    ),
  ),
)
							)
						);
				
	}
	if($pesan_datang=='bosen hidup?')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'Buka...',
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
	if($pesan_datang=='me')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'text',
  'text' => $profil->displayName
)
							)
						);
				
	}
	if($command=='checkcuaca')
	{
		
		$resultcuaca = cuaca($options);
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $resultcuaca
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
	if($pesan_datang=='profile')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'Ini Profile',
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
        'thumbnailImageUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-RiTL3rmVfnXoWo5im1Ma8kWvazETI87xAiRXSz9ZjRIgC0yF',
        'text' => 'Settings :',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Camera',
            'uri' => 'line://nv/camera',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Profile',
            'uri' => 'line://nv/profile',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'Timeline',
            'uri' => 'line://nv/timeline',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-RiTL3rmVfnXoWo5im1Ma8kWvazETI87xAiRXSz9ZjRIgC0yF',
        'text' => 'Settings :',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Pengaturan',
            'uri' => 'line://nv/setting',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Check Device',
            'uri' => 'line://nv/connectedDevice',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'Bonus +',
            'uri' => 'https://pbs.twimg.com/profile_images/946287919869829120/smZ-09vH_400x400.jpg',
          ),
        ),
      ),
    ),
  ),
)
							)
						);
				
	}
	if($pesan_datang=='menu1')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'Ini Menu',
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
        'thumbnailImageUrl' => 'https://wallpaper.wiki/wp-content/uploads/2017/05/wallpaper.wiki-Cute-Anime-Couple-HD-Picture-PIC-WPE0010856.jpg',
        'title' => '[DK] BOT',
        'text' => '[DK] BOT For You',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Welcome',
            'text' => 'Welcome',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Owner Grup',
            'text' => 'Admin',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'Profile',
            'text' => 'Profile',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://wallpaper.wiki/wp-content/uploads/2017/05/wallpaper.wiki-Cute-Anime-Couple-HD-Picture-PIC-WPE0010856.jpg',
        'title' => 'Ini Sebuah Menu',
        'text' => 'Tinggal Klik Saja!',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Pengaturan',
            'uri' => 'line://nv/setting',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Check Device',
            'uri' => 'line://nv/connectedDevice',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'Bonus +',
            'uri' => 'https://pbs.twimg.com/profile_images/946287919869829120/smZ-09vH_400x400.jpg',
          ),
        ),
      ),
    ),
  ),
)
							)
						);
				
	}
	if($pesan_datang=='menu2')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'Ini Menu',
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
        'thumbnailImageUrl' => 'https://www.geek.com/wp-content/uploads/2017/02/sailormoon1-625x352.jpg',
        'title' => 'Ini Sebuah Menu',
        'text' => 'Tinggal Klik Saja!',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Camera',
            'uri' => 'line://nv/camera',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Profile',
            'uri' => 'line://nv/profile',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'Timeline',
            'uri' => 'line://nv/timeline',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://www.geek.com/wp-content/uploads/2017/02/sailormoon1-625x352.jpg',
        'title' => 'Ini Sebuah Menu',
        'text' => 'Tinggal Klik Saja!',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Pengaturan',
            'uri' => 'line://nv/setting',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Check Device',
            'uri' => 'line://nv/connectedDevice',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'Bonus +',
            'uri' => 'https://pbs.twimg.com/profile_images/946287919869829120/smZ-09vH_400x400.jpg',
          ),
        ),
      ),
    ),
  ),
)
							)
						);
				
	}
	if($pesan_datang=='menu3')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'Ini Menu',
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
        'thumbnailImageUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEHjyJgKPMf1EjKpNxboSdNN10Qs0AijIuH1gMP1CKusXSiDVUog',
        'title' => 'Ini Sebuah Menu',
        'text' => 'Tinggal Klik Saja!',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Camera',
            'uri' => 'line://nv/camera',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Profile',
            'uri' => 'line://nv/profile',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'Timeline',
            'uri' => 'line://nv/timeline',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEHjyJgKPMf1EjKpNxboSdNN10Qs0AijIuH1gMP1CKusXSiDVUog',
        'title' => 'Ini Sebuah Menu',
        'text' => 'Tinggal Klik Saja!',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Pengaturan',
            'uri' => 'line://nv/setting',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'Check Device',
            'uri' => 'line://nv/connectedDevice',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'Bonus +',
            'uri' => 'https://pbs.twimg.com/profile_images/946287919869829120/smZ-09vH_400x400.jpg',
          ),
        ),
      ),
    ),
  ),
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
	if($pesan_datang=='ea')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'video',
  'originalContentUrl' => 'https://stickershop.line-scdn.net/stickershop/v1/product/9409/IOS/main_animation@2x.png;compress=true',
  'previewImageUrl' => 'https://stickershop.line-scdn.net/stickershop/v1/product/9409/IOS/main_animation@2x.png;compress=true',
)
							)
						);
				
	}
	if($pesan_datang=='/menu')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'Ini Daftar Menu',
  'template' => 
  array (
    'type' => 'buttons',
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'message',
        'label' => 'Menu 1',
        'text' => 'Menu1',
      ),
      1 => 
      array (
        'type' => 'message',
        'label' => 'Menu 2',
        'text' => 'Menu2',
      ),
      2 => 
      array (
        'type' => 'message',
        'label' => 'Menu 3',
        'text' => 'Menu3',
      ),
      3 => 
      array (
        'type' => 'message',
        'label' => 'Admin',
        'text' => 'Admin',
      ),
    ),
    'thumbnailImageUrl' => 'https://img.monocle.com/radio/shows/the-menu-final-5718a9900140e.jpg?w=440&h=440',
    'title' => 'Ini Sebuah Menu',
    'text' => 'Gunakan Dengan Baik dan Benar',
  ),
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

>admin
>setting

[ Sticker IMG ]

>serius
>ea

[ Funchat Response ]

>bosen hidup?
>udah mandi?',
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
