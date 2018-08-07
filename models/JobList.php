<?php

class JobList
{

    private $key = '180413023455kb1d5c1223d347c115f78c6daaa9bd426252042511';
    private $url = "https://api.recman.no/v2/get/?scope=jobPost&fields=logo,title,body,city,numberOfPositions";

    public function retrieveJobs()
    {
        $curl = curl_init($this->url . '&key=' . $this->key);

        if ($curl) {
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);

            $listing = json_decode($result)->data;

            return $listing;
        } else {
            return false;
        }
    }

    public function excerpt($text, $max_length = 140, $cut_off = '...', $keep_word = true)
    {
        if (strlen($text) <= $max_length) {
            return strip_tags($text);
        }

        if (strlen($text) > $max_length) {
            if ($keep_word) {
                $text = substr($text, 0, $max_length + 1);

                if ($last_space = strrpos($text, ' ')) {
                    $text = substr($text, 0, $last_space);
                    $text = rtrim($text);
                    $text .= $cut_off;
                }
            } else {
                $text = substr($text, 0, $max_length);
                $text = rtrim($text);
                $text .= $cut_off;
            }
        }

        return strip_tags($text);
    }
}