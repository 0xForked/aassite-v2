<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * Default user data level root
     *
     */
    public function run()
    {
        $user_seed = [
            [
                'unique_id' => 'adXbw3jensZlsSur0fYkTIfpDPrvLgDK',
                'fullname' => 'Agus Adhi Sumitro',
                'username' => 'aasumitro',
                'phone' => '+6282271115593',
                'email' => 'aasumitro@gmail.com',
                'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
                'status_acc' => '1'
            ],
        ];

        $setting_seed = [
            [
                'facebook' => 'aasumitro.id',
                'twitter' => 'aasumitro',
                'linkedin' => 'aasumitro' ,
                'github'=> 'aasumitro',
                'email' => 'aasumitro@merahputih.id',
                'phone' => '082271115593',
                'address' => 'Manado, Sulawesi Utara.',
                'site_url'=> 'https://aasumitro.id',
                'site_name' => 'aasumitro',
                'site_description' => 'Agus Adhi Sumitro Personal Site',
                'site_email' => 'hello@aasumitro.id',
                'status' => '0',
            ],
        ];

        $user = $this->table('users');
        $user->insert($user_seed)
             ->save();

        $setting = $this->table('settings');
        $setting->insert($setting_seed)
             ->save();

    }
}
