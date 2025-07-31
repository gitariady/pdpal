<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Mockery\Matcher\Type;

class DashboardCard extends Component
{
    public $type, $value, $label, $icon;

    public function __construct($type, $value, $label, $icon)
    {
        $this->type = $type;
        $this->value = $value;
        $this->label = $label;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-card');
    }
}
