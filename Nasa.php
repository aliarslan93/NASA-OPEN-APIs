<?php

class Nasa
{
    /**
     * Connection of Nasa Api
     * @var string
     */
    private $connection_url;

    /**
     * Date of Earth Date
     * @var $date format "Y-m-d"
     * 2018-05-05
     */
    public $date;

    /**
     * API KEY
     * @var string
     */
    private $api_key;

    /**
     * Nasa Api constructor.
     */
    public function __construct()
    {
        $this->connection_url = "https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=";
        $this->api_key = "NASA API KEY";
    }

    /**
     * @param $date "Y-m-d"
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        try {
            $url = $this->connection_url . $this->date;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $array = curl_exec($ch);
            curl_close($ch);
            return json_decode($array, true);
        } catch (\Exception $e) {
            return json_encode([
                'status' => 'error',
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

}