<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menus = [
            [
                'name' => 'Products',
                'route' => 'products.index',
                'icon' => 'fas fa-boxes'
            ],
            [
                'name' => 'Profile',
                'route' => 'profile.edit',
                'icon' => 'fas fa-user',
            ]
        ];

        return view('layouts.sidebar', compact('menus'));
    }
}
