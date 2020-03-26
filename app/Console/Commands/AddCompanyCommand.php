<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    protected $description = 'Adds a new company';

    public function handle()
    {

        $name = $this->ask('What is company\'s name?');

        Company::create([
            'name' => $name
        ]);

        return $this->info('New company was added');
    }
}
