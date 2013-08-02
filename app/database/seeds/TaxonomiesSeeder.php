<?php
class TaxonomiesSeeder extends Seeder
{
    public function run()
    {
        $taxonomy = array();
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Wireless Headset',
            'user_id' => 1,
            'status' => true,
            'created_at' => $date->modify('-1 day +1 hour'),
            'updated_at' => $date->modify('-1 day +1 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Multimedia Headset',
            'user_id' => 1,
            'status' => true,
            'created_at' => $date->modify('-1 day +2 hour'),
            'updated_at' => $date->modify('-1 day +2 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Gaming Headset',
            'user_id' => 1,
            'status' => true,
            'created_at' => $date->modify('-1 day +3 hour'),
            'updated_at' => $date->modify('-1 day +3 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Earphone / Earloop',
            'user_id' => 1,
            'status' => true,
            'created_at' => $date->modify('-1 day +4 hour'),
            'updated_at' => $date->modify('-1 day +4 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Accessories / Microphone',
            'user_id' => 1,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );

        // Delete all the posts comments
        DB::table('taxonomies')->truncate();

        // Insert the posts comments
        Taxonomy::insert($taxonomy);
    }
}