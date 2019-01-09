<?php
/**
 * Created by PhpStorm.
 * User: digital14
 * Date: 1/9/19
 * Time: 9:16 AM
 */

namespace Ipedis;


use Ipedis\Closure\Step;

class TestStep
{
    /**
     * @var Step
     */
    private $step;
    function next()
    {
        $this->step = new Step();
        $this->step->write(["step" => 1, "task_id" => 12], "info", "step", "first step executed");
    }
}