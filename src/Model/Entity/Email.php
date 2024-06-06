<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Email Entity
 *
 * @property int $id
 * @property int $person_id
 * @property string|null $name
 * @property string $email
 * @property string $action
 * @property int $pos
 * @property bool $visible
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class Email extends Entity
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
        'name' => true,
        'email' => true,
        'action' => true,
        'pos' => true,
        'visible' => true,
        'created' => true,
        'modified' => true,
    ];
}
