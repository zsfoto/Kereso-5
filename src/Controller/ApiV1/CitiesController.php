<?php
declare(strict_types=1);

namespace App\Controller\ApiV1;


use App\Controller\ApiV1\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 */
class CitiesController extends AppController
{

    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
		//$this->config['paginate_limit'] = 10;		
	}

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getGeoCoordinates($id = null, $hash = null)
    {
        $city = $this->Cities->get($id, contain: ['Counties', 'Companies']);        
		$coordinates = json_encode(['latitude' => $city->latitude, 'longitude' => $city->longitude]);		
		echo $coordinates;		
		die();
    }


}
