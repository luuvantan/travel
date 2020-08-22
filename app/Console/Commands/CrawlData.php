<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use DB;
use App\Helpers\Crawler;
use Illuminate\Support\Str;

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
        // dd(random_int(12, 40));
        $t="https://blogyeuphuot.com/kinh-nghiem-phuot-chung/page/3";
        $test = new Crawler();
        // list($t, $img) = 
        $test->getUrlCrawl($t);
        // DB::table('posts')->insert([
        //     'user_id' => 22,
        //     'name' => 'Kinh nghiệm phượt dịp lễ 30-4',
        //     'category_id' => 2,
        //     'provincial_id' => 65,
        //     'title' => '30-4 nên đi phượt ở đâu? Kinh nghiệm phượt dịp lễ 30-4',
        //     'content' => $t,
        //     'url_img' => $img
        // ]);
    }
}
