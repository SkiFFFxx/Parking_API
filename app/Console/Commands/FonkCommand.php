<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Worker;
use Illuminate\Console\Command;

class FonkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mine:worker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'some develop';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

//        $this->preparedData();
//        $this->prepareManyToMany();




        return 0;

    }

    private function preparedData()
    {
        Client::create(['name' => 'Bob']);
        Client::create(['name' => 'John']);
        Client::create(['name' => 'Elena']);

        $department1 = Department::create([
            'title' => 'IT',
        ]);

        $department2 = Department::create([
            'title' => 'Analytics',
        ]);



        $position1 = Position::create([
            'title' => 'Developer',
            'department_id' => $department1->id,
        ]);

        $position2 = Position::create([
            'title' => 'Manager',
            'department_id' => $department1->id,
        ]);

        $position3 = Position::create([
            'title' => 'Designer',
            'department_id' => $department1->id,
        ]);


        $workerData1 = [
            'name' => 'lev',
            'surname' => 'kim',
            'email' => 'levkim@mail.ru',
            'position_id' => $position1->id,
            'age' => 25,
            'description' => 'im lion',
            'is_married' => false,
        ];

        $workerData2 = [
            'name' => 'Arina',
            'surname' => 'Cher',
            'email' => 'ari@mail.ru',
            'position_id' => $position1->id,
            'age' => 25,
            'description' => 'im arina',
            'is_married' => false,
        ];

        $workerData3 = [
            'name' => 'Kate',
            'surname' => 'Kurai',
            'email' => 'Kate@mail.ru',
            'position_id' => $position2->id,
            'age' => 33,
            'description' => 'im kate',
            'is_married' => true,
        ];

        $workerData4 = [
            'name' => 'Fedor',
            'surname' => 'Soev',
            'email' => 'Fed@mail.ru',
            'position_id' => $position1->id,
            'age' => 43,
            'description' => 'im fedor',
            'is_married' => true,
        ];

        $workerData5 = [
            'name' => 'Oleg',
            'surname' => 'Mongol',
            'email' => 'Mongol@mail.ru',
            'position_id' => $position3->id,
            'age' => 33,
            'description' => 'im mongol',
            'is_married' => true,
        ];

        $workerData6 = [
            'name' => 'Dave',
            'surname' => 'Poll',
            'email' => 'Dave@mail.ru',
            'position_id' => $position3->id,
            'age' => 28,
            'description' => 'im designer dave',
            'is_married' => false,
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);


        $profileData1 = [
            'city' => 'Astana',
            'skill' => 'Middle',
            'experience' => '3',
            'finished_study_at' => '2024-06-01',
        ];

        $profileData2 = [
            'city' => 'Moscow',
            'skill' => 'Junior',
            'experience' => '2',
            'finished_study_at' => '2023-06-01',
        ];

        $profileData3 = [
            'city' => 'Oslo',
            'skill' => 'Frontend',
            'experience' => '1',
            'finished_study_at' => '2020-07-30',
        ];

        $profileData4 = [
            'city' => 'Almaty',
            'skill' => 'Middle',
            'experience' => '3',
            'finished_study_at' => '2019-07-30',
        ];

        $profileData5 = [
            'city' => 'Kazan',
            'skill' => 'Frontend',
            'experience' => '4',
            'finished_study_at' => '2023-07-30',
        ];

        $profileData6 = [
            'city' => 'London',
            'skill' => 'Seniors',
            'experience' => '10',
            'finished_study_at' => '2015-04-30',
        ];


        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
        $worker6->profile()->create($profileData6);




    }


    private function prepareManyToMany()
    {
        $workerManager1 = Worker::find(3);

        $workerBackend1 = Worker::find(1);
        $workerBackend2 = Worker::find(2);
        $workerBackend3 = Worker::find(4);

        $workerDesigner1 = Worker::find(5);
        $workerDesigner2 = Worker::find(6);


        $project1 = Project::create([
            'title' => 'Shop',
        ]);

        $project2 = Project::create([
            'title' => 'Blog',
        ]);

        $project1->workers()->attach([
            $workerManager1->id,
            $workerBackend1->id,
            $workerBackend2->id,
            $workerDesigner1->id,
        ]);

        $project2->workers()->attach([
            $workerManager1->id,
            $workerBackend2->id,
            $workerBackend3->id,
            $workerDesigner2->id,
        ]);

    }

}
