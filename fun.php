<?php
//签名算法
function encrypt_sign($post_data,$key){
    if(empty($post_data) || !is_array($post_data) || empty($key)){
        return false;
    }
    ksort($post_data);
    reset($post_data);
    $sign_str = "";
    foreach ($post_data as $k => $v) {
        $sign_str .= $k . "=" . $v . "&";
    }
    $sign_str .= 'key=' . $key;
    return md5($sign_str);
}