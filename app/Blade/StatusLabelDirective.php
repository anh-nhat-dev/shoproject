<?php
namespace App\Blade;

class StatusLabelDirective {

    protected $listStatus = [
        'active' => [
            'class' => 'label-success',
            'title' => 'ACTIVE'
        ],
        'hide' => [
            'class' => 'label-warning',
            'title' => 'HIDE'
        ]
    ];
    
    public function show($agument)
    {
        if (array_key_exists($agument, $this->listStatus)) {
            return '<span class="label '.$this->listStatus[$agument]['class'].' label-rounded">'.$this->listStatus[$agument]['title'].'</span>';
        }
    }


}