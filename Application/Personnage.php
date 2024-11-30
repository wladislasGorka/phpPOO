<?php
abstract class personnage{

    protected string $name;
    protected int $maxHealth;
    protected int $health;
    protected int $armor;
    protected int $exp;
    protected int $level;

    public function __construct(){}

    public function roll(){}

    public function action(int $action){}
    public function action1(){}
    public function action2(){}
    public function action3(){}
    public function action4(){}
    public function action5(){}
    public function action6(){}
}