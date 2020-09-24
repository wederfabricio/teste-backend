<?php

namespace App\Services;

use Exception;
use App\People;
use Illuminate\Database\Eloquent\Collection;

class PeopleService extends GetJsonDataService
{
    const URL = 'https://ghibliapi.herokuapp.com/people/'; 

    public function getPeopleData() 
    {
        $people = new People();
        $data = $this->getData(self::URL, array_merge($people->getFillable(), [ 'films' ]));

        try {
            $dataClone = (array) $data;
            $data = array_map(function($arr) {
                $arr['code'] = $arr['id'];
                unset($arr['id']);
                unset($arr['films']);
                return $arr;
            }, $data);
            $people->insert($data);
        } catch(Exception $e) { 
            //Pessoa já existe
        }      

        return $dataClone;
    }

    public static function get($filter, $order, $sort): Collection
    {
        $qb = People::with('films:films.id,title,release_date,rt_score')     
        ->select('people.id', 'name', 'age')
        ->orderBy( ($order ? $order : 'name'), ($sort ? $sort : 'ASC') );

        if ( !is_null($filter) ) {
            $qb->where('name', 'LIKE', '%' . $filter . '%');
        }

        return $qb->get();
    }
}