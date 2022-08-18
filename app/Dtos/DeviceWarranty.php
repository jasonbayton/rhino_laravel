<?php

namespace App\Dtos;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class DeviceWarranty {

	public string $serialNumber;

	public ?Carbon $warrantyDate;

	public ?Carbon $batteryWarrantyDate;

	public ?Carbon $extendedWarrantyDate;

	public string $imei;

	public Carbon $orderDate;

	public string $manufacturer;

	public string $model;

	public function __construct(array $attributes) {
		$this->manufacturer = $attributes['manufacturer'];
		$this->model = $attributes['model'];
		$this->serialNumber = $attributes['serialNumber'];
		$this->warrantyDate = $attributes['hardwareWarrantyValidUntil'] === '0001-01-01' ? null : Date::parse($attributes['hardwareWarrantyValidUntil']);
		$this->batteryWarrantyDate = $attributes['batteryWarrantyValidUntil'] === '0001-01-01' ? null : Date::parse($attributes['batteryWarrantyValidUntil']);
		$this->extendedWarrantyDate = $attributes['extendedHardwareWarrantyValidUntil'] === '0001-01-01' ? null : Date::parse($attributes['extendedHardwareWarrantyValidUntil']);
		$this->imei = $attributes['imei'];
		$this->orderDate = Date::parse($attributes['purchaseDate']);
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
