<?php
/*
 * Copyright 2016 MasterCard International.
 *
 * Redistribution and use in source and binary forms, with or without modification, are 
 * permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of 
 * conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its 
 * contributors may be used to endorse or promote products derived from this software 
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES 
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT 
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; 
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER 
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING 
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF 
 * SUCH DAMAGE.
 *
 */

namespace MasterCard\Api\Vending;

use MasterCard\Core\Model\RequestMap;
use MasterCard\Core\ApiConfig;
use MasterCard\Core\Security\OAuth\OAuthAuthentication;
use Test\BaseTest;



class MachineTest extends BaseTest {

    public static $responses = array();

    protected function setUp() {
        parent::setUp();
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        BaseTest::resetAuthentication();
    }

    
    
    
    
                
        public function test_sample_machines_nearby()
        {
            

            self::setAuthentication("vending_1");

            $map = new RequestMap();
            $map->set("latitude", "36.121174");
            $map->set("longitude", "-115.169609");
            
            
            $responseList = Machine::listByCriteria($map);

            $ignoreAssert = array();
            
            $this->customAssertEqual($ignoreAssert, $responseList[0], "address", "3355 S Las Vegas Blvd The Venetian");
            $this->customAssertEqual($ignoreAssert, $responseList[0], "description", "Soft drinks and snacks available for sale");
            $this->customAssertEqual($ignoreAssert, $responseList[0], "distance", "0.0");
            $this->customAssertEqual($ignoreAssert, $responseList[0], "latitude", "36.121174");
            $this->customAssertEqual($ignoreAssert, $responseList[0], "longitude", "-115.16961");
            $this->customAssertEqual($ignoreAssert, $responseList[0], "model", "1");
            $this->customAssertEqual($ignoreAssert, $responseList[0], "name", "Mastercard Vending 1");
            $this->customAssertEqual($ignoreAssert, $responseList[0], "serial", "1017");
            $this->customAssertEqual($ignoreAssert, $responseList[0], "serviceId", "fff0");
            

            self::putResponse("sample_machines_nearby", $responseList[0]);
            self::resetAuthentication();
        }
        
    
    
    
    
    
}



