<?php

/**

 * gsxlib/gsxlib.php

 * @package gsxlib

 * @author Filipp Lepalaan <filipp@fps.ee>

 * https://gsxwsut.apple.com/apidocs/html/WSReference.html?user=asp

 * @license

 * This program is free software. It comes without any warranty, to

 * the extent permitted by applicable law. You can redistribute it

 * and/or modify it under the terms of the Do What The Fuck You Want

 * To Public License, Version 2, as published by Sam Hocevar. See

 * http://sam.zoy.org/wtfpl/COPYING for more details.

 */

class GsxLib

{

    private $client;

    private $region;

    private $session_id;

    private $environment;



    //IT: https://gsxws%s.apple.com/wsdl/%sAsp/gsx-%sAsp.wsdl

   //PROD: https://gsxws2.apple.com/wsdl/%sAsp/gsx-%sAsp.wsdl

    private $wsdl = 'https://gsxws%s.apple.com/wsdl/%sAsp/gsx-%sAsp.wsdl';



    static $_instance;



    const timeout = 30;     // session timeout in minutes



    public static function getInstance(

        $account,

        $username,

        $password,

        $environment = '',

        $region = 'emea',

        $tz = 'CEST',

        $lang = 'en')

    {
try
{

        if(!(self::$_instance instanceof self)) {

            self::$_instance = new self(

                $account,

                $username,

                $password,

                $environment,

                $region,

                $tz,

                $lang

            );

        }



        return self::$_instance;

}
	 catch (Exception $e) {
	 return false;
		}


    }



    private function __clone() {}



    private function __construct(

        $account,

        $username,

        $password,

        $environment = '',

        $region = 'emea',

        $tz = 'CEST',

        $lang = 'en' )

    {

        if(!class_exists('SoapClient')) {

            throw new GsxException('Looks like your PHP lacks SOAP support');

        }



        if(!preg_match('/\d+/', $account)) {

            throw new GsxException('Invalid Sold-To: ' . $account);

        }



        $regions = array('am', 'emea', 'apac', 'la');



        if(!in_array($region, $regions))

        {

            $error = 'Region "%s" should be one of: %s';

            $error = sprintf($error, $region, implode(', ', $regions));

            throw new GsxException($error);

        }

        

        $envirs = array('ut', 'it');

        

        if(!empty($environment))

        {

            if(!in_array($environment, $envirs))

            {

                $error = 'Environment "%s" should be one of: %s';

                $error = sprintf($error, $environment, implode(', ', $envirs));

                throw new GsxException($error);

            }

        } else {

           // GSX2...

           $environment = '2';

        }

        

        $this->wsdl = sprintf($this->wsdl, $environment, $region, $region);

        

        $this->client = new SoapClient(

            $this->wsdl, array('exceptions' => TRUE, 'trace' => 1)

        );

        

        if(!$this->client) {

           throw new GsxException('Failed to create SOAP client.');

        }

        

        if(@$_SESSION['_gsxlib_timeout'][$account] > time()) {

 //          return $this->session_id = $_SESSION['_gsxlib_id'][$account];

        }

        

        $a = array(

            'AuthenticateRequest' => array(

                'userId'            => $username,

                'password'          => $password,

                'serviceAccountNo'  => $account,

                'languageCode'      => $lang,

                'userTimeZone'      => $tz,

            )

        );

        

        try {

            $this->session_id = $this->client

                ->Authenticate($a)

                ->AuthenticateResponse

                ->userSessionId;

        } catch(SoapFault $e) {

            if($environment == '2') $environment = 'production';



            $error = 'Authentication with GSX failed. Does this account have access to '
                .$environment." environment?\n";

            throw new GsxException($error);
return $error;



        }

        

        // there's a session going, put the credentials in there

        if(session_id()) {

            $_SESSION['_gsxlib_id'][$account] = $this->session_id;

            $timeout = time()+(60*self::timeout);

            $_SESSION['_gsxlib_timeout'][$account] = $timeout;

        }



    }



    function getClient()

    {

        return $this->client;

    }



    function setClient($client)

    {

        $this->client = $client;

    }



