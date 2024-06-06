<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Phone Entity
 *
 * @property int $id
 * @property int $person_id
 * @property string|null $phone_country
 * @property string|null $phone_area
 * @property string|null $phone_number
 * @property string|null $phone_annex
 * @property int $pos
 * @property bool $visible
 * @property string $action
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class Phone extends Entity
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
        'person_id' => true,
        'phone_country' => true,
        'phone_area' => true,
        'phone_number' => true,
        'phone_annex' => true,
        'pos' => true,
        'visible' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
    ];
}
