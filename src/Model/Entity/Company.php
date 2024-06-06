<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Company Entity
 *
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $keywords_slug
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property bool $visible
 * @property int $pos
 * @property int $category_count
 * @property int $person_count
 * @property string $action
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Companyopening[] $companyopenings
 * @property \App\Model\Entity\Person[] $persons
 * @property \App\Model\Entity\Category[] $categories
 */
class Company extends Entity
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
        'city_id' => true,
        'name' => true,
        'slug' => true,
        'title' => true,
        'description' => true,
        'keywords' => true,
        'keywords_slug' => true,
        'email' => true,
        'web' => true,
        'phone' => true,
        'address' => true,
        'visible' => true,
        'pos' => true,
        'category_count' => true,
        'person_count' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
        'city' => true,
        'companyopenings' => true,
        'persons' => true,
        'categories' => true,
        'latitude' => true,
        'longitude' => true,
        'setup_max_distance' => true,
    ];
	
}
