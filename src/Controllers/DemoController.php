<?php
    namespace App\Controllers;

    use PsrHttpMessageServerRequestInterface as Request;
    use PsrHttpMessageResponseInterface as Response;
    use App\Models\Image;
    use App\Models\Otp;

    class DemoController{

        private $view;
        public function __construct($c){
            $this->view = $c->view;
        }
        public function index($request, $response, $args){
            echo "hello";
        }
        public function users($request, $response, $args)
        {
            $users = Image::all();
            // dd($users);
            $this->view->render($response, 'home.twig', [ 'users' => $users->toArray() ]);
        }

        public function getOTP($request, $response, $args)
        {
            $users = Image::all();
            $otp_num = $this->generateRandomString(4);
            $postData = $request->getParsedBody();
            $phone_num = $postData['phone'];
            $otpResponse = $this->send_otp($phone_num, $otp_num);
            
            if($otpResponse){
                $otp_id = $otpResponse;
                $otp = new Otp;
                $otp->phone = $phone_num;
                $otp->otp = $otp_num;
                $otp->otp_response_id = $otp_id;
                $otp->save();

                $responseData['message'] = $otp_id;
                $responseData['type'] = 'success';
                // $responseData['otp'] = $otp_num;
                return $response->withJson($responseData, 201);
            }
            $responseData['message'] = 'Something went wrong !';
            $responseData['type'] = 'error';
            return $response->withJson($responseData, 404);
            
            // echo json_encode($responseData);


        }

        public function verifyOTP($request, $response, $args)
        {
            $postData = $request->getParsedBody();
            $phone_num = $postData['phone_num'];
            $otp  = $postData['otp_num'];
            $otp_response_id = $postData['otp_response_id'];
            $otpData = Otp::where('phone', $phone_num)
                        ->where('otp', $otp)
                        ->where('otp_response_id', $otp_response_id)
                        ->get();
            if(count($otpData) > 0){
                $responseData['message'] = 'Otp has been verified';
                $responseData['type'] = 'success';
                return $response->withJson($responseData, 200);
            }
            $responseData['message'] = 'Something went wrong !';
            $responseData['type'] = 'error';
            return $response->withJson($responseData, 404);
        }

        function generateRandomString($length = 10) {
            $characters = '0123456789';
            // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        private function send_otp($phone, $otp){
            //For sending OTP
            // http://www.99sms.in/api/sendhttp.php?authkey=YourAuthKey&mobiles=919999999990,919999999999&message=message&sender=ABCDEF&route=4&country=0
            $url="http://www.99sms.in/api/sendhttp.php";
            $postData = array(
                'authkey' => "112183AMiuKX6Qc5be32e18",
                'mobiles' => $phone,
                'message' => urlencode("Your OTP is".$otp),
                'sender' => "SPLCD"
            );
            $paramArr['url'] = $url;
            $paramArr['postData'] = $postData;
            return $this->sendRequest($paramArr);        
        }

        function sendRequest($param){
            $url = $param['url'];
            $postData = $param['postData'];

            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));


            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


            //get response
            $output = curl_exec($ch);

            //Print error if any
            if(curl_errno($ch))
            {
                return curl_error($ch);
            }

            curl_close($ch);

            return $output;
        }  

        function rebiew_app(){
            // $phoneValidator = v::key('phone', v::phone()->notEmpty());
            // if(!$phoneValidator->validate($params)) {
            //     return $response->withJson(['status' => 'error', 'code' => '1', 'text' => 'This is not a valid phone number', 'uid' => '' ,'object' => '/user/unsubscribed_otp']);
            // }
            // $otp = generatecode();
            // //delete expired OTP
            // $future_date = date('Y-m-d H:i:s', strtotime('-20 minutes'));
            // $delete_expired_otp = $this->db->delete("tbl_otp",["verification_created_at[<]" => $future_date]);
            // $check_otp = $this->db->get("tbl_otp", ["verification_code","verification_created_at","verification_status","verification_uid"], [
            //     "AND" => ["verification_source" => $params["phone"],
            //                 "verification_type"     => "unsubscribe",
            //                 "verification_created_at[>]" => $future_date]]
            // ); 
            // if(!empty($check_otp)){
            //     if($check_otp["verification_status"]){
            //         return $response->withJson(['status' => 'success', 'code' => '3', 'text' => 'Your have already been verified' ,'uid' => '', 'object' => '/user/unsubscribed_otp']);
            //     }
            //     $phone = $params["phone"];
            //     $message = "Your verification code is ".$check_otp["verification_code"];
            //     sendsms($phone, $message);
            //     return $response->withJson(['status' => 'success', 'code' => '2', 'text' => 'Code has been sent' , 'phone_otp' => $check_otp["verification_code"] ,'email_otp' => ' ','uid' => '', 'object' => '/user/unsubscribed_otp']);
            // }
            // else{
            //     $status = "1";
            //     if(!empty($status)){
            //         $otp_add = $this->db->insert("tbl_otp",
            //                             [
            //                                 "verification_code"     => $otp,
            //                                 "verification_type"     => "unsubscribe",
            //                                 "verification_source"   => $params["phone"],
            //                                 "verification_uid"       => uniqid().$date->getTimestamp()
            //                             ]);
            //         if(!empty($otp_add)) {
            //             $phone = $params["phone"];
            //             $message = "Your verification code is ".$otp;
            //             sendsms($phone, $message);
            //             return $response->withJson(['status' => 'success', 'code' => '2', 'text' => 'Code has been sent', 'uid' => '' , 'phone_otp' => $otp ,'email_otp' => ' ', 'object' => '/user/unsubscribed_otp']);
            //         }
            //     }
            // }
            // return $response->withJson(['status' => 'error', 'code' => '1', 'text' => 'Something went wrong!!', 'uid' => '' ,'object' => 'otp']);
        }         
    }