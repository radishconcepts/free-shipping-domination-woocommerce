<?php

class DefaultBehaviourTest extends PHPUnit_Framework_TestCase {
	/** @test */
	public function it_returns_same_array_when_free_shipping_is_not_set()
	{
		$input = array(
			'test'            => 'test value',
			'another_test'    => 'another_test_value',
			'and_another_one' => 'more test values'
		);
		$return = fsdwc_woocommerce_package_rates( $input );
		$this->assertEquals( $input, $return );
	}

	/** @test */
	public function it_returns_only_free_shipping_when_it_is_the_only_one_available()
	{
		$input = array(
			'free_shipping' => 'free_shipping_value'
		);
		$return = fsdwc_woocommerce_package_rates( $input );
		$this->assertEquals( $input, $return );
	}

	/** @test */
	public function it_returns_only_free_shipping_when_it_is_set()
	{
		$input = array(
			'test'            => 'test value',
			'free_shipping'   => 'free_shipping_value',
			'and_another_one' => 'more test values'
		);
		$return = fsdwc_woocommerce_package_rates( $input );
		$expected = array(
			'free_shipping' => 'free_shipping_value'
		);
		$this->assertEquals( $expected, $return );
	}
}
