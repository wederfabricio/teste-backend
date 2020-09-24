<?php

namespace App\Services;

use Exception;
use App\Film;
use App\People;

class FilmService extends GetJsonDataService
{
    const URL = 'https://ghibliapi.herokuapp.com/films/'; 

    public function getFilmData(): array
    {
        $film = new Film;
        $data = $this->getData(self::URL, $film->getFillable());

        try {
            $data = array_map(function($arr) {
                $arr['code'] = $arr['id'];
                unset($arr['id']);
                return $arr;
            }, $data);
            $film->insert($data);
        } catch(Exception $e) { 
            //Filme já existe
        }
        
        return $data;
    }

    public function attachPeople(array $peopleArray) {
        //TO DO: Em aplicações reais, o filme deve ser validado, tratar exceções
        foreach($peopleArray as $peopleData) {
            $peopleCode = $peopleData['id'];

            foreach($peopleData['films'] as $key => $film) {
                $filmCode = str_replace(self::URL, '', $film);

                if($filmCode !== '') {
                    $film = Film::where('code', $filmCode)->first();
                    $people = People::where('code', $peopleCode)->first();

                    if( !is_null($people) && !$film->people->contains($people->id) ) {
                        $film->people()->attach($people->id);
                    }
                    
                }
            }                
        }
    }
}