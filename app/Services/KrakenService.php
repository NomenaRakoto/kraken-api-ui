<?php

namespace App\Services;

use App\Repositories\KrakenRepository;
use App\Kraken;
use Illuminate\Http\Request;

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
     * [all description]
     * @method all
     * @param  Request $request [description]
     * @return array [description]
     */
    public function all(Request $request)
    {
        $result = json_decode($this->repo->all());
        $krakens = [];
        if(isset($result->success) && $result->success) {
            $data = $result->data;
            foreach ($data as $key => $kraken) {
                $krakens[] = new Kraken($kraken);
            }
        } else {
            $request->session()->flash("error", __('texts.error_connexion_api'));
        }
        return $krakens;
        
    }

    /**
     * [createKraken description]
     * @method createKraken
     * @param  Request       $request [description]
     */
    public function createKraken(Request $request)
    {
        $result = json_decode($this->repo->createKraken($request->all()));
        if(isset($result->success) && $result->success) {
            $request->session()->flash('success', $result->message);
        } else {
            $request->session()->flash('error', $result->message);
        }
    }

    /**
     * [addTentacle description]
     * @method addTentacle
     * @param  Request      $request [description]
     */
    public function addTentacle(Request $request)
    {
        $result = json_decode($this->repo->addTentacle($request->all()));
        if(isset($result->success) && $result->success) {
            $request->session()->flash('success', $result->message);
        } else {
            $request->session()->flash('error', $result->message);
        }
    }

    /**
     * [addPower description]
     * @method addPower
     * @param  Request   $request [description]
     */
    public function addPower(Request $request)
    {
        $result = json_decode($this->repo->addPower($request->all()));
        if(isset($result->success) && $result->success) {
            $request->session()->flash('success', $result->message);
        } else {
            $request->session()->flash('error', $result->message);
        }
    }

    /**
     * [deleteTentacle description]
     * @method deleteTentacle
     * @param  int         $id [description]
     */
    public function deleteTentacle($id, Request $request)
    {
        $result = json_decode($this->repo->deleteTentacle($id));
        if(isset($result->success) && $result->success) {
            $request->session()->flash('success', $result->message);
        } else {
            $request->session()->flash('error', $result->message);
        }
    }

    /**
     * [changeCurrentKrakenIndex description]
     * @method changeCurrentKrakenIndex
     * @param  int                   $index   [description]
     * @param  Request                  $request [description]
     * @return null                            [description]
     */
    public function changeCurrentKrakenIndex($index, Request $request)
    {
        $request->session()->put("currentKraken", $index);
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

    /**
     * [getCurrentKraken description]
     * @method getCurrentKraken
     * @param  array           $krakens [description]
     * @return Kraken                    [description]
     */
    public function getCurrentKraken($krakens)
    {
        if(count($krakens) > 0) {
            return $krakens[$this->getCurrentKrakenIndex()];
        }
    }
}