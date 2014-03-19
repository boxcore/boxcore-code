<?php
echo '$_SERVER["HTTP_X_FORWARDED_FOR"]:'.$_SERVER["HTTP_X_FORWARDED_FOR"];
echo '<hr>';
echo '$_SERVER[\'REMOTE_ADDR\']:'.$_SERVER['REMOTE_ADDR'];
echo '<hr>';
echo '$_SERVER["HTTP_CLIENT_IP"]:'.$_SERVER["HTTP_CLIENT_IP"];
echo '<hr>';
echo 'getenv(\'REMOTE_ADDR\'):'.getenv('REMOTE_ADDR');
echo '<hr>';
echo 'getenv("HTTP_X_FORWARDED_FOR"):'.getenv("HTTP_X_FORWARDED_FOR");
echo '<hr>';
echo 'getenv("HTTP_CLIENT_IP"):'.getenv("HTTP_CLIENT_IP");
echo '<hr>';

echo 'function getip()::'.getip();

/**
 * 获取客户端真实ip
 * @return string
 * @reffer co
 */
function getip() {

    if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {

        $ip = $_SERVER['REMOTE_ADDR'];
    }
    elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {

        $ip = getenv("HTTP_X_FORWARDED_FOR");
    }
    elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {

        $ip = getenv("REMOTE_ADDR");
    }
    elseif (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {

        $ip = getenv("HTTP_CLIENT_IP");
    }
    else {

        $ip = "unknown";
    }

    $pos = stripos( $ip, ',' );

    if( $pos !== FALSE ) {

        $ip = substr( $ip, 0, $pos );
    }

    return $ip;
}

// 扩展问题： 如何获取ipv6地址？