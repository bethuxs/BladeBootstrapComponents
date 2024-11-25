<?php
namespace Bethuxs\BladeBootstrapComponents\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $type;
    public $action;

    public function __construct()
    {

    }

    public function render()
    {
        return view('bs::components.form');
    }
}
