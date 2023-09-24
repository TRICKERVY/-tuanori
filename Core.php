<?php
// server should keep session data for AT LEAST 1 day
ini_set('session.gc_maxlifetime', 86400);
// each client should remember their session id for EXACTLY 1 day
session_set_cookie_params(86400);
session_start();
error_reporting(1);
date_default_timezone_set('Asia/Ho_Chi_Minh');

require $_SERVER['DOCUMENT_ROOT'].'/config.php'; // website config 
require $_SERVER['DOCUMENT_ROOT'].'/lib/phpmailer.php'; // mail

$root = $_SERVER['DOCUMENT_ROOT'];

class System {


    /***  Hàm gọi tự động các hàm khác  ***/
    public function __construct() {
        $this->connect_db();
        $this->access_url();
        $this->check_token_user();
    }


    /***   Kết Nối Database   ***/
   public function connect_db() {
        global $config;
    $conn = mysqli_connect(
        $config['LOCALHOST'],
        $config['USERNAME'],
        $config['PASSWORD'],
        $config['DATABASE']
    ) or die(include('view/error/connect_data.html'));
    $conn->set_charset("utf8");
    return $conn;
    }

    public function access_url() {
        global $root;
        $user = $this->user();
            if($user['username']) {
                $visitor = $user['username'];
            }else {
                $visitor = 'Khách (Chưa Login)';
            }
     
            $cmd = "INSERT INTO log_access (username,level, url,spam,ip, time) VALUES ('".$visitor."', '".$user['level']."', '".$_SERVER['REQUEST_URI']."', 'false', '".$_SERVER['REMOTE_ADDR']."', '".time()."')";
           $res =  mysqli_query($this->connect_db(), $cmd);
           
        //   $result = mysqli_query($this->connect_db(), "SELECT * FROM `log_access` WHERE `username` = '$visitor' AND `time` < DATE(NOW()) + INTERVAL 300 SECOND ");
          
        // $row = mysqli_num_rows($result);
        // if($row > 5) {
        //     $this->band('Spam','Cố tình spam reload requests url');
        // }
          if(!$res) {
              $this->insert_error('system','Lỗi hệ thống','Hệ thống không thể chạy modun ghi lịch sử truy vấn.');
          }
        }        
    

  public function check_token_user() {
     if($_SESSION['token']) {
   $token = $_SESSION['token'];
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `token`='".$token."'");
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
         if(!$row['username']) {
    session_destroy();

header('Location: /error/801 ');
}
 }
}
  public function insert_error($agent,$action,$error) {
$cmd = "INSERT INTO log_error (agent, action,error,url,ip, time) VALUES ('".$agent."', '".$action."','".$error."', '".$_SERVER['REQUEST_URI']."', '".$_SERVER['REMOTE_ADDR']."', '".time()."')";
           $res = mysqli_query($this->connect_db(), $cmd);
          
  }
  
  
  public function band($action,$info) {
   $cmd = "INSERT INTO bands (username, action,info,ip, time) VALUES ('".$user['username']."', '".$action."','".$info."', '".$_SERVER['REMOTE_ADDR']."', '".time()."')";
           $res = mysqli_query($this->connect_db(), $cmd);
      
      $res = mysqli_query($this->connect_db(), "UPDATE users SET  band = 'true' WHERE `username`='".$user['username']."'");  
          session_destroy();

header('Location: /error/951 ');
  }


    /***   Lấy Url Website   ***/
    public function home_url() {

        if ( isset($_SERVER['HTTPS']) ) {
            if ( 'on' == strtolower($_SERVER['HTTPS']) )
                $tcp = 'https';
            if ( '1' == $_SERVER['HTTPS'] )
                $tcp = 'https';
        } elseif ( isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
                $tcp = 'https';
        }else {
                $tcp = 'http';
        }

    	# Using HTTP_HOST
	   $domain = $tcp.'://'.$_SERVER['HTTP_HOST'];
	   return $domain;
    }

