<?php
	/*** YOUR WEBSITE CONFIG ***/

$config = array(
    /*** Database Config ***/
'LOCALHOST' => 'localhost', // mysql host service
'USERNAME' => 'ggdmgprj_tuanori', // username
'PASSWORD' => 'ggdmgprj_tuanori', // password
'DATABASE' => 'ggdmgprj_tuanori', // database name

'facebook_app_id' => 'null',
'facebook_app_key' => 'null',
'home' => 'NULL', // url website có ssl và không có / ở cuối

    /*** Gạch Thẻ Config ***/   
'CALLBACK_URL' => 'http://'.$_SERVER['SERVER_NAME'].'/model/card_callback.php', // Không thay đổi
'version' => '7.3.0', // Phiên bản mã nguồn hiện tại
'author' => 'TUANORI',
'contact' => 'https://www.facebook.com/phamhoangtuan.ytb'
);
?>