<?php
namespace Bethuxs\BladeBootstrapComponents\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $value;
    public $label;
    public $placeholder;

    public function __construct($type, $name, $value = null, $label = null, $placeholder = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
    }

    public function render()
    {
        return view('bs::components.form.input');
    }
}
