<?php


namespace Kevsuarez\LivewireNotiflix\Tests\Unit;

use Kevsuarez\LivewireNotiflix\Tests\TestCase;

class LivewireNotiflixTest extends TestCase
{
    /** @test */
    public function test_can_publishes_config_file()
    {
        $this->artisan('vendor:publish', [
            '--provider' => 'Kevsuarez\LivewireNotiflix\LivewireNotiflixServiceProvider',
            '--tag' => 'config',
        ]);

        $this->assertFileExists(config_path('livewire-notiflix.php'));
        $this->assertFileIsReadable(config_path('livewire-notiflix.php'));
        $this->assertFileEquals(config_path('livewire-notiflix.php'), __DIR__ . '/../../config/config.php');
        $this->assertTrue(unlink(config_path('livewire-notiflix.php')));
    }
}