<?php
class TaxonomiesSeeder extends Seeder
{
    public function run()
    {
        // 主分類
        $taxonomy = array();
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Wireless Headset',
            'user_id' => 1,
            'parent_id' => 0,
            'status' => true,
            'created_at' => $date->modify('-1 day +1 hour'),
            'updated_at' => $date->modify('-1 day +1 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Multimedia Headset',
            'user_id' => 1,
            'parent_id' => 0,
            'status' => true,
            'created_at' => $date->modify('-1 day +2 hour'),
            'updated_at' => $date->modify('-1 day +2 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Gaming Headset',
            'user_id' => 1,
            'parent_id' => 0,
            'status' => true,
            'created_at' => $date->modify('-1 day +3 hour'),
            'updated_at' => $date->modify('-1 day +3 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Earphone / Earloop',
            'user_id' => 1,
            'parent_id' => 0,
            'status' => true,
            'created_at' => $date->modify('-1 day +4 hour'),
            'updated_at' => $date->modify('-1 day +4 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Accessories / Microphone',
            'user_id' => 1,
            'parent_id' => 0,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );

        // 次分類
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => '2.4GHz RF Headset',
            'user_id' => 1,
            'parent_id' => 1,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Bluetooth Headset',
            'user_id' => 1,
            'parent_id' => 1,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Multimedia Headset',
            'user_id' => 1,
            'parent_id' => 2,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Active Noise Cancellation Headphone',
            'user_id' => 1,
            'parent_id' => 2,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Hi Fi Audio Headphone',
            'user_id' => 1,
            'parent_id' => 2,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'USB Stereo Headset',
            'user_id' => 1,
            'parent_id' => 2,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Neckband Headset/Headphone',
            'user_id' => 1,
            'parent_id' => 2,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Real 5.1ch / 7.1ch Surrounding Headset',
            'user_id' => 1,
            'parent_id' => 3,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Virtual 7.1ch Surrounding Headset',
            'user_id' => 1,
            'parent_id' => 3,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Console Gaming Headset (PS3, Xbox, PC)',
            'user_id' => 1,
            'parent_id' => 3,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'USB Bass Bibration / ENC/EQ Headset',
            'user_id' => 1,
            'parent_id' => 3,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Smart Phone / Tablet',
            'user_id' => 4,
            'parent_id' => 3,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Earbud/Earloop',
            'user_id' => 4,
            'parent_id' => 3,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'USB Sound Adaptor',
            'user_id' => 5,
            'parent_id' => 3,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Calbe Adaptor',
            'user_id' => 5,
            'parent_id' => 3,
            'status' => true,
            'created_at' => $date->modify('-1 day +5 hour'),
            'updated_at' => $date->modify('-1 day +5 hour'),
        );
        $date = new DateTime;
        $taxonomy[] = array(
            'name'    => 'Internet Microphone',
            'user_id' => 5,
            'parent_id' => 3,
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
