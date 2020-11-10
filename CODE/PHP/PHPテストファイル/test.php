<?php

echo reverseWords("white legwear");

// Reverse words
// 私のコード
// function reverseWords($str) {
//     //文字列を反転させる。
//     $newStr = strrev($str);
//     //スペースから文字列を分断し、配列にする。
//     $strArr = explode(' ', $newStr);
//     //配列ごとの値を逆順で選び出す。
//     $result = null;
//     for($i = count($strArr) - 1; $i >= 0; $i--){

//         $result = $result.$strArr[$i].' ';  
//     }
//     return trim($result);
// }

// 良いコード
function reverseWords($str){

    // 以空格爲界分割倒序的字符串
    $arrStr = explode(' ', strrev($str));
    // 將數組的順序翻轉
    $arrStr2 = array_reverse($arrStr);
    //將數組輸出爲字符串, 默認以空格連接
    $strRes = implode(' ', $arrStr2);
    
    return $strRes; 
}

