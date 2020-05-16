<?php

namespace App\Http\Controllers;
use App\Services\KrakenService;

use Illuminate\Http\Request;

class KrakenController extends Controller
{
	protected $krakenService;

	/**
	 * Constructor
	 * @method __construct
	 * @param  KrakenService $krakenService [description]
	 */
	public function __construct(KrakenService $krakenService)
	{
		$this->krakenService = $krakenService;
	}

    /**
	 * home page
	 * @method index
	 * @param  Request $Request [description]
	 * @return views          [description]
	 */
    public function index(Request $request)
    {
    	$krakens = $this->krakenService->all($request);
    	$currentKraken = $this->krakenService->getCurrentKraken($krakens);
    	return view("home")->with(['krakens' => $krakens, 'currentKraken' => $currentKraken]);
    }


    /**
     * [createKraken description]
     * @method createKraken
     * @param  Request      $request [description]
     * @return [type]                [description]
     */
    public function createKraken(Request $request)
    {
    	$this->krakenService->createKraken($request);
    	return redirect()->back();
    }

    /**
     * [addTentacle description]
     * @method addTentacle
     * @param  Request     $request [description]
     */
    public function addTentacle(Request $request)
    {
    	$this->krakenService->addTentacle($request);
    	return redirect()->back();
    }

    /**
     * [addPower description]
     * @method addPower
     * @param  Request  $request [description]
     */
    public function addPower(Request $request) {
    	$this->krakenService->addPower($request);
    	return redirect()->back();
    }

    /**
     * [deleteTentacle description]
     * @method deleteTentacle
     * @param  int         $id      [description]
     * @param  Request        $request [description]
     * @return [type]                  [description]
     */
    public function deleteTentacle($id, Request $request) {
    	$this->krakenService->deleteTentacle($id, $request);
    	return redirect()->back();
    }

    /**
     * [changeCurrent description]
     * @method changeCurrent
     * @param  int        $index   [description]
     * @param  Request       $request [description]
     * @return [type]                 [description]
     */
    public function changeCurrent($index, Request $request)
    {
    	$this->krakenService->changeCurrentKrakenIndex($index, $request);
    	return redirect()->back();
    }
}
