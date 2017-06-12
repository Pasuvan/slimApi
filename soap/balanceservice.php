<?php
//include_once("config.php");
class MegaXBalanceServiceClass {
	
	var	$class_db;
	
	public function __construct() {
		$this->class_db = "";
	}

	function UserBalanceRequest($userBalanceData) {
		$user_userID     = $userBalanceData->userID;
		$user_apiHashKey = $userBalanceData->apiHashKey;
		$user_curTime    = $userBalanceData->timeStamp;
		$useraction      = 10005;//$buyInData->actionId;
		$apiID     = 10011; //PARTNER_ID
		$apiKey    = "9l02ig0Wf411";
		$apiHashKey= md5($apiID."-".$apiKey."-".$useraction."-".$user_userID."-".$user_curTime);	
		if(!empty($useraction)) {
			if($useraction==10005) { //BUY IN REQUEST
			
				/* if($user_apiHashKey==$apiHashKey) {
						$browseSQL = "SELECT USER_POINTS_ID,COIN_TYPE_ID,USER_ID,USER_DEPOSIT_BALANCE,USER_PROMO_BALANCE,USER_WIN_BALANCE,USER_TOT_BALANCE ".
									 "FROM user_points WHERE USER_ID='".$user_userID."' AND COIN_TYPE_ID=1";
						$rsResult  = mysql_query($browseSQL) or die("Query: Error4");
						$getUserBal= mysql_fetch_array($rsResult);				
						$balanceResponse=array("error"=>0,"message"=>"success","userID"=>$user_userID,"hashkey"=>$user_apiHashKey,"balance"=>$getUserBal["USER_TOT_BALANCE"]);
						$responseText =array("balance"=>json_encode($balanceResponse));											
						return $responseText;
				} else {
					$responseTextTEST="Error: Hashkey does not match";			
					$balanceResponse=array("error"=>1,"message"=>"Error: Hashkey does not match");
					$responseText=array("balance"=>json_encode($balanceResponse));						
					return $responseText;
				} */
				$responseTextTEST="Invalid User Action";
				$balanceResponse=array("error"=>0,"message"=>"success","userID"=>$user_userID,"hashkey"=>$user_apiHashKey,"balance"=>1000);
				$responseText=array("balance"=>json_encode($balanceResponse));						
				return $responseText;	
			} else {
				$responseTextTEST="Invalid User Action";
				$balanceResponse=array("error"=>1,"message"=>"Error: Invalid User Action");
				$responseText=array("balance"=>json_encode($balanceResponse));						
				return $responseText;				
			}
		} else {
			$responseTextTEST="Invalid User Action";
			$balanceResponse=array("error"=>1,"message"=>"Error: Invalid User Action");
			$responseText=array("balance"=>json_encode($balanceResponse));						
			return $responseText;				
		}
	}
}

ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache
$server = new SoapServer("balanceservice.xml");
$server->setClass("MegaXBalanceServiceClass");
$server->addFunction("UserBalanceRequest");
$server->handle();
?>