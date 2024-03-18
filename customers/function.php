<?php
    require '../products/connection.php';

    function error422($message){
        $data=[
            'status'=>422,
            'message'=>$message,
        ];
        header("HTTp/1.0 422 Unprocessable Entity");
        echo json_encode($data);
        exit();
    }

    function storeCustomer($customerInput){
        global $conn;

        $Full_Name=mysqli_real_escape_string($conn,$customerInput['Full_Name']);
        $Username=mysqli_real_escape_string($conn,$customerInput['Username']);
        $Email=mysqli_real_escape_string($conn,$customerInput['Email']);
        $Phno=mysqli_real_escape_string($conn,$customerInput['Phno']);
        $Password=mysqli_real_escape_string($conn,$customerInput['Password']);
        $Gender=mysqli_real_escape_string($conn,$customerInput['Gender']);
        if(empty(trim($Full_Name))){
            return error422("Enter your Fullname");
        }else if(empty(trim($Username))){
            return error422("Enter your username");
        }
        else if(empty(trim($Email))){
            return error422("Enter your email");
        }
        else if(empty(trim($Password))){
            return error422("Enter your password");
        }
        else if(empty(trim($Phno))){
            return error422("Enter your phn no");
        }
        else if(empty(trim($Gender))){
            return error422("Enter your gender");
        }
        else{
            $query="INSERT INTO customer_details (Full_Name,username,Email,Phno,Password,Gender) VALUES ('$Full_Name','$Username','$Email','$Phno','$Password','$Gender')";
            $result=mysqli_query($conn,$query);

            if($result){
                $data=[
                    'status'=>201,
                    'message'=>'Customer added successfully',
                ];
                header("HTTp/1.0 201 created");
                return json_encode($data);
            }
            else{
                $data=[
                    'status'=>500,
                    'message'=>'Internal server error',
                ];
                header("HTTp/1.0 500 Internal server error");
                return json_encode($data);
            }
        }
    }


    function getCustomerList(){
        global $conn;

        $query="SELECT * FROM Customer_details";
        $query_run=mysqli_query($conn,$query);

        if($query_run){
            
            if(mysqli_num_rows($query_run)>0){

                $res=mysqli_fetch_all($query_run,MYSQLI_ASSOC);
                
                $data=[
                    'status'=>200,
                    'message'=>'Customer List Fetched successfully',
                    'data'=>$res,
                ];
                header("HTTp/1.0 200 OK");
                echo json_encode($data);
            }
            else
            {
                $data=[
                    'status'=>404,
                    'message'=>$requestMethod.'No Customer Found',
                ];
                header("HTTp/1.0 404 No Customer Found");
                return json_encode($data);
            }
        }
        else{
            $data=[
                'status'=>500,
                'message'=>$requestMethod.'Internal Server Error',
            ];
            header("HTTp/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }

?>