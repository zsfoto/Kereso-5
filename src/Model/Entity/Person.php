<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Person Entity
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $slug
 * @property string|null $title
 * @property string|null $description
 * @property string|null $email
 * @property string|null $email2
 * @property string $keywords
 * @property string $keywords_slug
 * @property int $pos
 * @property bool $visible
 * @property string $action
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Email[] $emails
 * @property \App\Model\Entity\Personopening[] $personopenings
 * @property \App\Model\Entity\Phone[] $phones
 */
class Person extends Entity
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
        'slug' => true,
        'title' => true,
        'description' => true,
        'email' => true,
        'email2' => true,
        'keywords' => true,
        'keywords_slug' => true,
        'pos' => true,
        'visible' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'emails' => true,
        'personopenings' => true,
        'phones' => true,
    ];
}
