<?php
namespace App\Services;
use App, Validator, Mail, Mailjet, DB, Config, Session, Lib, MailSMS, StdClass,CryptoJsAes,Response;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Order;
use App\Models\Customer;
use App\Models\PaymentLog;

class PaymentService
{
	function __construct(Payment $getPayment,PaymentDetail $getPaymentDetail,Order $getOrder,Customer $getCustomer,PaymentLog $getPaymentLog){
		$this->getPaymentDetail = $getPaymentDetail;
		$this->getPayment = $getPayment;
		$this->getOrder = $getOrder;
		$this->getCustomer = $getCustomer;
		$this->getPaymentLog = $getPaymentLog;
	}
	public function savePaymentDetails($data,$orders){
		 $getPaymentByRefApi = $this->getPaymentRefByApi($data['ref']);
        $getPaymentByRefId = $this->getPaymentByRef($orders->ref_id);
        $payment_id = $getPaymentByRefId->id;
          $getPayDetail = $getPaymentByRefApi->_embedded->payment[0];
          $expiry = $getPayDetail->paymentMethod->expiry;
          $cardholderName = $getPayDetail->paymentMethod->cardholderName;
          $name = $getPayDetail->paymentMethod->name;
          $pan = $getPayDetail->paymentMethod->pan;
          $currencyCode = $getPayDetail->amount->currencyCode;
          $state = $getPayDetail->state;
           $requestData = array(
            'outlet_id'=>'',
            'currency_code'=>$currencyCode,
            'expiry'=>$expiry,
            'card_holder_name'=>$cardholderName,
            'card'=>$name,
            'pan'=>$pan,
            'status'=>'C',
          );
          $this->saveUpdatePayment($payment_id,$requestData);
        $insertData = array(
			'payment_id'=>$payment_id,
			'state'=>$state,
			'request'=>json_encode(['request'=>'no reqeust']),
			'response'=>json_encode($getPaymentByRefApi)
		);
		$this->savePaymentDetail($insertData);
		$this->getCaptured($payment_id);
	}
	public function getPaymentRefByApi($ref){
		$accessToken = $this->getToken();
		$outlet = Config::get('payment.outlet_id');
		$token = $accessToken->access_token;
		$curl = curl_init();
			curl_setopt_array($curl, [
			  CURLOPT_URL => "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/".$outlet."/orders/".$ref,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => [
			  	 "Authorization: Bearer ".$token,
			    "Accept: application/vnd.ni-payment.v2+json",
			     "Content-Type: application/vnd.ni-payment.v2+json"
			  ],
			]);

			$response = json_decode(curl_exec($curl));
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  return $response;
			}
	}
	public function getCaptured($payment_id){
		$getPayments = $this->getPayment->getpaymentById($payment_id);

		$getPayment = $getPayments->getPaymentDetail->sortByDesc('id')->first();
		
		if($getPayment->state == "CAPTURED"){
			$getResponse = json_decode($getPayment->response);
			$url = $getResponse->_embedded->payment[0]->_embedded->{'cnp:capture'}[0]->_links->self->href;
			$getCurlCapture = $this->getCurlCapture($url);
			if(isset($getCurlCapture->_links->self)){
				$this->getPaymentLog->savePaymentLog([
					'payment_id'=>$payment_id,
					'request'=>$url,
					'response'=>json_encode($getCurlCapture),
					'state'=>$getCurlCapture->state,
					'status'=>'V'
				]);
			}
		}
	}
	public function getCurlCapture($url){
		$curl = curl_init();
		$accessToken = $this->getToken();
		$outlet = Config::get('payment.outlet_id');
		$token = $accessToken->access_token;
			curl_setopt_array($curl, [
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => [
			   "Authorization: Bearer ".$token,
				"Accept: application/vnd.ni-payment.v2+json",
			    "Content-Type: application/vnd.ni-payment.v2+json"
			  ],
			]);
			$output = json_decode(curl_exec($curl)); 
			curl_close($curl);
			return $output;


			
	}

	public function getPaymentByRef($ref_id){
		return $this->getPayment->getPaymentByRef($ref_id);
	}
	public function updatePaymentByMd($md,$data){
		return $this->getPayment->updatePaymentByMd($md,$data);
	}
	public function getOrderBySession(){
		return $this->getOrder->getOrderBySession();
	}
	public function getToken(){
	$apikey = Config::get("payment.payment_api_key");     // enter your API key here
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "https://api-gateway.sandbox.ngenius-payments.com/identity/auth/access-token"); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		"accept: application/vnd.ni-identity.v1+json",
		"authorization: Basic ".$apikey,
		"content-type: application/vnd.ni-identity.v1+json"
	)); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS,  "{\"realmName\":\"ni\"}"); 
	$output = json_decode(curl_exec($ch)); 
	curl_close ($ch);
	return $output;
}


