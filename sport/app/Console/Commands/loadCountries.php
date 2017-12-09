<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Country;
use DB;

class loadCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'country:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load countries into db';

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
        DB::table("countries")->truncate();
        $path = storage_path("countries.json");
        $datas = file_get_contents($path);
        $datas_json = json_decode($datas);
        foreach ($datas_json as $value)
        {
            $country = new Country();
            $country->flag = "/img/flags/".$value->flag_128;
            $country->country_name = $value->name;
            $country->save();
        }
    }
}
