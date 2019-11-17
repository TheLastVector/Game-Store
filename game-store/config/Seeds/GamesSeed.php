<?php
use Migrations\AbstractSeed;

/**
 * Games seed.
 */
class GamesSeed extends AbstractSeed
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
                'name' => 'Minecraft',
                'price' => '25',
                'number_of_players' => '10',
                'description' => 'A survival game that you can play with your friends and have fun.',
                'release_date' => '2007',
            ],
        ];

        $table = $this->table('games');
        $table->insert($data)->save();
    }
}
