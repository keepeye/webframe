<?php namespace app\component;
/**
 * Aes.class.php.
 * @author keepeye <carlton.cheng@foxmail>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
class AES {

    //加密
    public static function encrypt($data,$key,$iv)
    {
        //$src不足16的倍数，末尾填充0字节
        $bytes = array();
        for($i = 0; $i < strlen($data); $i++){
            $bytes[] = dechex(ord($data[$i]));
        }
        $len = count($bytes);
        for($i=0;$i<(16-$len%16);$i++){
            $bytes[]=0x00;
        }
        //字节数组转成字符串
        $src = "";
        foreach($bytes as $v){
            $src .= chr(hexdec($v));
        }
        $encrypted = openssl_encrypt($src,"aes-128-cbc",$key,2,$iv);
        if ($encrypted === false) {
            throw new \Exception(openssl_error_string());
        }
        return $encrypted;
    }

    //解密
    public static function decrypt($data,$key,$iv)
    {
        $decrypted = openssl_decrypt($data,'aes-128-cbc',$key,2,$iv);
        if ($decrypted === false) {
            throw new \Exception(openssl_error_string());
        }
        $out = "";
        for($i = 0; $i < strlen($decrypted); $i++){
            if (ord($decrypted[$i]) == 0) {
                break;
            }
            $out .= $decrypted[$i];
        }
        return $out;
    }
}