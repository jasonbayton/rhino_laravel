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

	/** @test */
	public function testGetAllReturnsCorrectCount() {
		$this->assertCount(16, $this->contentService->all());
	}

	/** @test */
	public function testGettingEntryByUrl() {
		$entry = $this->contentService->getByUrl('/support');

		$this->assertEquals('Rhino Support', $entry->title);
	}

	/** @test */
	public function testGetNavEntriesReturnsTheCorrectAmount() {
		$navEntries = $this->contentService->getNavEntries();

		$this->assertCount(2, $navEntries);
	}

	/** @test */
	public function testContentCanReturnCorrectChildren() {
		$entry = $this->contentService->getByUrl('security/releases/t8');

		$this->assertCount(6, $entry->getChildren());
	}

}
