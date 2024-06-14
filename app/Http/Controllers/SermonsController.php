<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\YouTube;
use App\Models\SermonVideo;
use Illuminate\Support\Facades\Storage;
use Google_Service_Exception;
use Illuminate\Support\Facades\Cache;

class SermonsController extends Controller
{
    public function index()
    {
        $errorMessage = null; // Initialize $errorMessage
        try {
            // Fetch previous sermons from the database
            $sermonVideos = SermonVideo::orderBy('created_at', 'desc')->paginate(6);
    
            // Configs
            $apiKey = config('app.youtube_api_key');
    
            // Initialize YouTube API client
            $client = new GoogleClient();
            $client->setDeveloperKey($apiKey);
            $service = new YouTube($client);

            // Cache keys
            $cacheKeyLatestVideos = 'latest_youtube_videos';
            $cacheKeyLiveBroadcast = 'live_youtube_broadcast';
    
            // Fetch the latest 6 videos from the channel, with caching
            $videos = Cache::remember($cacheKeyLatestVideos, now()->addHours(1), function () use ($service) {
                $channelId = 'UCVCQW4PxUdWzw9RwKPGiqag';
                $response = $service->search->listSearch('snippet', [
                    'channelId' => $channelId,
                    'maxResults' => 6,
                    'order' => 'date',
                ]);
                return $response->getItems();
            });

            // Fetch live broadcasts from the channel, with caching
            $liveBroadcast = Cache::remember($cacheKeyLiveBroadcast, now()->addMinutes(5), function () use ($service) {
                $channelId = 'UCVCQW4PxUdWzw9RwKPGiqag';
                $liveResponse = $service->search->listSearch('snippet', [
                    'channelId' => $channelId,
                    'eventType' => 'live',
                    'type' => 'video',
                    'maxResults' => 1,
                ]);
                return !empty($liveResponse['items']) ? $liveResponse['items'][0] : null;
            });

        } catch (Google_Service_Exception $e) {
            // Handle quota exceeded error
            if ($e->getCode() == 403 && strpos($e->getMessage(), 'quotaExceeded') !== false) {
                $errorMessage = 'YouTube content is temporarily unavailable due to quota limits. Please try again later.';
                $videos = [];
                $liveBroadcast = null;
            } else {
                throw $e; // Re-throw other exceptions
            }
        }

        return view('sermons.index', compact('sermonVideos', 'videos', 'liveBroadcast', 'errorMessage'));
    }

    public function show(SermonVideo $sermonVideo)
    {
        return view('sermons.show', compact('sermonVideo'));
    }

    public function create()
    {
        return view('sermons.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video' => 'required|file|mimetypes:video/mp4,video/mpeg,video/ogg,video/webm,video/avi|max:102400', // 100 MB
        ]);

        // Handling file upload
        $path = $request->file('video')->store('sermon_videos', 'public');
        $videoUrl = Storage::url($path);

        // Create the SermonVideo
        SermonVideo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'video_url' => $videoUrl,
        ]);

        return redirect()->route('sermons.index')->with('success', 'Sermon video uploaded successfully.');
    }

        public function edit(SermonVideo $sermonVideo)
    {
        return view('sermons.edit', compact('sermonVideo'));
    }

    public function update(Request $request, SermonVideo $sermonVideo)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video' => 'required|file|mimetypes:video/mp4,video/mpeg,video/ogg,video/webm,video/avi|max:102400', // 100 MB
        ]);

        // Handling file upload
        if ($request->hasFile('video')) {
            // Delete the old video
            Storage::delete(str_replace('/storage/', 'public/', $sermonVideo->video_url));

            $videoPath = $request->file('video')->store('sermon_videos', 'public');
            $videoUrl = Storage::url($videoPath);
            $sermonVideo->video_url = $videoUrl;
        }

        // Update the SermonVideo
        $sermonVideo->title = $request->input('title');
        $sermonVideo->description = $request->input('description');
        $sermonVideo->save();

        return redirect()->route('sermons.index')->with('success', 'Sermon video updated successfully.');
    }

    public function destroy(SermonVideo $sermonVideo)
    {
        // Delete the video file from storage
        Storage::delete(str_replace('/storage/', 'public/', $sermonVideo->video_url));

        $sermonVideo->delete();
        return redirect()->route('sermons.index')->with('success', 'Sermon video deleted successfully.');
    }


    public function videos()
    {
        $sermonVideos = SermonVideo::orderBy('created_at', 'desc')->paginate(12);
        return view('sermons.videos', compact('sermonVideos'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $sermonVideos = SermonVideo::where('title', 'LIKE', "%{$searchTerm}%")
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('sermons.videos', compact('sermonVideos'));
    }

}