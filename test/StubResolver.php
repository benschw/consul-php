<?php

namespace Fliglio\Consul;

use Fliglio\Web\Uri;

class StubResolver extends DnsResolver {
	public $results;
	public function __construct(array $results) {
		$this->results = $results;
	}

	public function resolve($host, $type) {
		return $this->results;
	}

	public static function createEmptyResult() {
		$stubSrv = array();
		return new self($stubSrv);
	}

	public static function createSingleResult() {
		$stubSrv = array(
			Uri::fromHostAndPort("foo1.fliglio.com", 8001)
		);
		return new self($stubSrv);
	}
	public static function createDoubleResult() {
		$stubSrv = array(
			Uri::fromHostAndPort("foo1.fliglio.com", 8001),
			Uri::fromHostAndPort("foo2.fliglio.com", 8002)
		);

		return new self($stubSrv);
	}
}
