<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Companyopening Entity
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $open_from
 * @property string $open_to
 * @property string|null $open_comment
 * @property int $pos
 * @property bool $visible
 * @property string $action
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Company $company
 */
class Companyopening extends Entity
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
        'company_id' => true,
        'name' => true,
        'open_from' => true,
        'open_to' => true,
        'open_comment' => true,
        'pos' => true,
        'visible' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
    ];
}
