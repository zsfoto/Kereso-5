<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Category Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $keywords
 * @property string $keywords_slug
 * @property string|null $icon_type
 * @property string|null $icon
 * @property int $pos
 * @property bool $visible
 * @property int $company_count
 * @property string $action
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Company[] $companies
 */
class Category extends Entity
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
        'slug' => true,
        'description' => true,
        'keywords' => true,
        'keywords_slug' => true,
        'icon_type' => true,
        'icon' => true,
        'pos' => true,
        'visible' => true,
        'company_count' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
        'companies' => true,
    ];
}
