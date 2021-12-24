<?php

namespace App\Dtos;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class DeviceWarranty {

	public string $description;

	public string $serialNumber;

	public string $itemNumber;

	public ?Carbon $warrantyDate;

	public ?Carbon $batteryWarrantyDate;

	public ?Carbon $extendedWarrantyDate;

	public string $imei;

	public Carbon $orderDate;

	public function __construct(array $attributes) {
		$this->description = $attributes['Description'];
		$this->serialNumber = $attributes['SrNo'];
		$this->itemNumber = $attributes['ItemNo'];
		$this->warrantyDate = $attributes['WarrantyDate'] === '0001-01-01' ? null : Date::parse($attributes['WarrantyDate']);
		$this->batteryWarrantyDate = $attributes['BatteryWarrantyDate'] === '0001-01-01' ? null : Date::parse($attributes['BatteryWarrantyDate']);
		$this->extendedWarrantyDate = $attributes['ExtendedWarrantyDate'] === '0001-01-01' ? null : Date::parse($attributes['ExtendedWarrantyDate']);
		$this->imei = $attributes['IMEI'];
		$this->orderDate = Date::parse($attributes['OrderDate']);
	}

	public function inWarranty(): bool {
		return !$this->extendedWarrantyDate
			? $this->warrantyDate && $this->warrantyDate->gte(Date::now())
			: $this->extendedWarrantyDate->gte(Date::now());
	}

	public function warrantyExpiryDate() {
		return !$this->extendedWarrantyDate
			? $this->warrantyDate
			: $this->extendedWarrantyDate;
	}

	public function batteryInWarranty(): bool {
		return $this->batteryWarrantyDate && $this->batteryWarrantyDate->gte(Date::now());
	}
}
