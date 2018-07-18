<?php
/**
 * Created by PhpStorm.
 * User: liupengfei
 * Date: 2018/7/18
 * Time: 下午12:23
 */

namespace CoScheduler;


class SystemCall {
    protected $callback;

    public function __construct(callable $callback) {
        $this->callback = $callback;
    }

    public function __invoke(Task $task, Scheduler $scheduler) {
        $callback = $this->callback;
        return $callback($task, $scheduler);
    }
}

