<?php

namespace Tests\Feature\Backend\Backup;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadBackupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_run_the_list_command()
    {
        config()->set('backup.backup.destination.disks', [
            'local',
        ]);
        $this->artisan('backup:list')->assertExitCode(0);
    }

    /** @test */
    public function an_admin_can_access_the_backup_index_page()
    {
        $this->loginAsAdmin();

        $this->get('/backup')->assertStatus(200);
    }
}