    /**

     * Get current GSX status of repair

     * @param mixed $dispatchId

     */

    public function repairStatus($dispatchId)

    {

        $toCheck = array();



        if(!is_array($dispatchId)) {

            $dispatchId = array($dispatchId);

        }



        foreach($dispatchId as $id) {

            if (self::looksLike($id, 'dispatchId')) {

                $toCheck[] = $id;

            }

        }



        if(empty($toCheck)) {

            exit('No valid dispatch IDs given');

        }



        $req = array('RepairStatus' => array(

            'repairConfirmationNumbers' => $toCheck

        ));



        return $this->request($req)->repairStatus;

    

    }

    

    public function fetchiOsActivation($query)

    {
	try {

        if(!is_array($query)) {

            $like = self::looksLike($query);

            $query = array($like => $query);

        }



        $request = array('FetchIOSActivationDetails' => $query);



        return $this->request($request)->activationDetailsInfo;

	} catch (Exception $e) {
  		return false;
}


    }



    private function processRepairData($repairData)

    {

        if(array_key_exists('fileData', $repairData))

        {

            $fp = $repairData['fileData'];

            if(is_readable($fp))

            {

                $fh = fopen($fp, "r");

                $contents = fread($fh, filesize($fp));

                $repairData['fileData'] = $contents;

                $repairData['fileName'] = basename($fp);

                fclose($fh);

            }

        }



        return $repairData;



    }



    public function createCarryInRepair($repairData)

    {

        /**

         * GSX validates the information and if all of the validations go through,

         * it obtains a quote for the repair and creates the carry-in repair.

         */

        $repairData = $this->processRepairData($repairData);



        $resp = $this->client->CreateCarryInRepair(

            array('CreateCarryInRequest' => array(

                'userSession'   => array('userSessionId' => $this->getSessionId()),

                'repairData'    => $repairData

            ))

        );



        return $resp->CreateCarryInResponse;



    }

    

    public function createMailInRepair($repairData)

    {

        /**

         * This API allows the submission of Mail-In Repair information into GSX,

         * resulting in the creation of a GSX Mail-In Repair.

         */



        $repairData = $this->processRepairData($repairData);



        $resp = $this->client->CreateMailInRepair(

            array('CreateMailInRepairRequest' => array(

                'userSession'   => array('userSessionId' => $this->getSessionId()),

                'repairData'    => $repairData

            ))

        );



        return $resp->CreateMailInRepairResponse;



    }

    

    public function bulkReturnProforma() {}



    public function repairLookup($query)

    {

        $fields = array(

            'repairConfirmationNumber'  => '',

            'customerEmailAddress'      => '',

            'customerFirstName'         => '',

            'customerLastName'          => '',

            'fromDate'                  => '',

            'toDate'                    => '',

            'incompleteRepair'          => 'N',

            'pendingShipment'           => 'N',

            'purchaseOrderNumber'       => '',

            'repairNumber'              => '',

            'repairStatus'              => '',

            'repairType'                => 'CA',

            'serialNumber'              => '',

            'shipToCode'                => '',

            'soldToReferenceNumber'     => '',

            'technicianFirstName'       => '',

            'technicianLastName'        => '',

            'unreceivedModules'         => 'N',

        );



        // provide "shortcuts" for dispatch ID and SN

        switch(self::looksLike($query)) {

            case 'dispatchId':

                $query = array('repairConfirmationNumber' => $query);

                break;

            case 'serialNumber':

                $query = array('serialNumber' => $query);

                break;

        }



        $query = array_merge($fields, $query);

        $req = array( 'RepairLookupRequest' => array(

            'userSession' => array('userSessionId' => $this->session_id),

            'lookupRequestData' => $query 

        ));



        $response = $this->client->RepairLookup($req)->RepairLookupResponse;

        return $response->lookupResponseData;

  }

  

    /**

    * List parts pending for return

    * Default to Open Carry-Ins

    * @param mixed $repairData

    * @return mixed

    */

    public function partsPendingReturn($repairData = null)

