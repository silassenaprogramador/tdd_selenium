<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class StartTest extends TestCase
{

    public function setUp():void {

        $this->host = 'http://localhost:4444/wd/hub';
        $this->driver = RemoteWebDriver::create($this->host, DesiredCapabilities::chrome());
    }

    public function testStart(){
       
        $this->driver->navigate()->to('https://www.jetbrains.com/pt-br/phpstorm/');
        $this->assertStringContainsString('php',$this->driver->getPageSource());
    }   

    public function tearDown():void{
        $this->driver->close();
    }

}