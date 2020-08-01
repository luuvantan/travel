<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use DB;
use App\Helpers\Crawler;

class CrawlData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $test = new Crawler();
        list($t, $img) = $test->Crawls("https://blogyeuphuot.com/kinh-nghiem-phuot-ta-xua-san-may-thoa-suc-check-in-song-ao.html");
        DB::table('posts')->insert([
            'user_id' => 1,
            'name' => 'Bãi Đông',
            'category_id' => 4,
            'provincial_id' => 26,
            'title' => 'Kinh nghiệm du lịch Bãi Đông Thanh Hóa 2020',
            'content' => $t,
            'url_img' => $img
        ]);
    }
}