public function createOrder($data){
		$orderData = json_encode($data);
		
		$accessToken = $this->getToken();
		$outlet = Config::get('payment.outlet_id');
		$token = $accessToken->access_token;
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/".$outlet."/orders"); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer ".$token, 
			"Content-Type: application/vnd.ni-payment.v2+json", 
			"Accept: application/vnd.ni-payment.v2+json")); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $orderData); 
		$output = json_decode(curl_exec($ch)); 
		curl_close ($ch);
		return ['order'=>$output,'token'=>$token];

}

public function submitPaymentCard($pay){
	$postData = new StdClass();
	$postData->pan = $pay['pan'];
	$postData->expiry = $pay['expiry'];
	$postData->cvv = $pay['cvv'];
	$postData->cardholderName = $pay['name'];
	$json = json_encode($postData);
	$token = $pay['accessToken'];
	$cardpay_url = $pay['cart_link'];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $cardpay_url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$token, "Content-Type: application/vnd.ni-payment.v2+json", "Accept: application/vnd.ni-payment.v2+json"));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

	$output = json_decode(curl_exec($ch));
	curl_close ($ch);
	return $output;
	$state = $output->state;


	if ($state == "AWAIT_3DS") {
		return $output;                                                
	}else{
		return $output;
	}


}

public function getRetrieveOrderStatus($ref_id){
	$accessToken = $this->getToken();
	$outlet = Config::get('payment.outlet_id');
	$token = $accessToken->access_token;    // enter your API key here
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/".$outlet."/orders/".$ref_id); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		"Authorization: Bearer ".$token
	)); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS,  "{\"realmName\":\"ni\"}"); 
	$output = json_decode(curl_exec($ch)); 
	curl_close ($ch);
	return $output;
}

public function captureAmount($amount,$order_ref,$payment_ref){
	$postData = new StdClass();
	$outlet = Config::get('payment.outlet_id');
	$postData->currencyCode = 'AED';
	$postData->value = $amount;
	$makeAmount = new StdClass();
	$makeAmount->amount = $postData;
	$json = json_encode($makeAmount);
	$accessToken = $this->getToken();
	$token = $accessToken->access_token;
	$cardpay_url = "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/".$outlet."/orders/".$order_ref."/payments/".$payment_ref."/captures";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $cardpay_url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$token, "Content-Type: application/vnd.ni-payment.v2+json", "Accept: application/vnd.ni-payment.v2+json"));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	$output = json_decode(curl_exec($ch));
	curl_close ($ch);
	return $output;
}

public function cancelledOrder($order_ref,$payment_ref){
	$accessToken = $this->getToken();
	$outlet = Config::get('payment.outlet_id');
	$token = $accessToken->access_token;    // enter your API key here
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/".$outlet."/orders/".$ref_id); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		"Authorization: Bearer ".$token
	)); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS,  "{\"realmName\":\"ni\"}"); 
	$output = json_decode(curl_exec($ch)); 
	curl_close ($ch);
	return $output;
}

