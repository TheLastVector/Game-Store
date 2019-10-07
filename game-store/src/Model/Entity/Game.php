<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Game Entity
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $number_of_players
 * @property string $description
 * @property int $release_date
 *
 * @property \App\Model\Entity\Platform[] $platforms
 * @property \App\Model\Entity\Tag[] $tags
 * @property \App\Model\Entity\User[] $users
 */
class Game extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'price' => true,
        'number_of_players' => true,
        'description' => true,
        'release_date' => true,
        'platforms' => true,
        'tags' => true,
        'users' => true
    ];
}
