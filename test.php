<?php
$url = 'https://cungphuot.info/ngoi-nha-lon-nguoc-o-da-nang-thu-hut-cac-ban-tre-post27451.cp';
header("Content-Type: text/html; charset=utf-8");
header("cookie: PHPSESSID=drinbvhamnbqpffrojn9dbqrr9; _ga=GA1.2.280256433.1594005248; _gid=GA1.2.1742532428.1594005248; snp_snppopup-welcome=1");
function file_get_contents_curl($url)
{
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $data=curl_exec($ch);
    curl_close($ch);
    return $data;
}
$html=file_get_contents_curl($url);
print_r($html);