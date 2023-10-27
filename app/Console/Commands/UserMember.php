<?php

namespace App\Console\Commands;

use App\Models\Group;
use App\Models\User;
use Illuminate\Console\Command;

class UserMember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:member';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавляет пользователя в группу';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->ask('User ID:');
        $groupId = $this->ask('Group ID:');

        $user = User::findOrFail($userId);
        $group = Group::findOrFail($groupId);

        if(!$user->active){
            $user->update(['active' => true]);
            $this->info('Пользователь активирован');
        }

        $user->groups()->attach($group);

        $this->info("Пользователь $user->name добавлен в группу $group->name");
    }
}
