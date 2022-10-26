<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Variasi
{

    //var $skey = "LoVe_iS_@2014_DH_Sn";
    var $skey = "p3ng4bdianU_M_K";

    public function safe_b64encode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    public function safe_b64decode($string)
    {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public function encode($value)
    {
        if (!$value) {
            return false;
        }
        $text = $value;
        $crypttext =  $this->skey. $text;
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode($value)
    {
        if (!$value) {
            return false;
        }
        $crypttext = $this->safe_b64decode($value);
        $decrypttext = $this->skey . $crypttext;
        $res = explode($this->skey, $decrypttext);
        $result = $res[2];
        return trim($result);
    }
}

/*
pada file application/libraries/autoload.php, tambahkan load library encrption 
$autoload['libraries'] = array('Encryption'); 
pada proses enkripsi dan dekripsi
$this->encryption->encode('Your data');
$this->encryption->decode('Your encrypted data');
*/