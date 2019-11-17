<?php
use Migrations\AbstractSeed;

/**
 * Tags seed.
 */
class TagsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Action',
            ],
            [
                'id' => '2',
                'name' => 'Adventure',
            ],
            [
                'id' => '3',
                'name' => 'Strategy',
            ],
            [
                'id' => '4',
                'name' => 'RPG',
            ],
            [
                'id' => '5',
                'name' => 'Horror',
            ],
            [
                'id' => '6',
                'name' => 'Sci-fi',
            ],
            [
                'id' => '7',
                'name' => 'Fantasy',
            ],
            [
                'id' => '8',
                'name' => 'Arcade',
            ],
            [
                'id' => '9',
                'name' => 'War',
            ],
            [
                'id' => '10',
                'name' => 'Romance',
            ],
            [
                'id' => '11',
                'name' => 'Indie',
            ],
        ];

        $table = $this->table('tags');
        $table->insert($data)->save();
    }
}
