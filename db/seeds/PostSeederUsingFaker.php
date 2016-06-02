<?php

use Phinx\Seed\AbstractSeed;

class PostSeederUsingFaker extends AbstractSeed
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
        $faker = Faker\Factory::create();

        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[$i] = [
                'title' => $faker->sentence(rand(3, 7)),
                'content' => $faker->paragraph(rand(3, 6)),
                'created' => date('Y:m:d H:i:s')
            ];
        }

        $this->insert('post', $data);
    }
}
