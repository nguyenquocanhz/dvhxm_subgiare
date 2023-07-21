<?php
$FASTER = new FASTER;
$config = [
    'url'       => $base_url,
    'serial'    => '26072021',
    'version'   => '1.2.7',
    'ip_server' => ''
];

$list_loaithe = [
    'VIETTEL',
    'VINAPHONE',
    'MOBIFONE',
    'ZING',
    'VNMOBI'
];
function checkRequestMethod() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('HTTP/1.1 405 Method Not Allowed');
        header('Content-Type: application/json');
        echo json_encode(array(
            'status' => false,
            'message' => 'Method Not Allowed'
        ));
        exit;
    }
}
function SwalAlert2($text, $status, $time,$url) 
{
    return die('
      <script type="text/javascript">
        swal(' . $text . ', ' . $status . ');
        setTimeout(function(){ location.href = "'.$url.'" },'.$time.');
      </script>');
  
}
function Role($level, $amount)
{
    switch ($level) {
        case 'admin':
            return 'Quản Trị Viên';
            break;

        case 'member':
            return 'Người Dùng';
            break;
        case 'vip1':
            if ($amount >= 500000)
                return 'Cộng Tác Viên';
            break;
        case 'vip3':
            if ($amount >= 20000000)
                return 'Đại Lý';
            break;
        case 'vip10':
            if ($amount >= 100000000)
                return 'Nhà Phân Phối';
            break;
        default:
            return 'Không xác định';
    }
    return 'Người Dùng';
}

function getMoney_momo($token)
{
    $result = curl_get("https://api.web2m.com/apigetsodu/$token");
    $result = json_decode($result, true);
    if(isset($result['status']) && $result['status'] == 200)
    {
        return $result['SoDu'];
    }
    else
    {
        return 0;
    }
}
function insert_options($name, $value)
{
    global $FASTER;
    if(!$FASTER->get_row("SELECT * FROM `options` WHERE `name` = '$name' "))
    {
        $FASTER->insert("options", [
            'name'  => $name,
            'value' => $value
        ]);
    }
}
function getSite($name)
{
    global $FASTER;
    return $FASTER->get_row("SELECT * FROM `options` WHERE `name` = '$name' ")['value'];
}
function getUser($username, $row)
{
    global $FASTER;
    return $FASTER->get_row("SELECT * FROM `users` WHERE `username` = '$username' ")[$row];
}
function cardvip($loaithe, $pin, $seri, $menhgia, $code)
{
    global $FASTER;
    $dataPost = array(
        'APIKey' => $FASTER->site('api_cardvip'),
        'NetworkCode' => $loaithe,
        'PricesExchange' => $menhgia,
        'NumberCard' => $pin,
        'SeriCard' => $seri,
        'IsFast' => 'true',
        'RequestId' => $code,
        'UrlCallback' => BASE_URL('callback.php')
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
function trumthe($loaithe, $pin, $seri, $menhgia, $code)
{
    global $FASTER;
    $url = 'https://trumthe.vn/chargingws/v2?sign='.md5($FASTER->site('partner_key').$pin.$seri).'&telco='.$loaithe.'&code='.$pin.'&serial='.$seri.'&amount='.$menhgia.'&request_id='.$code.'&partner_id='.$FASTER->site('partner_id').'&command=charging';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
}

$partner_id = $FASTER->site('partner_id');
$partner_key = $FASTER->site('partner_key');
function DoiThe1s($requestid,$telco,$amount,$serial,$code) 
{       global $partner_id , $partner_key;
        $request_id = $requestid;  //Mã đơn hàng của bạn
        $command = 'charging';  // Nap the
        $url = 'https://doithe1s.vn/chargingws/v2';
        $partner_id = $partner_id; // doithe1s cung cấp  
        $partner_key = $partner_key; // doithe1s cung cấp 
        $dataPost = array();
        $dataPost['request_id'] = $request_id;
        $dataPost['code'] = $code;
        $dataPost['partner_id'] = $partner_id;
        $dataPost['serial'] = $serial;
        $dataPost['telco'] = $telco;
        $dataPost['command'] = $command;
        ksort($dataPost);
        $sign = $partner_key;
        foreach ($dataPost as $item) {
            $sign .= $item;
        }
        
        $mysign = md5($sign);

        $dataPost['amount'] = $amount;
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

        return json_decode($result,true);
}
function format_date($time){
    return date("H:i:s d/m/Y", $time);
}
/* CONFIG RÚT TIỀN */
function listbank()
{
    $html = '
    <option value="">Chọn ngân hàng</option>
    <option value="MOMO">MOMO</option>
    <option value="VIETTEL PAY">VIETTEL PAY</option>
    <option value="ZALO PAY">ZALO PAY</option>
    <option value="AIRPAY">AIRPAY</option>
    <option value="VIETINBANK">VIETINBANK</option>
    <option value="VIETCOMBANK">VIETCOMBANK</option>
    <option value="AGRIBANK">AGRIBANK</option>
    <option value="TPBANK">TPBANK</option>
    <option value="HDB">HDB</option>
    <option value="VPBANK">VPBANK</option>
    <option value="MBBANK">MBBANK</option>
    <option value="OCEANBANK">OCEANBANK</option>
    <option value="BIDV">BIDV</option>
    <option value="SACOMBANK">SACOMBANK</option>
    <option value="ACB">ACB</option>
    <option value="ABBANK">ABBANK</option>
    <option value="NCB">NCB</option>
    <option value="IBK">IBK</option>
    <option value="CIMB">CIMB</option>
    <option value="EXIMBANK">EXIMBANK</option>
    <option value="SEABANK">SEABANK</option>
    <option value="SCB">SCB</option>
    <option value="DONGABANK">DONGABANK</option>
    <option value="SAIGONBANK">SAIGONBANK</option>
    <option value="PG BANK">PG BANK</option>
    <option value="PVCOMBANK">PVCOMBANK</option>
    <option value="KIENLONGBANK">KIENLONGBANK</option>
    <option value="VIETCAPITAL BANK">VIETCAPITAL BANK</option>
    <option value="OCB">OCB</option>
    <option value="MSB">MSB</option>
    <option value="SHB">SHB</option>
    <option value="VIETBANK">VIETBANK</option>
    <option value="VRB">VRB</option>
    <option value="NAMABANK">NAMABANK</option>
    <option value="SHBVN">SHBVN</option>
    <option value="VIB">VIB</option>
    <option value="TECHCOMBANK">TECHCOMBANK</option>
    ';
    return $html;
}

function daily($data)
{
    if($data == 0)
    {
        return 'Thành viên';
    }
    else if($data == 1)
    {
        return 'Đại lý';
    }
}
function trangthai($data)
{
    if($data == 'xuly')
    {
        return 'Đang xử lý';
    }
    else if($data == 'hoantat')
    {
        return 'Hoàn tất';
    }
    else if($data == 'thanhcong')
    {
        return 'Thành công';
    }
    else if($data == 'huy')
    {
        return 'Hủy';
    }
    else if($data == 'thatbai')
    {
        return 'Thất bại';
    }
    else
    {
        return 'Khác';
    }
}
function loaithe($data)
{
    if ($data == 'Viettel' || $data == 'viettel')
    {
        $show = 'https://i.imgur.com/xFePMtd.png';
    }
    else if ($data == 'Vinaphone' || $data == 'vinaphone')
    {
        $show = 'https://i.imgur.com/s9Qq3Fz.png';
    }
    else if ($data == 'Mobifone' || $data == 'mobifone')
    {
        $show = 'https://i.imgur.com/qQtcWJW.png';
    }
    else if ($data == 'Vietnamobile' || $data == 'vietnamobile')
    {
        $show = 'https://i.imgur.com/IHm28mq.png';
    }
    else if ($data == 'Zing' || $data == 'zing')
    {
        $show = 'https://i.imgur.com/xkd7kQ0.png';
    }
    else if ($data == 'Garena' || $data == 'garena')
    {
        $show = 'https://i.imgur.com/BLkY5qm.png';
    }
    return '<img style="text-align: center;" src="'.$show.'" width="70px" />';
}

function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $FASTER;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $FASTER->site('email'); // GMAIL STMP
        $mail->Password = $FASTER->site('pass_email'); // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($FASTER->site('email'), $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($FASTER->site('email'), $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
function parse_order_id($des)
{
    global $FASTER;
    $re = '/'.$FASTER->site('noidung_naptien').'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0 )
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($FASTER->site('noidung_naptien'));
    $orderId = intval(substr($orderCode, $prefixLength ));
    return $orderId ;
}
function BASE_URL($url)
{
    global $base_url;
    return $base_url.$url;
}
function gettime()
{
    return date('Y/m/d H:i:s', time());
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function msg_success2($text)
{
    return die('<div class="alert alert-success alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div>');
}
function msg_error2($text)
{
    return die('<div class="alert alert-danger alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div>');
}
function msg_warning2($text)
{
    return die('<div class="alert alert-warning alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div>');
}
function msg_success($text, $url, $time)
{
    return die('<div class="alert alert-success alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<div class="alert alert-danger alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<div class="alert alert-warning alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function admin_msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thành Công", "'.$text.'","success");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function admin_msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "'.$text.'","error");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function admin_msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "'.$text.'","warning");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function display_banned($data)
{
    if ($data == 1)
    {
        $show = '<span class="badge badge-danger">Banned</span>';
    }
    else if ($data == 0)
    {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}
function display_loaithe($data)
{
    if ($data == 0)
    {
        $show = '<span class="label label-warning">Bảo trì</span>';
    }
    else 
    {
        $show = '<span class="label label-success">Hoạt động</span>';
    }
    return $show;
}
function display_ruttien($data)
{
    if ($data == 'xuly')
    {
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat')
    {
        $show = '<span class="badge badge-success">Đã thanh toán</span>';
    }
    else if ($data == 'huy')
    {
        $show = '<span class="badge badge-danger">Hủy</span>';
    }
    return $show;
}
function display_ruttien_user($data)
{
    if ($data == 'xuly')
    {
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat')
    {
        $show = '<span class="label label-success">Đã thanh toán</span>';
    }
    else if ($data == 'huy')
    {
        $show = '<span class="label label-danger">Hủy</span>';
    }
    return $show;
}

function Callback_One($code, $loaithe, $pin, $seri, $menhgia,$ip) 
{
        $domain = "https://source.nguyenquocanh-dev.site/Callback";
        $url = 'https://shopkcff.com/';
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $domain.'?code='.$code.'&telco='.$loaithe.'&pin='.$pin.'&serial='.$seri.'&amount='.$menhgia.'&ip='.$ip.'&url='.$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function display($data)
{
    if ($data == 'HIDE')
    {
        $show = '<span class="badge badge-danger">ẨN</span>';
    }
    else if ($data == 'SHOW')
    {
        $show = '<span class="badge badge-success">HIỂN THỊ</span>';
    }
    return $show;
}
function status($data)
{
    if ($data == 'xuly'){
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="label label-success">Hoàn tất</span>';
    }
    else if ($data == 'thanhcong'){
        $show = '<span class="label label-success">Thành công</span>';
    }
    else if ($data == 'success'){
        $show = '<span class="label label-success">Success</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="label label-danger">Thất bại</span>';
    }
    else if ($data == 'error'){
        $show = '<span class="label label-danger">Error</span>';
    }
    else if ($data == 'loi'){
        $show = '<span class="label label-danger">Lỗi</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="label label-danger">Hủy</span>';
    }
    else if ($data == 'dangnap'){
        $show = '<span class="label label-warning">Đang đợi nạp</span>';
    }
    else if ($data == 2){
        $show = '<span class="label label-success">Hoàn tất</span>';
    }
    else if ($data == 1){
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else{
        $show = '<span class="label label-warning">Khác</span>';
    }
    return $show;
}
function status_admin($data)
{
    if ($data == 'xuly'){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 'thanhcong'){
        $show = '<span class="badge badge-success">Thành công</span>';
    }
    else if ($data == 'success'){
        $show = '<span class="badge badge-success">Success</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="badge badge-danger">Thất bại</span>';
    }
    else if ($data == 'error'){
        $show = '<span class="badge badge-danger">Error</span>';
    }
    else if ($data == 'loi'){
        $show = '<span class="badge badge-danger">Lỗi</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="badge badge-danger">Hủy</span>';
    }
    else if ($data == 'dangnap'){
        $show = '<span class="badge badge-warning">Đang đợi nạp</span>';
    }
    else if ($data == 2){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 1){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else{
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}
function getHeader(){
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}

function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_url($url)
{
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLOPT_NOBODY, 1);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
    if(!curl_exec($c))
    {
        return false;
    }
    else
    {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip","ZIP");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function TypePassword($string)
{
    return md5($string);
}
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<nav aria-badge="Page navigation example"><ul class="pagination pagination-lg">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li class="page-item"><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<i class="fas fa-angle-left"></i>');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
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
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total)
    {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<i class="fas fa-angle-right"></i>');
    }
    $out[] = '</ul></nav>';
    return implode('', $out);
}
function myip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))     
    {  
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    
    {  
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else  
    {  
        $ip_address = $_SERVER['REMOTE_ADDR'];  
    }
    return $ip_address;
}
function timeAgo($time_ago)
{
    $time_ago   = date("Y-m-d H:i:s", $time_ago);
    $time_ago   = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60)
    {
        return "$seconds giây trước";
    }
    //Minutes
    else if($minutes <= 60)
    {
        return "$minutes phút trước";
    }
    //Hours
    else if($hours <= 24)
    {
        return "$hours tiếng trước";
    }
    //Days
    else if($days <= 7)
    {
        if($days == 1)
        {
            return "Hôm qua";
        }
        else
        {
            return "$days ngày trước";
        }
    }
    //Weeks
    else if($weeks <= 4.3)
    {
        return "$weeks tuần trước";
    }
    //Months
    else if($months <=12)
    {
        return "$months tháng trước";
    }
    //Years
    else
    {
        return "$years năm trước";
    }
}
/* FASTER.CO TEAM LEADER - NTTHANH - DEV PHP */



