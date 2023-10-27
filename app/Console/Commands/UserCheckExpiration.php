<?php

namespace App\Console\Commands;

use App\Jobs\DeactivateUserJob;
use App\Mail\UserDetached;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class UserCheckExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:check_expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Исключает всех пользователей из групп, у которых expired_at меньше текущего момента времени';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rows = GroupUser::where('expired_at', '<', now())->get();

        if(count($rows) == 0){
            $this->info("Нет пользователей для исключения");
            exit;
        }

        foreach ($rows as $row){
            $row->user->groups()->detach($row->group);
            dispatch(new DeactivateUserJob($row->user));
            $this->warn($row->user->name);
            try {
                $data = [
                    'username' => $row->user['name'],
                    'groupname' => $row->group['name'],
                ];

                Mail::to($row->user['email'])->send(new UserDetached($data));
            }
            catch (\Exception $e){
                $this->info($e->getMessage());
            }
        }

        $this->info("Пользователи исключены");
    }
}