    /***   Lấy thông tin admin cài đặt   ***/
    public function settings($option) {
        $_logo = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_logo'"));
        $_banner = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_banner'"));
        $_banner2 = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings2` WHERE `key`='web_banner'"));
        $_title = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_title'"));
        $_admin = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_admin'"));
        $_color = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_color'"));
        $_thongbao = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_thongbao'"));
        $_napthe = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_napthe'"));
        $_web_brick = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_brick'"));
         $_tb = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='thongbao'"));
         $_gift = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_gift'"));

        switch ($option) {
            case 'logo':
                return json_decode($_logo['value'], true);
                break;
            case 'banner':
                return json_decode($_banner['value'], true);
                break;
             case 'banner2':
                return json_decode($_banner2['value'], true);
                break;
            case 'title':
                return json_decode($_title['value'], true);
                break;
            case 'admin':
                return json_decode($_admin['value'], true);
                break;
            case 'color':
                return json_decode($_color['value'], true);
                break;
            case 'thongbao':
                return $_thongbao['value'];
                break;
            case 'napthe':
                return json_decode($_napthe['value'], true);
                break;
            case 'brick':
                return json_decode($_web_brick['value'], true);
                break;
            case 'tb':
                return $_tb['value'];
                break;
            case 'gift':
                return json_decode($_gift['value'], true);
                break;
            default:
                # code...
                break;
        }


    }

function cardvip($loaithe, $pin, $seri, $menhgia, $code)
{
  
   
$dataPost = array(
    'APIKey' => '45a5e063-5103-4d4d-8db7-d6aa6b4a25f7',
    'NetworkCode' => $loaithe,
    'PricesExchange' => $menhgia,
    'NumberCard' => $pin,
    'SeriCard' => $seri,
    'IsFast' => true,
    'RequestId' => $code,
    'UrlCallback' => 'https://shophungtuan.com/huyplay/callback/auto-card'
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.cardvip.vn/api/createExchange',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($dataPost),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return json_decode($response, true);

}



function tsr($loaithe, $pin, $seri, $menhgia, $code)
{
        $command = 'charging';  // Nap the
        $url = 'https://thesieure.com/chargingws/v2';
        $partner_id = '0588141361';
        $partner_key = '4ba452c100eac3405ef5a2a162fe264f';

        $dataPost = array();
        $dataPost['request_id'] = $code;
        $dataPost['code'] = $pin;
        $dataPost['partner_id'] = $partner_id;
        $dataPost['serial'] = $seri;
        $dataPost['telco'] = $loaithe;
        $dataPost['command'] = $command;
        ksort($dataPost);
        $sign = $partner_key;
        foreach ($dataPost as $item) {
            $sign .= $item;
        }
        
        $mysign = md5($sign);

        $dataPost['amount'] = $menhgia;
        $dataPost['sign'] = $mysign;

        $data = http_build_query($dataPost);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        curl_setopt($ch, CURLOPT_REFERER, $actual_link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

     return json_decode($result, true);

    }
    
    function gt1s($loaithe, $pin, $seri, $menhgia, $code)
{
        $command = 'charging';  // Nap the
        $url = 'https://gachthe1s.com/chargingws/v2';
        $partner_id = '6118355461';
        $partner_key = '6ae0777e1457f81737253823f6f0defe';

        $dataPost = array();
        $dataPost['request_id'] = $code;
        $dataPost['code'] = $pin;
        $dataPost['partner_id'] = $partner_id;
        $dataPost['serial'] = $seri;
        $dataPost['telco'] = $loaithe;
        $dataPost['command'] = $command;
       

        $dataPost['amount'] = $menhgia;
        $dataPost['sign'] = md5($partner_key+$pin+$seri);

        $data = http_build_query($dataPost);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        curl_setopt($ch, CURLOPT_REFERER, $actual_link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

     return json_decode($result, true);

    }
    
function naptudong($loaithe, $pin, $seri, $menhgia, $code)
{
        $command = 'charging';  // Nap the
        $url = 'http://api.naptudong.com/chargingws/v2';
        $partner_id = '0601968451';
        $partner_key = '6dd372151552c79c1fbabc49d02829f4';

        $dataPost = array();
        $dataPost['request_id'] = $code;
        $dataPost['code'] = $pin;
        $dataPost['partner_id'] = $partner_id;
        $dataPost['serial'] = $seri;
        $dataPost['telco'] = $loaithe;
        $dataPost['command'] = $command;
        ksort($dataPost);
        $sign = $partner_key;
        foreach ($dataPost as $item) {
            $sign .= $item;
        }
        
        $mysign = md5($sign);

        $dataPost['amount'] = $menhgia;
        $dataPost['sign'] = $mysign;

        $data = http_build_query($dataPost);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        curl_setopt($ch, CURLOPT_REFERER, $actual_link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return  json_decode($result);

    }
    
    

    /***   Anti SQL Injection - Chỉ nhận dạng Số   ***/
    public function anti_sql($number) {
$id = isset($number) ? (string)(int)$number : false;
$id = isset($number) ? $number : false;
$id = str_replace('/[^0-9]/', '', $id);
return $id;
    }
public function thecaore($type, $pin, $serial, $amount, $request_id, $ApiKey,$callback){
   
   
    $url = 'https://thecaore.vn/chargingws/v2?telco='.$type.'&code='.$pin.'&serial='.$serial.'&amount='.$amount.'&request_id='.$request_id.'&command=thecaonhanh&APIKey='.$ApiKey.'&callback='.$callback.'';
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
    
}



    /***   kiểm tra người dùng đăng nhập hay chưa   ***/
    public function check() {
        if(!$_SESSION['token']) {
             header('Location: /');
        }
    }

    public function login_required() {
        if(!$_SESSION['token']) {
               echo '<script>location.href="/login.html";</script>';
        }
    }

    /***   đếm tất cả người dùng hệ thống   ***/
    public function count_user() {
        $result = mysqli_query($this->connect_db(), "SELECT `id` FROM `users`");
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    /***   kiểm tra đăng nhập   ***/
    public function check_user($user, $pass) {

        $user = str_replace('"',"\"",$user);
        $user = str_replace("'","\'",$user);
        $pass = str_replace('"',"\"",$pass);
        $pass = str_replace("'","\'",$pass);

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user."' AND `password`='".md5($pass)."' ");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }


            /***   kiểm tra người dùng đã đăng nhập chưa - file nào ko muốn ai đó đã đăng nhập truy cập thì gọi vào    ***/
    public function check_login() {
        if($_SESSION['token']) {
            return header("Location: /");
        }
    }


    /***   kiểm tra người dùng đã có trên hệ thống chưa    ***/
   public function check_user_register($user) {

        $user = str_replace('"',"\"",$user);
        $user = str_replace("'","\'",$user);

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user."'");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }



    /***   kiểm tra đăng nhập bằng Facebook  ***/
   public function check_user_fb_register($idfb) {

        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `fbid`='".$idfb."'");
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0) {
            return true;
        }else {
            return false;
        }
        
    }



    public function is_admin() {
        $user = $this->user();
        $rule = $user['level'];
        if($rule == 'administrator') {    
            return true;
        }else {
            return false;
        }
    }

    /***   lấy thông tin người dùng đang đăng nhập   ***/
    public function user() {
        $token = $_SESSION['token'];
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `token`='".$token."'");
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row;
    }

    /***   lấy thông tin một người dùng khác    ***/
    public function user_orther($username) {
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `email`='".$username."'");
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row;
    }
    
    /***   Lấy thông tin người dùng qua mã token    ***/
    public function user_api($token) {
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `token`='".$token."'");
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row;
    }

    /***   kiểm tra token gửi lên website có hợp lệ hay không   ***/
   public function check_token_api($token) {
        $result = mysqli_query($this->connect_db(), "SELECT `token` FROM `users` WHERE `token`='".$token."'");
        $rowcount = mysqli_num_rows($result);
	
        if($rowcount > 0) {
            return true;
        }else {
        $result2 = mysqli_query($this->connect_db(), "SELECT `token` FROM `users` WHERE `auth`='".$token."'");
        $rowcount2 = mysqli_num_rows($result2);		
			if($rowcount2 > 0) {
				return true;
			}else {
            return false;
			}
        }
        
    }


    public function vongquaykimcuong_image($id, $type) {

        $path = $_SERVER["DOCUMENT_ROOT"]."/upload/vongquay/".$type;

                  if ($opendirectory = opendir($path)){
                    while (($file = readdir($opendirectory)) !== false){

                        if ($file != "." && $file != "..") {
                            $arr = explode(".", $file);
                            if($arr[0] == $id) {
                               return '/upload/vongquay/'.$type.'/'.$file;
                            }
                        }
                    }
                    closedir($opendirectory);
                  }

    }


    public function vongquaykimcuong_gift($id, $item, $type=null) {

       $res = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `vongquay_kimcuong_gift` WHERE `id_vongquay`='".$id."'"));
       $prefix = 'item_';
       $json = json_decode($res[$prefix.$item], true);

       if ($type == 'text')  {
            return $json['text'];
       }else if ($type == 'kimcuong') {
            return $json['kimcuong'];
       }else if ($type == 'tyle') {
            return $json['tyle'];
       }else {
            return $json;
       }

    }



    public function demhomthinhbian($type) {

        switch ($type) {
            case 'conlai':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `homthinhbian` WHERE `status`='1' AND `nguoimua`='null' ");
        $row = mysqli_num_rows($result);
                break;

            case 'daban':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `homthinhbian` WHERE `status`='0'");
        $row = mysqli_num_rows($result);
                break;
        }

        return $row;

    }


    // Phần Này Trong SETTING ADMIN 
    public function hienthi_game($type) {

        $row = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='hienthi_game'"));
        $json = json_decode($row['value'], true);

            return $json[$type];

    }

    public function hienthi_web($type) {

        $row = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='hienthi_web'"));
        $json = json_decode($row['value'], true);

            return $json[$type];

    }

    public function hinhanh_game($type) {

        $row = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='hinhanh_game'"));
        $json = json_decode($row['value'], true);

            return $json[$type];

    }

   public function web_thongbao($type) {

        $row = mysqli_fetch_assoc(mysqli_query($this->connect_db(), "SELECT * FROM `settings` WHERE `key`='web_thongbao'"));
        $json = json_decode($row['value'], true);

            return $json[$type];

    }




    public function count_acc_ff($type) {

        switch ($type) {
            case 'conlai':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nickff` WHERE `status`='true' AND `nguoimua`='null' ");
        $row = mysqli_num_rows($result);
                break;

            case 'daban':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nickff` WHERE `status`='false'");
        $row = mysqli_num_rows($result);
                break;
        }

        return $row;
  
    }


    public function count_acc_lq($type) {

        switch ($type) {
            case 'conlai':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nicklq` WHERE `status`='true' AND `nguoimua`='null' ");
        $row = mysqli_num_rows($result);
                break;

            case 'daban':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `nicklq` WHERE `status`='false'");
        $row = mysqli_num_rows($result);
                break;
        }

