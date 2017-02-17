<?php
namespace App\Kraken\Core\Helpers\ThirdParty;

use Facebook\Facebook;

class FacebookDataProvider
{
    private $fb;

    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => env('FB_APP_ID'),
            'app_secret' => env('FB_APP_SECRET'),
            'default_graph_version' => 'v2.2',
        ]);
    }

    public function getProfilePosts($profileName, $limit = 3)
    {
        $posts = $this->fb->get($profileName . '/posts?limit=' . $limit, env('FB_ACCESS_TOKEN'));

        return $posts->getGraphEdge()->asArray();
    }
}