<?php

require_once('./config/config.php');

$curl = curl_init();
        $url = GETAD_URL.FORMAT;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
            
        if (FORMAT == "xml")
        {            
            $xml = simplexml_load_string($result);
            $result = array();
            $result['adID'] = $xml->adID;
            $result['title'] = $xml->title;
            $result['url'] = $xml->url;
            $result['description'] = $xml->description;
            curl_close($curl);
            return $result;
            
        }
        else if (FORMAT == "json")
        {
            $response = array();
            $response = json_decode($result,true);   
            curl_close($curl);
            return $result;
        }
?>