<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./tests/EecmsTest.php
 */
namespace JaegerApp\tests;

use JaegerApp\Platforms\Concrete5;

/**
 * Jaeger - Craft object Unit Tests
 *
 * Contains all the unit tests for the \mithra62\Platforms\Craft object
 *
 * @package Jaeger\Tests
 * @author Eric Lamb <eric@mithra62.com>
 */
class Concrete5Test extends \PHPUnit_Framework_TestCase
{

    public function testInit()
    {
        $c5 = new Concrete5();
        $this->assertTrue(method_exists($c5, 'getDbCredentials'));
        $this->assertTrue(method_exists($c5, 'getEmailConfig'));
        $this->assertTrue(method_exists($c5, 'getCurrentUrl'));
        $this->assertTrue(method_exists($c5, 'getSiteName'));
        $this->assertTrue(method_exists($c5, 'getTimezone'));
        $this->assertTrue(method_exists($c5, 'getSiteUrl'));
        $this->assertTrue(method_exists($c5, 'getEncryptionKey'));
        $this->assertTrue(method_exists($c5, 'getConfigOverrides'));
        $this->assertInstanceOf('JaegerApp\\Platforms\\AbstractPlatform', $c5);
    }
}