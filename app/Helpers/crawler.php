<?php
namespace App\Helpers;

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
    
    public function Crawls($url)
    {
        include(app_path().'\Helpers\simple_html_dom.php');
        $getData = file_get_html($url);
        $data = $getData->find('#genesis-content article .entry-content')[0];
        $data->removeChild($data->last_child());
        $data->removeChild($data->last_child());
        $data->removeChild($data->last_child());

        $images = $data->find('img');
        foreach($images as $key => $image) {
            $src = $image->src;
            $changeSrc = $this->putFile($src);
            $data->find('img')[$key]->src = $changeSrc;
            $data->find('img')[$key]->srcset = '';
        }
        return $data;
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
}
?>
