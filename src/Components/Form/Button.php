<?php
namespace Bethuxs\BladeBootstrapComponents\Components\Form;

use Illuminate\View\Component;

class Button extends Component
{
    public $label;

    public function __construct($label = null)
    {
        $this->label = $label;
    }

    public function render()
    {
        return view('bs::components.form.button');
    }
}
