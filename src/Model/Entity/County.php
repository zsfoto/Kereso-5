<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * County Entity
 *
 * @property int $id
 * @property string $name
 * @property string $shortname
 * @property string $capitalcity
 * @property string $region
 * @property int $pos
 * @property bool $visible
 * @property int $city_count
 * @property string $action
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\City[] $cities
 */
class County extends Entity
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
        'name' => true,
        'shortname' => true,
        'capitalcity' => true,
        'region' => true,
        'pos' => true,
        'visible' => true,
        'city_count' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
        'cities' => true,
    ];
}
