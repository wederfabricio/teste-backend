<?php

namespace App\Console\Commands;

use App\Services\FilmService;
use App\Services\PeopleService;
use Illuminate\Console\Command;

class ApiCrawl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api Crawl';

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
     * @return int
     */
    public function handle()
    {
        echo "Obtendo novos filmes \n";
        $filmService = new FilmService;
        $filmService->getFilmData();
        echo "Obtendo novos personagens \n";
        $peopleService = new PeopleService;
        $peopleData = $peopleService->getPeopleData();
        $filmService->attachPeople($peopleData);
        echo "Vinculando os filmes aos personagens \n";
        return 0;
    }
}
