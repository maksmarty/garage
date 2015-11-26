<?php


class CarMakeRegionTableSeeder extends Seeder {

	public function run()
	{


        DB::table('make_region')->insert(array(
                array('name' => 'American',
                    'slug' => 'american',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ),
                array('name' => 'European',
                        'slug' => 'european',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ),
                array('name' => 'Asian',
                    'slug' => 'asian',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                )
            )
        );

	}

}