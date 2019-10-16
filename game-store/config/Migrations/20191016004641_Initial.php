<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('files')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('path', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('status', 'boolean', [
                'comment' => '1 = Active, 0 = Inactive',
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('files_games')
            ->addColumn('game_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'file_id',
                ]
            )
            ->addIndex(
                [
                    'game_id',
                ]
            )
            ->create();

        $this->table('games')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('price', 'double', [
                'default' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 4,
            ])
            ->addColumn('number_of_players', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 1000,
                'null' => false,
            ])
            ->addColumn('release_date', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('games_platforms')
            ->addColumn('game_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('platform_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'game_id',
                ]
            )
            ->addIndex(
                [
                    'platform_id',
                ]
            )
            ->create();

        $this->table('games_tags')
            ->addColumn('game_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('tag_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'game_id',
                ]
            )
            ->addIndex(
                [
                    'tag_id',
                ]
            )
            ->create();

        $this->table('games_users')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('game_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('quantity', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'game_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('i18n')
            ->addColumn('locale', 'string', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('field', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'locale',
                    'model',
                    'foreign_key',
                    'field',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'model',
                    'foreign_key',
                    'field',
                ]
            )
            ->create();

        $this->table('languages')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('created', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('platforms')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->create();

        $this->table('roles')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('tags')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->create();

        $this->table('users')
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('address', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => false,
            ])
            ->addColumn('language_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => '3',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'language_id',
                ]
            )
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->create();

        $this->table('files_games')
            ->addForeignKey(
                'file_id',
                'files',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'game_id',
                'games',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('games_platforms')
            ->addForeignKey(
                'game_id',
                'games',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'platform_id',
                'platforms',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('games_tags')
            ->addForeignKey(
                'game_id',
                'games',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'tag_id',
                'tags',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('games_users')
            ->addForeignKey(
                'game_id',
                'games',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'language_id',
                'languages',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('files_games')
            ->dropForeignKey(
                'file_id'
            )
            ->dropForeignKey(
                'game_id'
            )->save();

        $this->table('games_platforms')
            ->dropForeignKey(
                'game_id'
            )
            ->dropForeignKey(
                'platform_id'
            )->save();

        $this->table('games_tags')
            ->dropForeignKey(
                'game_id'
            )
            ->dropForeignKey(
                'tag_id'
            )->save();

        $this->table('games_users')
            ->dropForeignKey(
                'game_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('users')
            ->dropForeignKey(
                'language_id'
            )
            ->dropForeignKey(
                'role_id'
            )->save();

        $this->table('files')->drop()->save();
        $this->table('files_games')->drop()->save();
        $this->table('games')->drop()->save();
        $this->table('games_platforms')->drop()->save();
        $this->table('games_tags')->drop()->save();
        $this->table('games_users')->drop()->save();
        $this->table('i18n')->drop()->save();
        $this->table('languages')->drop()->save();
        $this->table('platforms')->drop()->save();
        $this->table('roles')->drop()->save();
        $this->table('tags')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
