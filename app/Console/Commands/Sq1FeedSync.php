<?php

namespace App\Console\Commands;

use App\Models\FeedPost;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Sq1FeedSync extends Command
{

    const API_URL = 'https://candidate-test.sq1.io/api.php';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sq1:feed:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync articles from https://candidate-test.sq1.io/api.php';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {

            $response = Http::get(self::API_URL);

            if (!$response || !$response->ok()) {
                Log::error('Unable to fetch articles');
                return;
            }

            $data = $response->json();
            if ($data['status'] !== 'ok') {
                Log::error('Unable to fetch articles');
                return;
            }

            if(!is_array($data['articles'])){
                return;
            }

            foreach ($data['articles'] as $article) {

                $feedPost = FeedPost::where('feed_type', FeedPost::FEED_TYPE_SQ1)->where('feed_id', $article['id'])->first();

                if ($feedPost) {
                    $post = $feedPost->post;
                } else {
                    $post = new Post();
                }

                $post->user_id = 1;
                $post->title = $article['title'];
                $post->description = $article['description'];
                $post->publication_date = $article['publishedAt'];
                $post->save();

                if (!$feedPost) {
                    $post->feed()->create(['feed_type' => FeedPost::FEED_TYPE_SQ1, 'feed_id' => $article['id']]);
                }

            }

        } catch (\Exception $e) {
            Log::error('ERROR:' . $e->getMessage());
        }
    }
}
