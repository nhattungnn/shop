<?php

use Illuminate\Database\Seeder;

class MemberSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Member::create([
           'name' => '123',
           'description' => '456',
           'content' => '789'
        ]);
    }
}
