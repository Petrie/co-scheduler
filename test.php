<?php
/**
 * Created by PhpStorm.
 * User: liupengfei
 * Date: 2018/7/18
 * Time: 下午12:00
 */

include_once "vendor/autoload.php";
use CoScheduler\Scheduler;

function task1() {
    for ($i = 1; $i <= 10; ++$i) {
        echo "This is task 1 iteration $i.\n";
        yield;
    }
}

function task2() {
    for ($i = 1; $i <= 5; ++$i) {
        echo "This is task 2 iteration $i.\n";
        yield;
    }
}

$scheduler = new Scheduler;

$scheduler->newTask(task1());
$scheduler->newTask(task2());

$scheduler->run();