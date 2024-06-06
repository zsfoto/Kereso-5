<?php
declare(strict_types=1);

namespace App\Controller\Component;


use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Datasource\FactoryLocator;			// https://stackoverflow.com/questions/63053131/how-to-use-tableregistry-in-cakephp-component
use Cake\Http\Exception\NotFoundException;

/**
 * Setup component
 */
class SetupComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];
	
	
    public function getSetup($user_id, $name)
    {
		//https://book.cakephp.org/5/en/orm/table-objects.html#using-the-tablelocator
		$setupTable = FactoryLocator::get('Table')->get('Setups');
		$setupEntity = $setupTable->find('all')->where(['user_id' => $user_id, 'name' => $name])->first();
		
		switch($setupEntity->type){
			case 'char':
				$setup = $setupEntity !== null ? (string) $setupEntity->value : null;
				break;
			case 'string':
				$setup = $setupEntity !== null ? (string) $setupEntity->value : null;
				break;
			case 'text':
				$setup = $setupEntity !== null ? (string) $setupEntity->value : null;
				break;
			case 'integer':
				$setup = $setupEntity !== null ? (integer) $setupEntity->value : null;
				break;
			case 'real':
				$setup = $setupEntity !== null ? (float) $setupEntity->value : null;
				break;
			case 'json':
				$setup = $setupEntity !== null ? json_decode($setupEntity->value) : null;
				break;
			default:
				$setup = $setupEntity !== null ? $setupEntity : null;
		}
		
        return $setup;
    }

    public function setSetup($user_id, $name, $value, $type)
    {
		//$setupTable = FactoryLocator::get('Table')->get('Setups');
		//$setupEntity = $setupTable->find('all')->where(['user_id' => $user_id, 'name' => $name])->first();
		//$setup = $setupEntity !== null ? json_decode($setupEntity->value) : null;
		//
		//	$data = [
		//		'user_id' => $user_id,
		//		'name' => $name,
		//		'value' => $value,
		//	];
		//	
		//$setupEntity = $setupTable->find('all')->where(['user_id' => $user_id, 'name' => $name])->first();
		//
		//$setup = $setupEntity !== null ? json_decode($setupEntity->value) : null;
        //return $setup;
    }

}
