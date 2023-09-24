<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';

$kun = new System;
$user = $kun->user();
$_get_settings = $kun->settings('napthe');

  $_get_brick = $kun->settings('brick');  


if (!$_SESSION['token']) {

    die(json_encode(array(
        'title' => 'Lỗi',
        'message' => 'Bạn chưa đăng nhập?',
        'type' => 'error',
        'reload' => false
       )));

}
               if (!$_POST['card_type'] || !$_POST['serial'] || !$_POST['pin'] ||!$_POST['card_amount']) {
                die(json_encode(array(
                    'title' => 'Lỗi',
                    'message' => 'Bạn cần nhập đầy đủ thông tin thẻ',
                    'type' => 'error',
                    'reload' => false
                   )));
                }else {

                    $type = $_POST['card_type'];
                    $serial = $_POST['serial'];
                    $pin = $_POST['pin'];
                    $amount = $_POST['card_amount'];
                    $request_id = rand(100000000, 99999999999);  
                  
                   
                $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `pin` = '".$pin."' AND `serial` = '".$serial."'"));

                    if ($check > 0) {
                        die(json_encode(array(
                            'title' => 'Lỗi',
                            'message' => 'Thẻ này đã tồn tại trong hệ thống',
                            'type' => 'error',
                            'reload' => false
                           )));
                    }

  $tranid = rand(1111111,9999999999);
        
        function send_card($request_id, $telco, $pin, $serial, $amount) {

        $domain = "https://gachthevip.net"; // THAY THÀNH WEBSITE CẦN ĐẤU

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $domain.'/api/send-card?request_id='.$request_id.'&telco='.$telco.'&pin='.$pin.'&serial='.$serial.'&amount='.$amount,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'partner_id: 4762605735',
                'partner_key: 0f94e329edf59fb8536eb3821e3cda17'
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }
    $data = send_card($tranid,$type,$pin,$serial,$amount);
        if ($data['status'] == 'success') {
            $cmd = "INSERT INTO `napthe` SET `username` = '" . $user['username'] . "', `type` = '" . $type . "', `amount` = '" . $amount . "', `serial` = '" . $serial . "', `pin` = '" . $pin . "', `tranid` = '" . $tranid . "', `status` = '2', `time` = '" . time() . "'";
            mysqli_query($kun->connect_db(), $cmd);
            die(json_encode(array(
                            'title' => 'Thành Công',
                            'message' => 'Thẻ '.$type.' mệnh giá '.number_format($amount).'đ đã lưu vào danh sách xử lý thành công. Vui lòng chờ trong giây lát',
                            'type' => 'success',
                            'reload' => false
                           )));
         
        } 
        else{
            die(json_encode(array('status' => false, 'msg' => $data['message'])));
        }

}
     
     