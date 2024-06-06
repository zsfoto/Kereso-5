<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * CitiesFixture
 */
class CitiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'county_id' => 1,
                'zip' => '',
                'name' => 'Lorem ipsum dolor sit amet',
                'latitude' => 'Lorem ipsum dolor ',
                'longitude' => 'Lorem ipsum dolor ',
                'pos' => 1,
                'visible' => 1,
                'company_count' => 1,
                'action' => '',
                'created' => '2024-06-05 11:59:44',
                'modified' => '2024-06-05 11:59:44',
            ],
        ];
        parent::init();
    }
}
