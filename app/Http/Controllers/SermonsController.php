<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\YouTube;

class SermonsController extends Controller
{
    public function index()
    {
        # Configs
    $apiKey = config('app.youtube_api_key');

    # Initialize YouTube API client
    $client = new GoogleClient();
    $client->setDeveloperKey($apiKey);
    $service = new YouTube($client);

    # Fetch the latest 5 videos from the channel
    $channelId = 'UCpfSzm2i2qUKFHc8QSWmOFg';
    $response = $service->search->listSearch('snippet', [
        'channelId' => $channelId,
        'maxResults' => 6,
        'order' => 'date',
    ]);

    // Fetch live broadcasts from the channel
    $liveResponse = $service->search->listSearch('snippet', [
        'channelId' => $channelId,
        'eventType' => 'live',
        'type' => 'video',
        'maxResults' => 1, 
    ]);

    # Pass the response to the view
    $videos = $response->getItems();
    $liveBroadcast = !empty($liveResponse['items']) ? $liveResponse['items'][0] : null;
    
    return view('sermons.index', compact('videos', 'liveBroadcast'));
    }
}
