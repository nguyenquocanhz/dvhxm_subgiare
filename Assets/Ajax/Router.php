<?php
require_once(__DIR__.'/../../Config/config.php');
require_once(__DIR__.'/../../Config/function.php');

try {
    if (isset($_POST['type'])) {
        $type = check_string($_POST['type']);

        switch ($type) {
            case 'Login':
                // Xử lý cho Login
                $username = check_string($_POST['username']);
                $password = TypePassword(check_string($_POST['password']));
                if(!isset($username) || !isset($password))
                {
                    msg_error2('Vui lòng điền đẩy đủ thông tin');
                }
                if(!$FASTER->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
                {
                    msg_error2('Tên đăng nhập không tồn tại');
                }
                if(!$row = $FASTER->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' "))
                {
                    msg_error2('Mật khẩu đăng nhập không chính xác');
                }
                if($row['banned'] != 0)
                {
                    
                    msg_error2('Tài khoản này đã bị khóa bởi BQT lý do: '.$row['reason_banned']);
                }
                $FASTER->update("users", [
                    'otp' => NULL,
                    'ip'  => myip()
                ], " `username` = '$username' ");
                $_SESSION['username'] = $username;
                // SwalAlert2('Đăng nhập thành công ','success', BASE_URL('home'), 0);
                msg_success('Đăng nhập thành công ', BASE_URL('home'), 0);
                break;

            case 'Register':
                // Xử lý cho Register
                $email = check_string($_POST['email']);
                $fullname = check_string($_POST['fullname']);
                $username = check_string($_POST['username']);
                $password = check_string($_POST['password']);
                $repassword = check_string($_POST['repassword']);

                if (empty($email) || empty($fullname) || empty($username) || empty($password) || empty($repassword)) 
                {
                    msg_error2('Vui lòng điền đầy đủ thông tin');
                }   
                if(check_username($username) != True)
                {
                     msg_error2('Vui lòng nhập định dạng tài khoản hợp lệ');
                }
                if(strlen($username) < 5 || strlen($username) > 64)
                {
                    msg_error2('Tài khoản phải từ 5 đến 64 ký tự');
                }
                if($FASTER->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
                {
                     msg_error2('Tên đăng nhập đã tồn tại!');
                }
                if(strlen($password) < 3)
                {
                    msg_error2('Vui lòng đặt mật khẩu trên 3 ký tự');
                }
                if($password != $repassword)
                {
                    msg_error2('Mật khẩu không khớp');
                }
                if($FASTER->num_rows(" SELECT * FROM `users` WHERE `ip` = '".myip()."' ") >= 3)
                {
                    msg_error2('Chỉ được phép sử dụng tối đa 3 tài khoản/thiết bị');
                }
                $create = $FASTER->insert("users", [
                    'email'      => $email,
                    'fullname'      => $fullname,
                    'username'      => $username,
                    'password'      => TypePassword($password),
                    'token'         => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
                    'money'         => 0,
                    'total_money'   => 0,
                    'banned'        => 0,
                    'ip'            => myip(),
                    'time'          => time(),
                    'createdate'    => gettime()
                ]);
                if ($create)
                {   
                    $_SESSION['username'] = $username;
                    msg_success('Tạo tài khoản thành công', BASE_URL('home'), 4000);
                }
                else
                {
                    msg_error2('Vui lòng kiểm tra cấu hình DATABASE');
                }
                break;

            case 'PaymentCard':
                // Xử lý cho PaymentCard
                break;
            case 'ReplacePassword':
                    // Xử lý cho ReplacePassword
                    $old_password = check_string($_POST['old_password']);
                    $new_password = check_string($_POST['new_password']);
                    $confirm_new_password = check_string($_POST['confirm_new_password']);
                    if (empty($old_password) || empty($new_password) || empty($confirm_new_password)) 
                    {
                        msg_error2('Vui lòng điền đầy đủ thông tin');
                    }
                    if($newpassword != $confirm_new_password)
                    {
                        msg_error2("Nhập lại mật khẩu không đúng");
                    }
                    if(strlen($newpassword) < 5)
                    {
                        msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
                    }
                    $FASTER->update("users", [
                    'otp' => NULL,
                    'password' => TypePassword($newpassword)
                    ], " `id` = '".$row['id']."' ");
                    msg_success('Mật khẩu của bạn đã được thay đổi thành công !', BASE_URL('profile/logout/'), 4000);
                    msg_success2("Mật khẩu của bạn đã được thay đổi thành công !");
                    break;
            case 'CreateOrder':
                    // Xử lý cho CreateOrder
                    break;
            case 'ReToken':
                    $user = check_string($_POST['username']);
                    $update = $FASTER->update("users", [
                        'token' => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64)
                        ], " `username` = '".$user."' ");
                    if($update){
                        msg_success('Thay đổi token thành công !', BASE_URL('profile/info'), 0);
                    }
                    break;
            default:
                // Xử lý mặc định khi type không khớp với bất kỳ trường hợp nào
                break;
        }
    } else {
        // Xử lý khi phần tử 'type' không tồn tại trong $_POST
        http_response_code(502); // Thiết lập mã trạng thái 404
        echo 'Bad Gateway'; // Xuất thông báo lỗi
        exit; // Kết thúc kịch bản
    }
} catch (Exception $e) {
    // Xử lý ngoại lệ nếu có
    echo 'Có lỗi xảy ra: ' . $e->getMessage();
}
?>