<?php
regis:
system("clear");
function sate_ayam($url, $head_cart, $post_cart){

    $tusuk = curl_init($url);
    
    
          curl_setopt($tusuk, CURLOPT_POST, true);
          curl_setopt($tusuk, CURLOPT_HTTPHEADER, $head_cart);
          curl_setopt($tusuk, CURLOPT_POSTFIELDS, $post_cart);
          curl_setopt($tusuk, CURLOPT_SSL_VERIFYPEER, FALSE);
          curl_setopt($tusuk, CURLOPT_SSL_VERIFYHOST, FALSE);;
          curl_setopt($tusuk, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($tusuk, CURLOPT_FOLLOWLOCATION, true);
          curl_setopt($tusuk, CURLOPT_ENCODING, "");
          curl_setopt($tusuk, CURLOPT_VERBOSE, true);
          curl_setopt($tusuk, CURLINFO_HEADER_OUT, true);
          curl_setopt($tusuk, CURLOPT_HEADER, true);
          $data     = curl_exec($tusuk);
          $header_size = curl_getinfo($tusuk, CURLINFO_HEADER_SIZE);
          $header = substr($data, 0, $header_size);
          $body_cart = substr($data, $header_size);
          $info_cart = curl_getinfo($tusuk, CURLINFO_HTTP_CODE);
          return $body_cart;
    };

    function dapet($url, $headers){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($resp, 0, $header_size);
        $body_cart = substr($resp, $header_size);
        $info_cart = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        return $resp;
            };

            function otp_send($url,$headers){
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                $resp = curl_exec($curl);
                $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
                $header = substr($resp, 0, $header_size);
                $body_cart = substr($resp, $header_size);
                $info_cart = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                return $body_cart;
                };



                function input_otp(){
                    echo "\e[93mMasukan Kode OTP: \e[92m";
                    $input_otp = fopen("php://stdin","r");
                    $otp = trim(fgets($input_otp));
                    $otp = "\"$otp\"";
                    return $otp;
                     }
$url_login = "https://edtsapp.indomaretpoinku.com/customer/api/login";
$url_otp = "https://edtsapp.indomaretpoinku.com/customer/api/login-verified";
$url_token = "https://edtsapp.indomaretpoinku.com/coupon/api/mobile/gift/redeem";
$url_redem = "https://edtsapp.indomaretpoinku.com/coupon/api/mobile/coupons?unpaged=true";



$header = [
    'Content-Type: application/json',
    'user-agent: okhttp/4.9.0',
];

        echo ("\e[1;31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
        echo ("\e[94m**********\e[93m".date('[d-m-Y]-[H:i:s]')."\e[94m***********\n");
        echo ("\e[1;31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
        echo ("\e[94m****************\e[93mREGIS POINTKU\e[94m***************\n");
        echo ("\e[1;31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
        echo ("\e[94m****************\e[93m@Amartapura91\e[94m***************\n");
        echo ("\e[1;31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
echo ( "\e[93mNomor : \e[92m" );
$input_hp = fopen("php://stdin","r");
$phone = trim(fgets($input_hp));
$phone = "\"$phone\"";
/////////////////////////////////
$idhp = base_convert(microtime(false), 16, 36);
$idhp = "\"$idhp\"";
////////////////////////////////
$data_login = '{"deviceId":'.$idhp.',"phoneNumber":'.$phone.'}';


$hasil_login = sate_ayam($url_login, $header, $data_login);
$pesan_login = json_decode($hasil_login, true);
$pesan_login = $pesan_login['message'];
echo ("\e[1;33mMessage : \e[92m$pesan_login" ).PHP_EOL;
////////////////////////////////////////
$x = 0;
do {
$otp = input_otp();
$data_otp = '{"deviceId":'.$idhp.',"otp":'.$otp.',"phoneNumber":'.$phone.'}';
$hasil_otp = sate_ayam($url_otp, $header, $data_otp);
$minta_token = json_decode($hasil_otp, true);
$status = $minta_token['status'];
if ($status == '01'){
    $x = 4;
}else {
  $x++;
}
}while ($x < 3);
/// cek otp 
    if($status == '03'){
                echo "Mengirim Ulang OTP".PHP_EOL;
                $url_resend = "https://edtsapp.indomaretpoinku.com/customer/api/resend-otp?phoneNumber=$phone";
                $resend = otp_send($url_resend,$header);
                $resend = json_decode($resend, true);
                $status_resend = $resend['status'];
                if ($status_resend == '03'){
                $pesan_ot = $resend['message'];
                echo $pesan_ot;
                die;
                }

                $otp = input_otp();
                $data_otp = '{"deviceId":'.$idhp.',"otp":'.$otp.',"phoneNumber":'.$phone.'}';
                $hasil_otp = sate_ayam($url_otp, $header, $data_otp);
                $minta_token = json_decode($hasil_otp, true);
                $status = $minta_token['status'];}
                if($status == '03'){die;}
        elseif($status == '01'){
            echo "\e[92mREGISTRASI\LOGIN BERHASIL \e[93m".PHP_EOL;
        }

$token = $minta_token['data']['access_token'];
$cek_user = $minta_token['data']['isNewRegister'];
if (empty($cek_user)){ 
    echo "\e[91mAKUN ANDA SUDAH TERDAFTAR".PHP_EOL;
}else {
    $header_token = [
        'user-agent: okhttp/4.9.0',
        'Authorization: Bearer '.$token,
        'Content-Type: application/json',
    ];

    $data_token = '{"couponPromoCode":"TARK"}';
    $hasil_token = sate_ayam($url_token, $header_token, $data_token);
    $minta_data = json_decode($hasil_token, true);
    $minta_data = $minta_data['data']['content']['0']['couponName'];
    echo "$minta_data".PHP_EOL;
}




/* ------------------------------------------------------------------------------------- */


/* ======================================================================================== */




$headers = [
    'Authorization: Bearer '.$token,
];

$voucher = dapet($url_redem, $headers);
$hasil_voucher = json_decode($voucher, true);

/* MULAI DARI SINI */
//
$data = $hasil_voucher['data']['content'];
if ($data == null){
    echo "delay : 1".PHP_EOL;
sleep(5);
$voucher = dapet($url_redem, $headers);
$hasil_voucher = json_decode($voucher, true);
}

$data = $hasil_voucher['data']['content'];
if ($data == null){
    echo "delay : 2".PHP_EOL;
    sleep(10);
    $voucher = dapet($url_redem, $headers);
    $hasil_voucher = json_decode($voucher, true);
}

$data = $hasil_voucher['data']['content'];
if ($data == null){
echo 'Voucher DELAY tunggu 1 menit lalu login kembali';
die;
}


$kupon_0 = $hasil_voucher['data']['content']['0'];
$kupon_0 = [
    
    $kupon_0['couponCode'], 
    $kupon_0['couponName'],
];
$kupon_0 = implode("|", $kupon_0);
//


//
$kupon_1 = $hasil_voucher['data']['content']['1'];
$kupon_1 = [
    
    $kupon_1['couponCode'], 
    $kupon_1['couponName'],
];
$kupon_1 = implode("|", $kupon_1);
//




//
$kupon_2 = $hasil_voucher['data']['content']['2'];
$kupon_2 = [
    
    $kupon_2['couponCode'], 
    $kupon_2['couponName'],
];
$kupon_2 = implode("|", $kupon_2);
//



//
$kupon_3 = $hasil_voucher['data']['content']['3'];
$kupon_3 = [
    
    $kupon_3['couponCode'], 
    $kupon_3['couponName'],
];
$kupon_3 = implode("|", $kupon_3);
//


//
$kupon_4 = $hasil_voucher['data']['content']['4'];
$kupon_4 = [
    
    $kupon_4['couponCode'], 
    $kupon_4['couponName'],
];
$kupon_4 = implode("|", $kupon_4);
//





//
$kupon_6 = $hasil_voucher['data']['content']['6'];
$kupon_6 = [
    
    $kupon_6['couponCode'], 
    $kupon_6['couponName'],
];
$kupon_6 = implode("|", $kupon_6);
//


$kupon_5 = $hasil_voucher['data']['content']['5'];
$kupon_5 = [
    
    $kupon_5['couponCode'], 
    $kupon_5['couponName'],
];
$kupon_5 = implode("|", $kupon_5);
//
$file = fopen("indo.txt","a");  
fwrite($file,"========================================================".PHP_EOL);
fwrite($file,"Nomor HP : $phone".PHP_EOL);
fwrite($file,"$kupon_0".PHP_EOL);
fwrite($file,"$kupon_1".PHP_EOL);
fwrite($file,"$kupon_2".PHP_EOL);
fwrite($file,"$kupon_3".PHP_EOL);
fwrite($file,"$kupon_4".PHP_EOL);
fwrite($file,"$kupon_5".PHP_EOL);
fwrite($file,"$kupon_6".PHP_EOL);
fclose($file);
sleep (1);
echo ("\e[1;31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
echo "\e[92mKUPON 1:".$kupon_0."\n";
echo "\e[92mKUPON 2:".$kupon_1."\n";
echo "\e[92mKUPON 3:".$kupon_2."\n";
echo "\e[92mKUPON 4:".$kupon_3."\n";
echo "\e[92mKUPON 5:".$kupon_4."\n";
echo "\e[92mKUPON 6:".$kupon_5."\n";
echo "\e[92mKUPON 7:".$kupon_6."\n";
sleep (2);
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/json';
echo ("\e[1;31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
        echo ("\e[94m************\e[93mREGIS KLIK INDOMARET\e[94m************\n");
        echo ("\e[1;31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
        echo ("\e[94m****************\e[93m@Amartapura91\e[94m***************\n");
        echo ("\e[1;31m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
echo ( "\e[93mNomor : \e[92m" );
$nomer = trim(fgets(STDIN));



	$data = file_get_contents("https://wirkel.com/data.php?qty=1&domain=tinta.co.id");
	$datas = json_decode($data);
	$nama = $datas->result[0]->firstname;
	$nama2 = $datas->result[0]->lastname;

	$reg = curl('https://account-api-v1.klikindomaret.com/api/PreRegistration/SendOTPSMS?NoHP='.$nomer, null, $headers);
	if (strpos($reg[1], '"Message":"Kode OTP berhasil dikirim ke nomor telepon Anda."')) {
		echo color ("yellow", "OTP   : \e[92m");
		$otp = trim(fgets(STDIN));
		$reg2 = curl('https://account-api-v1.klikindomaret.com/api/PreRegistration/ValidationOTPCodeSMS?NoHP='.$nomer.'&otpCode='.$otp, null, $headers);
		if (strpos($reg2[1], '"Message":"Verifikasi berhasil dilakukan."')) {
			echo color("green","Sabar lagi di daftarin... \n");
			$reg3 = curl('https://account-api-v1.klikindomaret.com/api/Customer/Registration?districtID=2483&mfp_id=1', '{"nomor":"","isVaildPhoneNo":false,"messageError":"","Mobile":"'.$nomer.'","Email":null,"FName":"'.$nama.'","LName":"'.$nama2.'","Password":"Bandung123","ConfirmPassword":"Be123456","IsConfirmed":true,"valueDate":"","isLoading":false,"ID":"00000000-0000-0000-0000-000000000000","IPAddress":"192.168.56.131","IsSubscribed":0,"IsNewsLetterSubscriber":0,"AllowSMS":false,"LastUpdate":"0001-01-01T00:00:00","DateOfBirth":"1993-03-'.rand(01, 30).'T00:00:00.000Z","Gender":"Wanita","DateOfBirthStringFormatted":"1993-03-'.rand(01, 30).'","TypePushEmail":0,"IsUpload":false,"IsActivated":false,"MobileVerified":true,"DateOfBirthExists":"0001-01-01T00:00:00","OTPValidationExpired":false,"IsFromOtherSystem":false,"OTPCount":0,"OTPAvailable":0,"IsNewAccount":true,"Origin":"Registrasi Website"}', $headers);
			if (strpos($reg3[1], '"Message":"Success"')) {
				echo "BERHASIL: \e[92m$nomer\e[97m | pass : \e[92mBandung123\n";
				echo color("yellow","REGIS LAGI..? (y/n): ");
				$yn = trim(fgets(STDIN));
				if ($yn == 'y') goto regis;
				} else {
		die($reg3[1]);

			}
			} else {
		die($reg2[1]);
	}
	} else {
		die($reg[1]);
	}


function curl($url,$post,$headers,$follow=false,$method=null)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if ($follow == true) curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		if ($method !== null) curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		if ($headers !== null) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		if ($post !== null) curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$result = curl_exec($ch);
		$header = substr($result, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		$body = substr($result, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
		$cookies = array();
		foreach($matches[1] as $item) {
		  parse_str($item, $cookie);
		  $cookies = array_merge($cookies, $cookie);
		}
		return array (
		$header,
		$body,
		$cookies
		);
	}

function get_between($string, $start, $end) 
    {
        $string = " ".$string;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string,$end,$ini) - $ini;
        return substr($string,$ini,$len);
    }

function remove_space($var) {
    $new = str_replace("\n", "", $var);
    $new = str_replace("\t", "", $new);
    $new = str_replace(" ", "", $new);
    return $new;
}

function color($color = "default" , $text)
    {
        $arrayColor = array(
            'red'       => '1;31',
            'green'     => '1;32',
            'yellow'    => '1;33',
            'blue'      => '1;34',
        );  
        return "\033[".$arrayColor[$color]."m".$text."\033[0m";
    }

function save($data, $file) 
	{
		$handle = fopen($file, 'a+');
		fwrite($handle, $data);
		fclose($handle);
	}

// echo 'Ingin jalankan lagi (y/n): ';
// $input = fopen("php://stdin","r");
// $eksekusi = trim(fgets($input));
// if ($eksekusi == 'y'){

//     system('./script.bat');
// }else {die;}