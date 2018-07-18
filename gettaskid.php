<?php
/**
 * Created by PhpStorm.
 * User: liupengfei
 * Date: 2018/7/18
 * Time: 下午12:25
 */

include_once "vendor/autoload.php";
use CoScheduler\Scheduler;
use CoScheduler\SystemCall;
use CoScheduler\Task;

function getTaskId() {
    return new SystemCall(function(Task $task, Scheduler $scheduler) {
        $task->setSendValue($task->getTaskId());
        $scheduler->schedule($task);
    });
}

function task($max) {
    $tid = (yield getTaskId()); // <-- here's the syscall!
    for ($i = 1; $i <= $max; ++$i) {
        echo "This is task $tid iteration $i.\n";
        yield;
    }
}

$scheduler = new Scheduler;

$scheduler->newTask(task(10));
$scheduler->newTask(task(5));

$scheduler->run();