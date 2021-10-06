<?php

namespace Tests\Unit\Dtos;

use Carbon\Carbon;
use Tests\TestCase;
use App\Dtos\ContentEntry;
use Illuminate\Foundation\Testing\WithFaker;

class ContentEntryTest extends TestCase {

	use WithFaker;

	/** @test */
	public function testPassedArrayAddedToObject() {
		$data = [
			'name' => $this->faker->name,
			'address' => $this->faker->streetAddress,
			'contact' => $this->faker->phoneNumber,
		];

		$content = new ContentEntry($data);

		$this->assertEquals($data['name'], $content->name);
		$this->assertEquals($data['address'], $content->address);
		$this->assertEquals($data['contact'], $content->contact);
	}

	/** @test */
	public function testCanCastToDate() {
		$data['date'] = '2020-01-01';

		$content = new ContentEntry($data);

		$this->assertInstanceOf(Carbon::class, $content->date);
	}

	/** @test */
	public function testCanHandleEmptyStringsWithCasts() {
		$data['updated'] = '';

		$content = new ContentEntry($data);

		$this->assertEquals(null, $content->updated);
	}

	/** @test */
	public function testCanHandleStringRepresentationsOfBooleans() {
		$data['featured'] = 'true';

		$content = new ContentEntry($data);

		$this->assertEquals(true, $content->featured);
	}

	/** @test */
	public function testCanHandleStringRepresentationOfBooleansWhenSetToFalse() {
		$data['featured'] = 'false';

		$content = new ContentEntry($data);

		$this->assertEquals(false, $content->featured);
	}

	/** @test */
	public function testCanHandleStringRepresentationsOfBooleansWhenValueIsEmptyString() {
		$data['featured'] = '';

		$content = new ContentEntry($data);

		$this->assertEquals(false, $content->featured);
	}

	/** @test */
	public function testCanHandleStringRepresentationsOfBooleansWhenValueIsNull() {
		$data['featured'] = null;

		$content = new ContentEntry($data);

		$this->assertEquals(false, $content->featured);
	}

	/** @test */
	public function testNullIsReturnedWhenAccessingUnknownProperty() {
		$data['foo'] = 'bar';
		$content = new ContentEntry($data);

		$this->assertEquals('bar', $content->foo);
		$this->assertNull($content->unknownprop);

	}
}
