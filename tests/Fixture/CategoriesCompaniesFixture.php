<?php
declare(strict_types=1);

namespace App\Test\Fixture;


use Cake\TestSuite\Fixture\TestFixture;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * CategoriesCompaniesFixture
 */
class CategoriesCompaniesFixture extends TestFixture
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
                'category_id' => 1,
                'company_id' => 1,
                'pos' => 1,
                'visible' => 1,
                'action' => '',
                'created' => '2024-06-05 11:59:44',
                'modified' => '2024-06-05 11:59:44',
            ],
        ];
        parent::init();
    }
}
