<?php

class Action
{
    const FREE = "FREE";
    const CHEAP = "CHEAP";
    const GOOD_VALUE = "GOOD_VALUE";
    const EXPENSIVE = "EXPENSIVE";
    
    private $param1;
    private $param2;
    private $param3;
    private $param4;
    private $param5;
    private $param6;

    public function __construct(string $param1,string $param2,string $param3,string $param4, string $param5, string $param6){
        $this->param1 = $param1;
        $this->param2 = $param2;
        $this->param3 = $param3;
        $this->param4 = $param4;
        $this->param5 = $param5;
        $this->param6 = $param6;
    }
    public function calcFactor(){
        return ($this->param1 + $this->param3 + $this->param4 + $this->param5) * $this->param6;
    }
    public function vlrType(){
        for($c=0; $c < count($this->param2); $c++ )
        {
            for($d=0; $d < count($this->param2[$c]); $d++)
            {
                if($this->param2[$c]['vlr'] == 0.00)
                {
                    return self::FREE;
                }
                elseif($this->param2[$c]['vlr'] >= 0.01 and $this->param2[$c]['vlr'] <= 10)
                {
                    return self::CHEAP;
                }
                elseif($this->param2[$c]['vlr'] > 10 and $this->param2[$c]['vlr'] <= 20)
                {
                    return self::GOOD_VALUE;
                }
                elseif($this->param2[$c]['vlr'] > 20)
                {
                    return self::EXPENSIVE;
                }
            }
        }
    }
    public function doSomething()
    {
        $return['calc_factor'] = $this->calcFactor();
        $return['vlr_type'] = $this->vlrType();
        return $return;
    }
}
