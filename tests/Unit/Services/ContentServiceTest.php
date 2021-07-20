<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\ContentService;
use Illuminate\Support\Facades\Config;

class ContentServiceTest extends TestCase {

	protected $contentService;

	protected function setUp(): void {
		parent::setUp();
		Config::set('database.content_location', 'test_content');
		$this->contentService = new ContentService;
	}

}