public function refundOrder($amount,$order_ref,$payment_ref,$capture_ref){
	$postData = new StdClass();
	$outlet = Config::get('payment.outlet_id');
	$postData->currencyCode = 'AED';
	$postData->value = $amount;
	$makeAmount = new StdClass();
	$makeAmount->amount = $postData;
	$json = json_encode($makeAmount);
	$accessToken = $this->getToken();
	$token = $accessToken->access_token;
	$cardpay_url = "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/".$outlet."/orders/[order-reference]/payments/".$payment_ref."/captures/".$capture_ref."/refund";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $cardpay_url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$token, "Content-Type: application/vnd.ni-payment.v2+json", "Accept: application/vnd.ni-payment.v2+json"));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	$output = json_decode(curl_exec($ch));
	curl_close ($ch);
	return $output;
}

public function getPaymentView($request){
	$data = $request->all();
	$getCustomer = $this->getCustomer->getCustomerDesc();
	$getOrder = $data['data'];
	$amount = $getOrder['amount']['value'];
	$getOrder['amount']['value'] = (round(($amount*100)));
	$getOrder['amount']['currencyCode'] = 'AED';
	$getOrder['emailAddress'] = $getCustomer->email;
	$getOrder['billingAddress']['firstName'] = $getCustomer->name;
	$getOrder['billingAddress']['lastName'] = $getCustomer->last_name;
	$getOrder['billingAddress']['address1'] = $getCustomer->address;
	$getOrder['billingAddress']['city'] = $getCustomer->city;
	$getOrder['billingAddress']['countryCode'] = 'UAE';
		if(count($data) > 0 && $amount > 0){
				$getOrder = $this->createOrder($getOrder);
				$getOrder = Response::json(['status'=>1,'data'=>$getOrder])->content();
				return $getOrder;

		}else{
			$getOrder = Response::json(['status'=>0,'data'=>[]]);
			return $getOrder;
		}
}
public function saveInsertPayment($data){
	$requestData = array(
		'customer_id'=> Session::get('customer-id'),
		'customer_name'=>Session::get('customer-name'),
		'ref_id'=>$data['ref_id'],
		'amount'=>$data['amount'],
		'outlet_id'=>'',
		'token'=>$data['token'],
		'currency_code'=>'',
		'expiry'=>'',
		'card_holder_name'=>'',
		'card'=>'',
		'pan'=>'',
		'status'=>'I',
	);
	return $this->getPayment->insertPayment($requestData);
}
public function saveUpdatePayment($id,$data){
	return $this->getPayment->updatePayment($id,$data);
}

public function savePaymentDetail($data){
	$insertData = array(
		'payment_id'=>$data['payment_id'],
		'state'=>$data['state'],
		'request'=>$data['request'],
		'response'=>$data['response']
	);
	return $this->getPaymentDetail->insertPayment($insertData);
}


