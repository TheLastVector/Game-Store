<?php
use Migrations\AbstractSeed;

/**
 * Languages seed.
 */
class LanguagesSeed extends AbstractSeed
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
                'name' => 'French',
                'created' => '2019-10-02',
                'modified' => '2019-10-02',
            ],
            [
                'id' => '2',
                'name' => 'English',
                'created' => '2019-10-02',
                'modified' => '2019-10-02',
            ],
        ];

        $table = $this->table('languages');
        $table->insert($data)->save();
    }
}
