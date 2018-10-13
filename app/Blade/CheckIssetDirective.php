<?php
namespace App\Blade;

class CheckIssetDirective
{
    /**
     * Object need check
     *
     * @var string
     */
    protected $obj;


    /**
     * access Return
     *
     * @var string
     */
    protected $access;

    public function show($aguments)
    {
        $this->extractArguments($aguments);
        return "<?= isset($$this->obj) ? isset($$this->obj->$this->access) ? $$this->obj->$this->access: null : null ?>";
    }

    public function extractArguments(string $aguments)
    {
        $aguments = explode(',',$aguments);
        $this->obj = trim(array_get($aguments, 0), "'");
        $this->access = trim(array_get($aguments, 1), "'");
    }

}