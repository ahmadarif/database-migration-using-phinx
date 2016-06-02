<?php

use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Post pertama',
                'content' => 'Post pertama menggunakan seed di phinx',
                'created' => date('Y:m:d H:i:s')
            ],
            [
                'title' => 'Post kedua',
                'content' => 'Post kedua menggunakan seed di phinx',
                'created' => date('Y:m:d H:i:s')
            ]
        ];

        $this->insert('post', $data);
    }
}
