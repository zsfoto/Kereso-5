<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * City Entity
 *
 * @property int $id
 * @property int $county_id
 * @property string $zip
 * @property string $name
 * @property string $latitude
 * @property string $longitude
 * @property int $pos
 * @property bool $visible
 * @property int $company_count
 * @property string $action
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\County $county
 * @property \App\Model\Entity\Company[] $companies
 */
class City extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'county_id' => true,
        'zip' => true,
        'name' => true,
        'latitude' => true,
        'longitude' => true,
        'pos' => true,
        'visible' => true,
        'company_count' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
        'county' => true,
        'companies' => true,
    ];

	protected function _getZipAndName()
	{
		return $this->_fields['zip'] . ' ' . $this->_fields['name'];
	}	

}
