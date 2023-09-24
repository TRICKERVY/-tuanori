<?php
if($_SESSION['token']) {
    die('<meta http-equiv="refresh" content="0;URL=/home"/>');
}
?>
 <div class="flex justify-center items-center" style="height: calc(100vh - 80px);">
               <span>
                  <form method="POST" action="" class="w-full border-grant max-w-sm lg:w-full shadow-lg bg-white-900 py-4 px-8">
                     <div class="text-gray-800 text-center text-2xl font-extrabold">
                        ĐĂNG KÝ TÀI KHOẢN
                     </div>
                     <div class="border-t border-gray-800 w-32 mx-auto mt-2"></div>
                                          <!--xỬ LÍ--> 
                                          <div>

<?php	
if(isset($_POST['register'])) {
$n = $_POST['name'];
$u = $_POST['username'];
$p = $_POST['password'];
$rp = $_POST['repassword'];
$u = $kun->rewrite($u);
$key = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=' , '#' , '/','-');
if(!$n || !$u || !$p || !$rp) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Vui lòng điền đầy đủ thông tin yêu cầu!</span>';
}


	elseif($kun->tim_chuoi($n,$key) == true) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Tên của bạn không được có kí tự lạ!</span>';
	}

	elseif($kun->tim_chuoi($u,$key) == true) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Tên tài khoản không được có kí tự lạ!</span>';
	}


	elseif($kun->tim_chuoi($p,$key) == true) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Mật khẩu không được có kí tự lạ!</span>';


}

	elseif($kun->tim_chuoi($n,'.') == true) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Tên của bạn không được có kí tự lạ!</span>';
	}

	elseif($kun->tim_chuoi($u,'.') == true) {
	echo'<script>toastr["error"]("Tên tài khoản không được có kí tự lạ!</span>';
	}

	elseif($kun->dectect_tiengviet($u) == true) {
	echo'<script>toastr["error"]("Tên tài khoản phải là tiếng việt không dấu!</span>';
	}


elseif(strlen($n) > 30) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Tên của bạn không được quá 30 kí tự!</span>';
}

elseif(strlen($n) < 6) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Tên của bạn không được nhỏ hơn 6 kí tự!</span>';
}

elseif(strlen($u) > 30) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Tên tài khoản không được quá 30 kí tự!</span>';
}

elseif(strlen($u) < 6) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Tên tài khoản không nhỏ hơn 6 kí tự!</span>';
}


elseif(strlen($p) < 6) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Mật khẩu phải lớn hơn 6 kí tự!</span>';
}


elseif($rp !== $p) {
	echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">2 mật khẩu bạn nhập không giống nhau!</span>';
}



elseif($kun->check_user_register($u) == false) {

$token = $kun->Creat_Token(30);
$auth =  $kun->Creat_Token(30);

$time = time();
  
  
$verify_code = rand(10000, 99999);
 
 $cmd = "INSERT INTO users (fbid, admin, name, username, email, money, password, token, auth, ip, verify_code, verify, time) VALUES ('0', 0, '".$n."', '".$u."', '".$e."', 0, '".md5($p)."', '".$token."','".$auth."', '".$_SERVER['REMOTE_ADDR']."', '".$verify_code."', 'true', '".$time."')";

    $res = mysqli_query($kun->connect_db(), $cmd);

    $_SESSION['token'] = $token;


	echo '<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Đăng kí thành công!</span>';
	echo '<meta http-equiv="refresh" content="0;URL=home" />';

}else {

	echo '<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Tên tài khoản đã có người sử dụng!</span>';


}
}
;?>


</div>
  <span>
                        <div class="mt-4 mb-4"><label for="name" class="block text-gray-800 text-sm font-semibold mb-1">
                           Tên đầy đủ
                           </label> <input type="text" name="name" placeholder="Nhập tên của bạn" value="" class="border border-gray-400 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                        </div>
                     </span>

                     <span>
                        <div class="mt-4 mb-4"><label for="username" class="block text-gray-800 text-sm font-semibold mb-1">
                           Tên tài khoản
                           </label> <input type="text" name="username" placeholder="Nhập tài khoản" value="" class="border border-gray-400 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                        </div>
                     </span>
                     <span>
                        <div class="mb-4"><label for="password" class="block text-gray-800 text-sm font-semibold mb-1">
                           Mật khẩu
                           </label> <input name="password" type="password" placeholder="Nhập mật khẩu" value="" class="border border-gray-400 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                        </div>
                     </span>
                     <span>
                        <div class="mb-4"><label for="repassword" class="block text-gray-800 text-sm font-semibold mb-1">
                          Nhập Lại Mật khẩu
                           </label> <input name="repassword" type="password" placeholder="Nhập mật khẩu" value="" class="border border-gray-400 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                        </div>
                     </span>
                     <p class="text-gray-500 text-xs mb-4">
                        Chú ý: Chúng tôi không yêu cầu bạn nhập tài khoản game của mình!
                     </p>
                    <div class="mb-2 flex justify-center flex-col">
                         <button type="submit" name="register" class="focus:outline-none h-10 bg-red-600 text-white flex items-center justify-center rounded w-full p-1 px-8 text-xl">Đăng ký</button> 
                <a href="/login.html" class="mt-2 py-1 rounded border border-gray-400 bg-white text-gray-800 text-xl flex items-center justify-center relative" ><i class="absolute bx bxs-user-plus" style="left:10px;top:9px;"></i>Đăng nhập</a>  
                    </div>
                  </form>
               </span>
            </div>
         </div>