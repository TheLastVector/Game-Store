<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'username' => 'Administrator',
                'password' => '$2y$10$ZUyMzG8WQOV/1HgyQUJ3UOtMc7gQnanSB8fjR6A9My6NLYGT5ekkq',
                'first_name' => 'André',
                'last_name' => 'Pilon',
                'email' => 'admin@hotmail.com',
                'phone' => '1231231234',
                'address' => '123 rue Deladmin',
                'language_id' => '1',
                'role_id' => '1',
                'created' => '2019-10-07',
                'modified' => '2019-10-09',
            ],
            [
                'id' => '2',
                'username' => 'Staff',
                'password' => '$2y$10$/c4lBiD2Cjf2mUHPijFIDO2euLV8CkRC.xChzd1mzbe7BbyaIZT7S',
                'first_name' => 'Annie',
                'last_name' => 'Varsaire',
                'email' => 'staff@hotmail.com',
                'phone' => '1231231234',
                'address' => '123 rue Dustaff',
                'language_id' => '1',
                'role_id' => '2',
                'created' => '2019-10-07',
                'modified' => '2019-10-09',
            ],
            [
                'id' => '3',
                'username' => 'Client',
                'password' => '$2y$10$b4eM7b8U89cU16D.S859U.Gr5tX2u8bIzh3HQEdqd1LyCtSnRZ79e',
                'first_name' => 'Broco',
                'last_name' => 'Lee',
                'email' => 'client@hotmail.com',
                'phone' => '1231231234',
                'address' => '123 rue Duclient',
                'language_id' => '1',
                'role_id' => '3',
                'created' => '2019-10-08',
                'modified' => '2019-10-08',
            ],
            [
                'id' => '4',
                'username' => 'test',
                'password' => '$2y$10$wMfGV0tddM7qmZg9OEGCTeLcx1TSUwo8.Km3haIRmmgamurKpIcDW',
                'first_name' => 'test',
                'last_name' => 'test',
                'email' => 'test@hotmail.com',
                'phone' => '5678949674',
                'address' => 'This is a test',
                'language_id' => '1',
                'role_id' => '3',
                'created' => '2019-10-12',
                'modified' => '2019-10-12',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
