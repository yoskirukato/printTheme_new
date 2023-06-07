<?php

namespace App\Helpers;

use Cassandra\Exception\ValidationException;

class YoutubeChannel
{
    const API_KEY = 'AIzaSyCn8YjJac411OEgANB5M3kHHw-U0r9xW6Y';
    const CHANNEL_ID = 'UCLf7hCi6g8XNqfHOC3iIjFw';
    protected static $_instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public function getVideos($params = [])
    {
        $key = self::API_KEY;
        $channelId = self::CHANNEL_ID;
        $url = "https://www.googleapis.com/youtube/v3/search?key=$key&channelId=$channelId&part=snippet,id";

        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }

        $content = file_get_contents($url);
        return json_decode($content);
    }

    public function getLastVideos($params = [])
    {
        $params = array_merge($params, [
            'order' => 'date',
            'maxResults' => 5,
        ]);

        return $this->getVideos($params);
    }

    public function getVideoPublishedAfter($publishedAfter)
    {
        return $this->getLastVideos(['publishedAfter' => $publishedAfter]);
    }

    /*
     * Get new videos after last saved date
     *
     * @return mixed[]|null
     */
    public function getNewVideosAfterLastCheck()
    {
        $lastVideoDateString = Constants::get(LAST_YOUTUBE_VIDEO_DATE);

        if (!$lastVideoDateString) {
            $lastVideos = $this->getLastVideos(['maxCount' => 1]);

            if (isset($lastVideos->items[0])) {
                $lastVideoDate = $lastVideos->items[0]->snippet->publishedAt;
                Constants::set(LAST_YOUTUBE_VIDEO_DATE, $lastVideoDate);
            }

            return null;
        } else {
            $date = $this->getDateOffsetOneSecond($lastVideoDateString);
            $newVideos = $this->getVideoPublishedAfter($date);

            if (isset($newVideos->items) && count($newVideos->items)) {
                $lastVideoDate = $newVideos->items[0]->snippet->publishedAt;
                Constants::set(LAST_YOUTUBE_VIDEO_DATE, $lastVideoDate);
                return $newVideos->items;
            } else {
                return null;
            }
        }
    }

    public function getVideoUrl($id)
    {
        return "https://www.youtube.com/watch?v=$id";
    }

    /**
     * plus one second from date for publishedAfter
     *
     * @param string $dateString
     *
     * @return string
     * @throws \Exception
     *
     */
    protected function getDateOffsetOneSecond($dateString)
    {
        $date = new \DateTime($dateString);
        $date->modify('+1 second');

        return $date->format('Y-m-d\TH:i:s\Z');
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}