    {

        $fields = array(

            'repairType'                => 'CA',    // default to Carry In repairs

            'repairStatus'              => 'Open',  // and current ones

            'purchaseOrderNumber'       => '',

            'sroNumber'                 => '',

            'repairConfirmationNumber'  => '',

            'serialNumber'              => '',

            'shipToCode'                => '',

            'customerFirstName'         => '',

            'customerLastName'          => '',

            'customerEmailAddress'      => '',

            'createdFromDate'           => '',

            'createdToDate'             => '',

        );

    

        if( !is_array( $repairData )) {

            $repairData = array();

        }

    

        if(!empty($repairData)) {

            foreach($fields as $k => $v) {

                if(array_key_exists($k, $repairData)) {

                    $fields[$k] = $repairData[$f];

                }

            }

        }

    

        $req = array('PartsPendingReturn' => array('repairData' => $fields));

    

        return $this->request($req)->partsPendingResponse;

    

    }

    

    public function fetchDiagnostics($query)

    {

        if(!is_array($query)) {

            $like = self::looksLike($query);

            $query = array($like => $query);

        }

        

        $req = array('FetchRepairDiagnostic' => array(

            'lookupRequestData' => $query

       ));

        

        return $this->request($req);

        

    }

    

    public function compTiaCodes()

    {

        try {

            $result = $this->client->CompTIACodes(

            array('ComptiaCodeLookupRequest' =>

                array('userSession' => array('userSessionId' => $this->session_id)))

            );

        } catch (Exception $e) {

            syslog(LOG_ERR, $e->getMessage());

            syslog(LOG_ERR, $this->client->__getLastRequest());

            syslog(LOG_ERR, $this->client->__getLastResponse());

        }

        

        $response = $result->ComptiaCodeLookupResponse;

        return $response->comptiaInfo;

    }

  

    /**

    * Return details for given dispatch ID

    * @param string $dispatchId

    * @return object lookupResponseData

    */

    public function repairDetails($dispatchId)

    {

        if (is_string($dispatchId)) {

            $dispatchId = trim($dispatchId);

            if( !self::looksLike( $dispatchId, 'dispatchId' )) {

                $error = sprintf('Invalid dispatch ID: %s', $dispatchId);

                throw new InvalidArgumentException($error);

            }

            $dispatchId = array('dispatchId' => $dispatchId);

        }



        $req = array('RepairDetails' => $dispatchId);

        return $this->request($req)->lookupResponseData;



    }



    /**

    * Get PDF label for part return

    * @param string $returnOrder order number

    * @param string $partNumber code of part being returned

    */

    public function returnLabel($returnOrder, $partNumber)

    {

        if(!self::looksLike($returnOrder, 'returnOrder')) {

            exit('Invalid order number: ' . $returnOrder);

        }



        if(!self::looksLike($partNumber, 'partNumber')) {

            exit('Invalid part number: ' . $partNumber);

        }



        $req = array('ReturnLabel' => array(

            'returnOrderNumber' => $returnOrder,

            'partNumber'        => $partNumber

        ));



        return $this->request($req)->returnLabelData;



    }



    /**

    * a shortcut for looking up part information

    * @param mixed $query

    * @return [bool|string]

    */

    public function partsLookup($query = null)

    {

        if(is_array($query)) {

            $req = array('PartsLookup' => array(

                'lookupRequestData' => $query

            ));

        } else {

            $query = trim($query);

            $what = self::looksLike($query);



            if(!$what) {

                throw new GsxException('Invalid search term for part lookup: '.$query);

            }

            

            $query = array($what => $query);

            

        }



        $req = array('PartsLookup' => array('lookupRequestData' => $query));



        $result = $this->request($req)->parts;

        // always return an array

        return (is_array($result)) ? $result : array($result);



    }



    /**

    * A shortcut for checking warranty status of device

    */

    public function warrantyStatus($serialNumber)

