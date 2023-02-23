<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'user_type' => 'Lorem ip',
                'status' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-01-30 09:54:21',
                'modified_date' => '2023-01-30 09:54:21',
            ],
        ];
        parent::init();
    }
}