public function submitPayment($request,$ref_id){
	 $data = $request->all();
      if($data['payment_type'] == 'pay_online'){
         $pay = array();
         $pay['pan'] = $data['card_no']['value'];
         $pay['expiry'] = $data['expiry_year']['value']."-".$data['expiry_month']['value'];
         $pay['cvv'] = $data['cvv']['value'];
         $pay['name'] = $data['card_name']['value'];
         if($data['amount'] > 0){
         $pay['amount'] = round($data['amount']*100);
        	
         $createOrder = array();
         $createOrder['action']="SALE";
         $createOrder['amount']['currencyCode'] = "AED";
         $createOrder['amount']['value'] = $pay['amount'];
         $getCustomer = $this->getCustomer->getCustomerDesc();
		$createOrder['emailAddress'] = $getCustomer->email;
		$createOrder['billingAddress']['firstName'] = $getCustomer->name;
		$createOrder['billingAddress']['lastName'] = $getCustomer->last_name;
		$createOrder['billingAddress']['address1'] = $getCustomer->address;
		$createOrder['billingAddress']['city'] = $getCustomer->city;
		$createOrder['billingAddress']['countryCode'] = 'UAE';
		$createOrder['merchantAttributes']['redirectUrl'] = Lib::asset('thank-you');
		$createOrder['merchantAttributes']['skipConfirmationPage'] = true;
         $getOrderData = $this->createOrder($createOrder);
         $data['token'] = $getOrderData['token'];
         $data['ref_id'] = $ref_id;
         $payment_id = $this->saveInsertPayment($data);
          $data['payment_id'] = $payment_id;
          $data['state']= $getOrderData['order']->_embedded->payment[0]->state;
          $data['request']=json_encode($createOrder);
          $data['response'] = json_encode($getOrderData['order']);
          $this->savePaymentDetail($data);

          $pay['state']= $data['state'];
         $pay['cart_link'] = $getOrderData['order']->_links->payment->href;
          $pay['accessToken']= $getOrderData['token'];
       	if($getOrderData['token'] != "" ){
       		$pay['status']=1;
			return $pay;
	    }else{
	    	return ['status'=>0];
	    }
     }
	}else{
		return ['status'=>0];
	}
}
public function getAuth($data){
		$ch = curl_init(); 
		$json = json_encode([
			'PaReq'=>'Y',
			'TermUrl'=>$data['acsterm'],
			'MD'=>$data['acsmd'],
		]);
		curl_setopt($ch, CURLOPT_URL, $data['acsurl']); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json); 
		 dd(curl_exec($ch));
		curl_close ($ch);
		//return ['order'=>$output,'token'=>$token];

}
public function getpaymentByMd($in_acsmd){
	return $this->getPayment->getpaymentByMd($in_acsmd);
	
}
public function acsPaReq($data){
			$postData = new StdClass();
		$postData->PaRes = $data['in_acspares'];

		$json = json_encode($postData);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $data['cnp3ds_url']);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$data['token'], "Content-Type: application/vnd.ni-payment.v2+json", "Accept: application/vnd.ni-payment.v2+json"));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

		$output = json_decode(curl_exec($ch));
		return $output;
}
public function acsPaRes($in_acspares,$in_acsmd){
	$getPaymentById = $this->getpaymentByMd($in_acsmd);
	if($getPaymentById != null){
		$token = $getPaymentById->token;
		$getPaymentDetail = $getPaymentById->getPaymentDetail->sortByDesc('id')->first();
		if($getPaymentDetail->state == 'AWAIT_3DS'){
			$getResults = json_decode($getPaymentDetail->response);
			$cnp3ds_url = $getResults->_links->{'cnp:3ds'}->href;
			$acsurl = $getResults->{'3ds'}->acsUrl;
			$acspareq = $getResults->{'3ds'}->acsPaReq;
			$acsmd = $getResults->{'3ds'}->acsMd;
			$acsterm = Lib::asset('get-secure-3d'); 
			$getAcsPaReq = $this->acsPaReq([
				'cnp3ds_url'=>$cnp3ds_url,
				'token'=>$token,
				'in_acspares'=>$in_acspares,
				'in_acsmd'=>$in_acsmd
			]);

			if(!empty($getAcsPaReq)){
					$data = array(
						'payment_id'=>$getPaymentById->id,
						'state'=>$getAcsPaReq->state,
						'request'=>json_encode(['cnp3ds_url'=>$cnp3ds_url,'token'=>$token,'in_acspares'=>$in_acspares,'in_acsmd'=>$in_acsmd]),
						'response'=>json_encode($getAcsPaReq)
					);
				$status = 'F';
				if($getAcsPaReq->state == 'CAPTURED'){
					$status  = 'C';
				}
				$this->saveUpdatePayment($getPaymentById->id,['status'=>$status]);
				$this->savePaymentDetail($data);
			}
		
	}
}

}
}
?>