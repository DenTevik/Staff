<?php

use models\Statistic;
use models\User;

class Home extends Controller
{

    public function index($data = [], $attributes = [])
    {
        $userId = 167;

        $userClass = new User();
        $user = $userClass->getById($userId);
        $statisticClass = new Statistic();

        if(empty($attributes['date'])){
            $stats = $statisticClass->getUserMonthStats($userId, 9);
            echo $this->render->view('home', ['user' => $user, 'stats' => $stats]);
        }else{
            $stats = $statisticClass->getUserDayStats($userId, $attributes['date']);
            echo $this->render->view('daystats', ['user' => $user, 'stats' => $stats, 'day' => $attributes['date']]);
        }

    }

}