    {
try
{
        if(!is_array($serialNumber)) {

            $serialNumber = array('serialNumber' => $serialNumber);

        }



        if(array_key_exists('alternateDeviceId', $serialNumber)) {

            # checking warranty with IMEI code - must run activation check first

            $ad = $this->fetchiOsActivation($serialNumber);

            $wty = $this->warrantyStatus($ad->serialNumber);

            $wty->activationDetails = $ad;

            return $wty;

        }



        $req = array('WarrantyStatus' => array('unitDetail'  => $serialNumber));



        return $this->request($req)->warrantyDetailInfo;

}
	 catch (Exception $e) {
	 return false;
		}

    }



    public function productModel($serialNumber)

    {

        if(!$this->isValidSerialNumber($serialNumber)) {

            $error = sprintf('Invalid serial number: %s', $serialNumber);

            throw new InvalidArgumentException($error);

        }



        $req = array( 'FetchProductModelRequest' => array(

            'userSession' => array(

                'userSessionId' => $this->session_id

            ),

            'productModelRequest' => array(

                'serialNumber' => $serialNumber

            )

        ));



        $response = $this->client->FetchProductModel($req)->FetchProductModelResponse;

        

        return $response->productModelResponse;

    }



    public function onsiteDispatchDetail($query)

    {

        if(!self::looksLike($query, 'dispatchId')) {

            exit( "Invalid dispatch ID: $query" );

        }



        $req = array('OnsiteDispatchDetailRequest' => array(

            'userSession' => array('userSessionId' => $this->session_id),

            'lookupRequestData' => array(

                'dispatchId' => $query,

                'dispatchSentFromDate' => '',

                'dispatchSentToDate' => ''

            )

        ));



        $response = $this->client->OnsiteDispatchDetail($req)

            ->OnsiteDispatchDetailResponse;



        return $response->onsiteDispatchDetails;



    }



    public function isValidSerialNumber($serialNumber)

    {

        $serialNumber = trim( $serialNumber );



        // SNs should never start with an S, but they're often coded into barcodes

        // and since an "old- ormat" SN + S would still qualify as a "new format" SN,

        // we strip it here and not in self::looksLike

        $serialNumber = ltrim($serialNumber, 'sS');

        

        return self::looksLike($serialNumber, 'serialNumber');

        

    }

  

    /**

    * return the GSX user session ID

    * I still keep the property private since it should not be modified

    * outside the constructor

    * @return string GSX session ID

    */

    public function getSessionId()

    {

        return $this->session_id;

    }

    

    /**

    * Do the actual SOAP request

    */

    public function request($req)

    {

        $result = FALSE;



        // split the request name and data

        list($r, $p) = each($req);



        // add session info

        $p['userSession'] = array('userSessionId' => $this->session_id);

        $request = array($r.'Request' => $p);



        try {

            $result = $this->client->$r($request);

            $resp = "{$r}Response";

            return $result->$resp;

        } catch(SoapFault $e) {

            throw new GsxException($e->getMessage(), $this->client->__getLastRequest());

        }



        return $result;



    }



    /**

    * Try to "categorise" a string

    * About identifying serial numbers - before 2010, Apple had a logical

    * serial number format, with structure, that you could id quite reliably.

    * unfortunately, it's no longer the case

    * @param string $string string to check

    */

    static function looksLike($string, $what = null)

    {

        $result = false;

        $rex = array(

            'partNumber'            => '/^([A-Z]{1,2})?\d{3}\-?(\d{4}|[A-Z]{2})(\/[A-Z])?$/i',

            'serialNumber'          => '/^[A-Z0-9]{11,12}$/i',

            'eeeCode'               => '/^[A-Z0-9]{3,4}$/',     // only match ALL-CAPS!

            'returnOrder'           => '/^7\d{9}$/',

            'repairNumber'          => '/^\d{12}$/',

            'dispatchId'            => '/^G\d{9}$/',

            'alternateDeviceId'     => '/^\d{15}$/',

            'diagnosticEventNumber' => '/^\d{23}$/',

            'productName'           => '/^i?Mac/',

        );



        foreach ($rex as $k => $v) {

            if (preg_match($v, $string)) {

                $result = $k;

            }

        }

    

        return ($what) ? ($result == $what) : $result;

  

  }

  

}



class GsxException extends Exception

{

    function __construct($message, $request = null)

    {

        $this->request = $request;

        $this->message = $message;

    }

}

