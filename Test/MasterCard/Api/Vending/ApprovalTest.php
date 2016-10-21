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



class ApprovalTest extends BaseTest {

    public static $responses = array();

    protected function setUp() {
        parent::setUp();
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        BaseTest::resetAuthentication();
    }

    
    
                
        public function test_sample_create_approval()
        {
            

            self::setAuthentication("vending_1");

            $map = new RequestMap();
            $map->set("payload", "VGhpcyBpcyBkdW1teSBwYXlsb2Fk");
            
            
            $response = Approval::create($map);

            $ignoreAssert = array();
            
            $this->customAssertEqual($ignoreAssert, $response, "amount", "100");
            $this->customAssertEqual($ignoreAssert, $response, "approvalPayload", "VGhpcyBpcyBkdW1teSBwYXlsb2Fk");
            $this->customAssertEqual($ignoreAssert, $response, "id", "t18dijsg7tll0276prfhmh7e3m");
            $this->customAssertEqual($ignoreAssert, $response, "previous.id", "fdf87660-5f9a-11e6-9ac9-f90191c8e88a");
            $this->customAssertEqual($ignoreAssert, $response, "previous.state", "vendsuccess");
            $this->customAssertEqual($ignoreAssert, $response, "sessionId", "e879c950-6eaa-11e6-bc0a-dd0448c2e796");
            

            self::putResponse("sample_create_approval", $response);
            self::resetAuthentication();
        }
        
    
    
    
    
    
    
    
    
    
                

        public function test_sample_update_approval()
        {
            

            self::setAuthentication("vending_1");

            $map = new RequestMap();
            $map->set ("id", "t18dijsg7tll0276prfhmh7e3m");
            $map->set ("payload", "VGhpcyBpcyBkdW1teSBwYXlsb2Fk");
            
            
            $request = new Approval($map);
            $response = $request->update();

            $ignoreAssert = array();
            
            $this->customAssertEqual($ignoreAssert, $response, "amount", "500");
            $this->customAssertEqual($ignoreAssert, $response, "id", "t18dijsg7tll0276prfhmh7e3m");
            $this->customAssertEqual($ignoreAssert, $response, "sessionId", "e879c950-6eaa-11e6-bc0a-dd0448c2e796");
            $this->customAssertEqual($ignoreAssert, $response, "state", "vendsuccess");
            

            self::putResponse("sample_update_approval", $response);
            self::resetAuthentication();
        }
        
    
    
    
    
    
    
}



