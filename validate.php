<?php
$msg='';
$msgClass='';

if(filter_has_var(INPUT_POST , 'submit')){

    $Name = htmlspecialchars($_POST['Name']);
    $Email = htmlspecialchars($_POST['Email']);
    $Comment = htmlspecialchars($_POST['Comment']);


if(!empty($Email) && !empty($Name) && !empty($Comment)){
    
    if(filter_var($Email, FILTER_VALIDATE_EMAIL) === false){

        $msg='Please use a valid Email';
        $msgClass='alert-danger';
    }
    else
    {
        $toEmail='ankita@gmail.com';
        $subject='Contact Request from'.$Name;
        $body='<h2>Contact Request</h2>
        <h4>Name</h4><p>'.$Name.'</p>'
        '<h4>Email</h4><p>'.$Email.'</p>'
        '<h4>Comment</h4><p>'.$Comment.'</p>';

        $headers = "MIME-Version:1.0"."\r\n";
        $headers.= "Content-Type:text/html;charset=UTF-8"."\r\n";
        .$headers.="From".$Name."<".$Email.">"."\r\n";

        if(mail($toEmail,$subject,$body,$headers)){

            $msg='Your Email has been sent';
            $msgClass='alert-success';
        }
        else
        {
            $msg='Your Email was not sent';
            $msgClass='alert-danger';
        }
    }
}
else{

    $msg ='Please fill in all fields';
    $msgClass='alert-danger';
}
}
?>