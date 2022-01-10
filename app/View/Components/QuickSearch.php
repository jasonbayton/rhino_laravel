<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class QuickSearch extends Component {

	public string $name;

	public function __construct(string $name = 'search') {
		$this->name = $name;
	}

	public function render(): View {
		return view('components.quick-search');
	}
}
