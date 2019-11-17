<?php
use Migrations\AbstractSeed;

/**
 * Platforms seed.
 */
class PlatformsSeed extends AbstractSeed
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
                'name' => 'Personal computer',
            ],
            [
                'id' => '2',
                'name' => 'Mobile',
            ],
            [
                'id' => '3',
                'name' => 'Microsoft - Xbox',
            ],
            [
                'id' => '4',
                'name' => 'Sony - Playstation',
            ],
        ];

        $table = $this->table('platforms');
        $table->insert($data)->save();
    }
}
