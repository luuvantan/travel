<?php
namespace App\Helpers;

use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Crawler
{
    public $_url = "";

    public function file_get_contents_curl($url) {
        header("Content-Type: text/html; charset=utf-8");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');       
        $data = curl_exec($ch);
        curl_close($ch);

        $doc = new \DOMDocument;
        $libxml_previous_state = libxml_use_internal_errors(true);
        $doc->loadHTML($data);
        libxml_use_internal_errors($libxml_previous_state);
        $domGetForm = $doc->getElementById('genesis-content')->childNodes[0];
        return $domGetForm->ownerDocument->saveHTML($domGetForm);
    }

    public function DOMinnerHTML(\DOMNode $element) 
    { 
        return $element->ownerDocument->saveHTML($element); 
    }
    
    public function Crawls($url, $title)
    {
        // include(app_path().'\Helpers\simple_html_dom.php');
        $getData = file_get_html($url);
        $data = $getData->find('#genesis-content article .entry-content')[0];
        $data->removeChild($data->last_child());
        $data->removeChild($data->last_child());
        $data->removeChild($data->last_child());
        if($data->find('#toc_container')) {
            $data->removeChild($data->find('#toc_container')[0]);
        }
        $temps = $data->find('a');
        foreach($temps as $key => $temp) {
            $data->find('a')[$key]->href='';
        }
        $images = $data->find('img');
        foreach($images as $key => $image) {
            $src = $image->src;
            $changeSrc[$key] = $this->putFile($src);
            $data->find('img')[$key]->src = $changeSrc[$key];
            $data->find('img')[$key]->srcset = '';
        }

        DB::table('posts')->insert([
            'user_id' => random_int(12, 40),
            'name' => $title,
            'category_id' => 4,
            'provincial_id' => 12,
            'title' => $title,
            'content' => preg_replace('/[^\x{0009}\x{000a}\x{000d}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}]+/u',
            ' ', $data),
            'url_img' => $changeSrc[0],
            'created_at' => Carbon::create(2020, random_int(5, 8), random_int(1, 30), 0, 0, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2020, random_int(5, 8), random_int(1, 30), 0, 0, 0)->format('Y-m-d H:i:s'),
        ]);
        
        return true;
    }

    public function putFile($src)
    {
        if(empty(\Storage::directories('public/uploads'))) {
           \Storage::makeDirectory('uploads', 0775, true);
        }
        $filePath = 'public/uploads/' . \basename($src);
        \Storage::put($filePath, file_get_contents($src));

        return \Storage::url($filePath);
    }

    public function getUrlCrawl($urlCrawl)
    {
        include(app_path().'\Helpers\simple_html_dom.php');
        $getData = file_get_html($urlCrawl);
        $data = $getData->find('#genesis-content')[0];
        $getUrls = $data->find('a.entry-title-link');
        // dd($getUrls);
        foreach($getUrls as $key => $getUrl) {
            $url = $getUrl->href;
            $title = $getUrl->innerText();
            $x= $this->Crawls($url,$title);
            sleep(5);
        }
    }
}
?>
