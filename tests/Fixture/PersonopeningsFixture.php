<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * PersonopeningsFixture
 */
class PersonopeningsFixture extends TestFixture
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
                'person_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'open_from' => 'Lorem ipsum dolor ',
                'open_to' => 'Lorem ipsum dolor ',
                'open_comment' => 'Lorem ipsum dolor sit amet',
                'pos' => 1,
                'visible' => 1,
                'action' => '',
                'created' => '2024-06-05 11:59:45',
                'modified' => '2024-06-05 11:59:45',
            ],
        ];
        parent::init();
    }
}
