<?php

namespace App\Services;

use App\Repositories\KrakenRepository;
use App\Kraken;

class KrakenService extends BaseService
{

    /**
     * Constructor
     * @method __construct
     * @param  KrakenRepository $krakenRepository [description]
     */
    public function __construct(KrakenRepository $krakenRepository) 
    {
        $this->repo = $krakenRepository;
    }

    /**
     * get all krakens
     * @method all
     * @return array [description]
     */
    public function all()
    {
        $result = json_decode($this->repo->all());
        $krakens = [];
        if(isset($result->success) && $result->success) {
            $data = $result->data;
            foreach ($data as $key => $kraken) {
                $krakens[] = new Kraken($kraken);
            }
        }
        return $krakens;
        
    }

    /**
     * [createKraken description]
     * @method createKraken
     * @param  array       $inputs [description]
     * @return Object               [description]
     */
    public function createKraken($inputs)
    {
        $response = json_decode($this->repo->createKraken($inputs));
        return $response;
    }

    /**
     * [addTentacle description]
     * @method addTentacle
     * @param  array      $inputs [description]
     * @return Object               [description]
     */
    public function addTentacle($inputs)
    {
        $response = json_decode($this->repo->addTentacle($inputs));
        return $response;
    }

    /**
     * [addPower description]
     * @method addPower
     * @param  array   $inputs [description]
     * @return Object               [description]
     */
    public function addPower($inputs)
    {
        $response = json_decode($this->repo->addPower($inputs));
        return $response;
    }

    /**
     * [deleteTentacle description]
     * @method deleteTentacle
     * @param  int         $id [description]
     * @return Object             [description]
     */
    public function deleteTentacle($id)
    {
        $response = json_decode($this->repo->deleteTentacle($id));
        return $response;
    }

    /**
     * [changeCurrentKrakenIndex description]
     * @method changeCurrentKrakenIndex
     * @param  int                   $index [description]
     * @return null                          [description]
     */
    public function changeCurrentKrakenIndex($index)
    {
        \Session::put("currentKraken", $index);
    }

    /**
     * [getCurrentKrakenIndex description]
     * @method getCurrentKrakenIndex
     * @return int                [description]
     */
    public function getCurrentKrakenIndex()
    {
        if(\Session::has("currentKraken")) {
            return \Session::get("currentKraken");
        } 
        /**
         * the first
         */
        return 0;
    }

    public function getCurrentKraken($krakens)
    {
        if(count($krakens) > 0) {
            return $krakens[$this->getCurrentKrakenIndex()];
        }
    }
}