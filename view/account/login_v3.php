
<?php
if($_SESSION['token']) {
    die('<meta http-equiv="refresh" content="0;URL=/home"/>');
}
?>
<div class="flex justify-center items-center" style="height: calc(100vh - 80px);">
       <span>
          <form method="POST" action="" class="w-full border-grant max-w-sm lg:w-full shadow-lg bg-white-900 py-4 px-8">
             <div class="text-gray-800 text-center text-2xl font-extrabold">
                ĐĂNG NHẬP TÀI KHOẢN
             </div>
             <div class="border-t border-gray-600 w-32 mx-auto mt-1"></div>
                          <!----> 
                          <div>
                            <?php
 if(isset($_POST['login'])) {
 $u = addslashes($_POST['username']);
$p = addslashes($_POST['password']);

if(!$u || !$p) {
 echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Hãy điền đầy đủ thông tin!</span>';
}

elseif($kun->check_user($u,$p) == false) {
echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Đăng nhập thất bại!</span>';
}else{
$token = $kun->Creat_Token(30);

 
    $res = mysqli_query($kun->connect_db(), "UPDATE users SET token = '".$token."', ip = '".$_SERVER['REMOTE_ADDR']."' WHERE `username`='".$u."'");

    $_SESSION['token'] = $token;
 
 echo'<span class="bg-yellow-500 rounded-none flex items-center justify-center py-2 font-medium tracking-wide text-black mt-1">Đăng nhập thành công!</span>';
  echo '<meta http-equiv="refresh" content="0;URL=home" />';

}

}
?>
</div>
             <span>
                <div class="mt-4 mb-4"><label for="username" class="block text-gray-800 text-sm font-semibold mb-1">
                   Tên tài khoản
                   </label> <input name="username" type="text" placeholder="Nhập tài khoản" value="" class="border border-gray-400 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none"> 
                </div>
             </span>
             <span>
                <div class="mb-2"><label for="username" class="block text-gray-800 text-sm font-semibold mb-1">
                   Mật khẩu
                   </label> <input name="password" type="password" placeholder="Nhập mật khẩu" value="" class="border border-gray-400 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                </div>
             </span>
             <p class="text-gray-800 text-xs mb-4">
                Thông báo: Nhớ nhập đúng email trong tài khoản để lấy lại được mật
                khẩu khi quên!
             </p>
             <div class="mb-2 flex justify-center flex-col">
                         <button type="submit" name="login" class="focus:outline-none h-10 bg-red-600 text-white flex items-center justify-center rounded w-full p-1 px-8 text-xl">Đăng nhập</button> 
                        <a href="/login/fb" class="focus:outline-none text-white cursor-pointer text-xl h-8 relative flex items-center justify-center mt-5"><i class="absolute bx bxl-facebook-square" style="left: 10px; top: 5px;"></i> <span class="w-full p-1 px-8 bg-facebook text-center rounded truncate">
                Đăng nhập qua Facebook</span></a>
                <a href="/reg.html" class="mt-2 py-1 rounded border border-gray-400 bg-white text-gray-800 text-xl flex items-center justify-center relative" ><i class="absolute bx bxs-user-plus" style="left:10px;top:9px;"></i>Tạo tài khoản</a>  
                    </div>
          </form>
       </span>
    </div>
</div>