        return $row;
  
    }

  function get_thumb_freefire($id) {
        $index = glob($_SERVER["DOCUMENT_ROOT"]."/upload/nickff/thumb/".$id.".*");
        $_DOMAIN = "https://".$_SERVER["SERVER_NAME"]."/";
        if ($index) {
            $arr = explode("/", $index[0]);
            $last = array_pop($arr);
            return $_DOMAIN."upload/nickff/thumb/".$last;
        } else {
                return $_DOMAIN."upload/nickff/banner.jpg";
        }
        }
 
  function get_thumb_lienquan($id) {
        $index = glob($_SERVER["DOCUMENT_ROOT"]."/upload/lienquan/thumb/".$id.".*");
        $_DOMAIN = "https://".$_SERVER["SERVER_NAME"]."/";
        if ($index) {
            $arr = explode("/", $index[0]);
            $last = array_pop($arr);
            return $_DOMAIN."upload/lienquan/thumb/".$last;
        } else {
                return $_DOMAIN."upload/lienquan/banner.jpg";
        }
        }
 


        /***   thống kê các hoạt động ngày hôm nay    ***/
    public function thong_ke_today($type) {

      $hientai = time();
      $today = $this->time_today();

        switch ($type) {
            case 'user':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
        $row = mysqli_num_rows($result);
        return $row;
                break;


                case 'napthe':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `napthe` WHERE `time` > '".$today."' AND `time` < '".$hientai."' ");
        $row = mysqli_num_rows($result);
        return $row;
                break;

                case 'napthedung':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `napthe` WHERE `time` > '".$today."' AND `time` < '".$hientai."' AND `status`='1'");
        $row = mysqli_num_rows($result);
        return $row;
                break;


                case 'thunhaphomnay':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `napthe` WHERE `time` > '".$today."' AND `time` < '".$hientai."' AND `status`='1'");
            $total = 0;
        while ($row = mysqli_fetch_array($result)) {
            $total = $total + $row['amount'];
        }

        return $total;
                break;
            

            default:
                return 'ERORR!!!';
                break;
        }



    }



        /***   thống kê hệ thống    ***/
    public function thong_ke_he_thong($type) {


        switch ($type) {
            case 'user':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users`");
        $row = mysqli_num_rows($result);
        return $row;
                break;

                case 'napthe':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `napthe`");
        $row = mysqli_num_rows($result);
        return $row;
                break;

                case 'napthedung':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `napthe` WHERE `status`='1'");
        $row = mysqli_num_rows($result);
        return $row;
                break;


                case 'thunhap':
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `napthe` WHERE `status`='1'");
            $total = 0;
        while ($row = mysqli_fetch_array($result)) {
            $total = $total + $row['amount'];
        }

        return $total;
                break;
            
            default:
                return 'ERORR!!!';
                break;
        }
    }



    /***  chuyển đổi 0h:00 phút ngày hôm nay sang dạng timestamp    ***/
public function time_today() {

    $date = date('d-m-Y 00:00');
    $timestamp = strtotime($date);
    return $timestamp;

}


    /***   xác định mốc thời gian cho trước    ***/
public function time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'vừa xong'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'năm',
                30 * 24 * 60 * 60       =>  'tháng',
                24 * 60 * 60            =>  'ngày',
                60 * 60                 =>  'giờ',
                60                      =>  'phút',
                1                       =>  'giây'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? '' : '' ) . ' trước';
        }
    }
}





    /***   hàm phân trang khi gọi dữ kiệu config tại index  - Copy từ Hoàng Minh Thuận ***/
function phantrang($url, $start, $total, $kmess) {

    $out[] = '<nav aria-label="Page navigation example">
             <ul class="pagination pagination-primary  justify-content-center">';

    $neighbors = 2;

    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));

    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));

    $base_link = ' <li class="page-item"><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';

    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt;');

    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');

    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>.......</a></li>';

    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {

        $tmpStart = $start - $kmess * $nCont;

        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);

    }

    $out[] = '<li class="page-item active"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';

    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;

    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {

        $tmpStart = $start + $kmess * $nCont;

        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);

    }

    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>....</a></li>';

    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);

    if ($start + $kmess < $total) {

        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);

        $out[] = sprintf($base_link, $display_page, '&gt;&gt;');

    }

    $out[] = '</ul>
                            </nav>';

    return implode('', $out);

}



    /***   hàm phân trang khi gọi dữ kiệu config tại index  - Copy từ Hoàng Minh Thuận ***/
function phantrang_user($url, $start, $total, $kmess) {

    $out[] = '<nav><ul class="pagination justify-content-center">';

    $neighbors = 2;

    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));

    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));

    $base_link = ' <li class="page-item"><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '"> %s </a></li>
                        ';

    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<i class="fa fa-angle-double-left"></i>');

    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');

    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>.......</a></li>';

    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {

        $tmpStart = $start - $kmess * $nCont;

        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);

    }

    $out[] = '<li class="page-item"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';

    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;

    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {

        $tmpStart = $start + $kmess * $nCont;

        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);

    }

    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>....</a></li>';

    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);

    if ($start + $kmess < $total) {

        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);

        $out[] = sprintf($base_link, $display_page, '<i class="fa fa-angle-double-right"></i>');

    }

    $out[] = '</ul></nav>';

    return implode('', $out);

}


    /***   lấy url request hiện tại    ***/
    public function PageURL() {

        $pageURL = 'http';
        if ($_SERVER['HTTPS'] == 'on') {
        $pageURL .= 's';
        }

        $pageURL .= '://';
        if ($_SERVER['SERVER_PORT'] != '80') {
        $pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
        } else {
        $pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        }

        return $pageURL;
    }



    /***   thu gọn chuỗi    ***/
    public function cat_chuoi($string='',$size=100,$link='...') {
    	$string = strip_tags(trim($string));
    	$strlen = strlen($string);
    	$str = substr($string,$size,20);
    	$exp = explode(" ",$str);
    	$sum =  count($exp);
    	$yes= "";
    	for($i=0;$i<$sum;$i++)
    	{
    		if($yes==""){
    			$a = strlen($exp[$i]);
    			if($a==0){ $yes="no"; $a=0;}
    			if(($a>=1)&&($a<=12)){ $yes = "no"; $a;}
    			if($a>12){ $yes = "no"; $a=12;}
    		}
    	}
    	$sub = substr($string,0,$size+$a);
    	if($strlen-$size>0){ $sub.= $link;}
    	return $sub;
    }


    public function compact_number($num) {
    	$number = $num / 1000;
    	if($number <= 0) {
    		return 'Miễn Phí';
    	}else {
    		return $number.'k';
    	}

    }


        /***   rewrite text sang dạng url    ***/
    public function rewrite($text)
    {
    	$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
    	$text=str_replace(" ","-", $text);
        $text=str_replace("--","-", $text);
    	$text=str_replace("@","-",$text);
        $text=str_replace("/","-",$text);
    	$text=str_replace("\\","-",$text);
        $text=str_replace(":","",$text);
    	$text=str_replace("\"","",$text);
        $text=str_replace("'","",$text);
    	$text=str_replace("<","",$text);
        $text=str_replace(">","",$text);
    	$text=str_replace(",","",$text);
        $text=str_replace("?","",$text);
    	$text=str_replace(";","",$text);
        $text=str_replace(".","",$text);
    	$text=str_replace("[","",$text);
        $text=str_replace("]","",$text);
    	$text=str_replace("(","",$text);
        $text=str_replace(")","",$text);
    	$text=str_replace("́","", $text);
    	$text=str_replace("̀","", $text);
    	$text=str_replace("̃","", $text);
    	$text=str_replace("̣","", $text);
    	$text=str_replace("̉","", $text);
    	$text=str_replace("*","",$text);$text=str_replace("!","",$text);
    	$text=str_replace("$","-",$text);$text=str_replace("&","-and-",$text);
    	$text=str_replace("%","",$text);$text=str_replace("#","",$text);
    	$text=str_replace("^","",$text);$text=str_replace("=","",$text);
    	$text=str_replace("+","",$text);$text=str_replace("~","",$text);
    	$text=str_replace("`","",$text);$text=str_replace("--","-",$text);
    	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
    	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
    	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
    	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
    	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
    	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
    	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
    	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
    	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
    	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
    	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
    	$text = preg_replace("/(đ)/", 'd', $text);
    	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
    	$text = preg_replace("/(đ)/", 'd', $text);
    	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
    	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
    	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
    	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
    	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
    	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
    	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
    	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
    	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
    	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
    	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
    	$text = preg_replace("/(Đ)/", 'D', $text);
    	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
    	$text = preg_replace("/(Đ)/", 'D', $text);
    	$text=strtolower($text);
    	return $text;
    }


        /***   Chuyển chuỗi sang văn bản không có các kí tự    ***/
    public function antil_text($text)
    {
        $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
         //$text=str_replace(" ","-", $text);
        //$text=str_replace("--","-", $text);
        //$text=str_replace("@","-",$text);
        //$text=str_replace("/","-",$text);
        //$text=str_replace("\\","-",$text);
        $text=str_replace(":","",$text);
        $text=str_replace("\"","",$text);
        $text=str_replace("'","",$text);
        $text=str_replace("<","",$text);
        $text=str_replace(">","",$text);
        $text=str_replace(",","",$text);
        $text=str_replace("?","",$text);
        $text=str_replace(";","",$text);
        $text=str_replace(".","",$text);
        $text=str_replace("[","",$text);
        $text=str_replace("]","",$text);
        $text=str_replace("(","",$text);
        $text=str_replace(")","",$text);
        $text=str_replace("́","", $text);
        $text=str_replace("̀","", $text);
        $text=str_replace("̃","", $text);
        $text=str_replace("̣","", $text);
        $text=str_replace("̉","", $text);
        $text=str_replace("*","",$text);
        $text=str_replace("!","",$text);
        //$text=str_replace("$","-",$text);
        //$text=str_replace("&","-and-",$text);
        $text=str_replace("%","",$text);
        $text=str_replace("#","",$text);
        $text=str_replace("^","",$text);
        $text=str_replace("=","",$text);
        $text=str_replace("+","",$text);
        $text=str_replace("~","",$text);
        $text=str_replace("`","",$text);
        //$text=str_replace("--","-",$text);
        $text=strtolower($text);
        return $text;
    }


    public function dectect_tiengviet($string) {
        $tiengviet = array(
            'à','á','ạ','ả','ã','â','ầ','ấ','ậ','ẩ','ẫ','ă','ằ','ắ','ặ','ẳ','ẵ',
            'À','Á','Ạ','Ả','Ã','Â','Ầ','Ấ','Ậ','Ẩ','Ẫ','Ă','Ằ','Ắ','Ặ','Ẳ','Ẵ',
            'è','é','ẹ','ẻ','ẽ','ê','ề','ế','ệ','ể','ễ',
            'È','É','Ẹ','Ẻ','Ẽ','Ê','Ề','Ế','Ệ','Ể','Ễ',
            'đ',
            'Đ',
            'ò','ó','ọ','ỏ','õ','ô','ồ','ố','ộ','ổ','ỗ','ơ','ờ','ớ','ợ','ở','ỡ',
            'Ò','Ó','Ọ','Ỏ','Õ','Ô','Ồ','Ố','Ộ','Ổ','Ỗ','Ơ','Ờ','Ớ','Ợ','Ở','Ỡ',
            'ì','í','ị','ỉ','ĩ','Ì','Í','Ị','Ỉ','Ĩ',
            'ù','ú','ụ','ủ','ũ','ư','ừ','ứ','ự','ử','ữ',
            'Ù','Ú','Ụ','Ủ','Ũ','Ư','Ừ','Ứ','Ự','Ử','Ữ',
            'ỳ','ý','ỵ','ỷ','ỹ',
            'Ỳ','Ý','Ỵ','Ỷ','Ỹ'
        );

        foreach ($tiengviet as $key) {
            if($this->tim_chuoi($string,$key) == true) {
                return true;
            }else {
                return false;
            }
        }
    }


    public function compact_string($string, $length=5, $replace) {
        $compact = substr($string,  0, $length );
        $compact = $compact.$replace;
        return $compact;
    }
 


        /***   kiểm ra chuỗi con có trong chuỗi mẹ hay không    ***/
    public function tim_chuoi($str, $chuoi) {

     if (strpos($str, $chuoi) !== false) {
     return true;
    }else {
     return false;
    }

    }
   public  function check_int_positive($i)
    {

     if(preg_match('/^\d+$/',$i)) 
     {
      return true;
    } else 
       {
      return false;
      }

       }

        /***  kiểm tra chuỗi có phải dạng số hay không    ***/
    public function check_int($data) {
        if (is_int($data) === true) return true;
        if (is_string($data) === true && is_numeric($data) === true) {
            return (strpos($data, '.') === false);
        }
    }

        /***   mã hóa chuỗi utf-8 sang base64    ***/
    public function base64url_encode($plainText) {
    $base64 = base64_encode($plainText);
    $base64url = strtr($base64, '+/=', '-_,');
    return $base64url;
    }


        /***   giải mã chuỗi base64 sang utf-8     ***/
    public function base64url_decode($plainText) {
    $base64url = strtr($plainText, '-_,', '+/=');
    $base64 = base64_decode($base64url);
    return $base64;
    }



        /***  mã hóa và giải mã chuỗi gấp 5 lần    ***/
    public function ma_hoa($string, $type) {

    	switch ($type) {
    		case 'encode':
    		$out = $string;
    		$out1 .= base64_encode($out);
    		$out2 .= base64_encode($out1);
    		$out3 .= base64_encode($out2);
    		$out4 .= base64_encode($out3);
    		$output .= base64_encode($out4);

    				return $output;		
    			break;

    		case 'decode':
    		$out = $string;
    		$out1 .= base64_decode($out);
    		$out2 .= base64_decode($out1);
    		$out3 .= base64_decode($out2);
    		$out4 .= base64_decode($out3);
    		$output .= base64_decode($out4);

    				return $output;		
    			break;		
    		default:
    			return false;
    			break;
    	}

    }



        /***   xác định mốc thời gian từ dạng ngày tháng    ***/
    public function gio($gio){
    $time=time();
    $jun=round(($time-$gio)/60);
    if($jun<1){$jun='Vừa xong';}
    if($jun>=1 && $jun<60){$jun="$jun phút trước";}
    if($jun>=60 && $jun<1440){$jun=round($jun/60); $jun="$jun giờ trước";}
    if($jun>=1440){$jun=round($jun/60/24); $jun="$jun ngày trước";}
    return $jun;
    }


        /***   hàm Craw hoặc Post dữ liệu sử dụng CUrl   ***/
    public function curl($url, $data) {

        $ch = @curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, '');
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        if($data) {
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $page = curl_exec($ch);
        curl_close($ch);
        return $page;

    }



        /***   kiểm tra thiết bị đang request có phải điện thoại hay không - copy từ mã nguồn wordpress   ***/
    public function is_mobile() {
        if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
            $is_mobile = false;
        } elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // many mobile devices (all iPhone, iPad, etc.)
            || strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
            || strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
            || strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
            || strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
            || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
            || strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
                $is_mobile = true;
        } else {
            $is_mobile = false;
        }

        return $is_mobile;
    }

          
          /***   rút gọn chuỗi    ***/
     public function cut_str($str, $max ) {
        $str = trim($str);
        if (strlen($str) > $max) {
            $s_pos = strpos($str, ' ');
            $cut = $s_pos === false || $s_pos > $max;
            $str = wordwrap($str, $max, ';;', $cut);
            $str = explode(';;', $str);
            $str = $str[0] . '...';
        }
        return $str;
    }
          
        /***   tạo ra chuỗi ngẫu nhiên gồm cả số và chữ (tạo token)    ***/
     public function Creat_Token($length){
        $token = openssl_random_pseudo_bytes($length);
        $token = bin2hex($token);
        return $token;

    }




} // End Class


