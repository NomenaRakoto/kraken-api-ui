<?php

namespace App\Repositories;
use App\APIConsumer\KrakenAPIConsumer;
/**
 * Class to manage kraken 
 */
class KrakenRepository
{

    protected $api;

    /**
     * Constructor
     * @method __construct
     * @param  Kraken      $kraken [description]
     */
	public function __construct(KrakenAPIConsumer $kraken)
	{
		$this->api = $kraken;
	}

    /**
     * [all description]
     * @method all
     * @return string [description]
     */
    public function all()
    {
        return $this->api->getKrakens();
    }

    /**
     * [createKraken description]
     * @method createKraken
     * @param  array       $inputs [description]
     * @return string               [description]
     */
    public function createKraken($inputs)
    {
        return $this->api->createKraken($inputs);
    }

    /**
     * [addTentacle description]
     * @method addTentacle
     * @param  array      $inputs [description]
     * @return string               [description]
     */
    public function addTentacle($inputs)
    {
        return $this->api->addTentacle($inputs);
    }

    /**
     * [addPower description]
     * @method addPower
     * @param  int   $inputs [description]
     * @return string               [description]
     */
    public function addPower($inputs)
    {
        return $this->api->addPower($inputs);
    }

    /**
     * [deleteTentacle description]
     * @method deleteTentacle
     * @param  int         $id [description]
     * @return string            [description]
     */
    public function deleteTentacle($id)
    {
        return $this->api->deleteTentacle($id);
    }
}