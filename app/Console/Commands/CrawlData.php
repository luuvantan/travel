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
        $t = $test->Crawls("https://blogyeuphuot.com/chia-se-kinh-nghiem-du-lich-tay-nguyen-cuc-day-du-tu-a-z.html");
        DB::table('posts')->insert([
            'user_id' => 1,
            'name' => 'hihi',
            'category_id' => 1,
            'provincial_id' => 1,
            'title' => 'aaa',
            'content' => $t
        ]);
    }
}
