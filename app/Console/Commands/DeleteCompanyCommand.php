<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class DeleteCompanyCommand extends Command
{

    protected $signature = 'remove:company';

    protected $description = 'Deletes company from database';

    public function handle()
    {
        
        $name = $this->ask('Write tha name of the company you want to delete');

        $company = Company::where('name', $name)->get()->first();

        if($company):

            $company->delete();
            $this->warn($name.' was deleted from the database');

        else:

            $this->info('No company was deleted from the database');
        
        endif;
    }

}
