  <?php
function password_validation($password){
    if(!empty($password)){
        if(preg_match('/[A-Z]/', $password)){
            if (preg_match('/[a-z]/',$password)){
                if (preg_match('/[0-9]/',$password)){
                    return $password;
                }else{
                    return"Number required";
                }
            }else{
                return"At least one small letter required";
            }
        }else{
            return 'At least one capital letter required';
        }
    }else{
        return "Password required";
    }
}

function email_validation($email){

    if (!empty($email))
    {
        $domain = ltrim(stristr($email, '@'), '@') . '.';
        $user   = stristr($email, '@', TRUE);

        if(!empty($user) && !empty($domain) && checkdnsrr($domain)) {
            return $email;
        }else{
            return "This input must be email";
        }
    }else{
        return "Email Required";
    }
}

$type = explode('/',$_SERVER['HTTP_REFERER']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($type[3]) && $type[3] === 'registeration.html'){
    //this is registeration page validations just incase if it is needed in php rather than javascript
    }
    else{ //this is login page validations
        $password = password_validation($_POST['password']);
        $email = email_validation($_POST['email']);
    }
}else{
    echo "Cannot get request";
}
?>