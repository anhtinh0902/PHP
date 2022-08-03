<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// $_SERVER["PHP_SELF"]: trả về trên file hiện tại, gửi dữ liệu về chính trang này 
// khai báo biến chứa dữ liệu người dùng nhập vào:
$code=$name=$email=$phone=$pass=$gender="";
// khai báo biến chứa khi có lỗi
$codeErr=$nameErr=$emailErr=$phoneErr=$passErr=$genderErr="";
// khi người dùng nhấn nút submit thì nó gửi dữ liệu về chính trang hiện tại
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    // kiểm tra code
    if(empty($_POST['code']))
    {
        $codeErr="mss ko được rỗng";
    }
    else{// CÓ nhập vào thì phải kiểm tra nhập đúng hay sai MSS123456789
        $code=test_input($_POST['code']);
        if(!preg_match("/^(MSS|mss|Mss)\d{9}$/",$code))
        {
            $codeErr="mssv nhập sai";
        }

    }
    // kiểm tra tên
    if(empty($_POST['name']))
    {
        $nameErr="name ko được rỗng";
    }
    else{// CÓ nhập vào thì phải kiểm tra nhập đúng hay sai MSS123456789
        $name=test_input($_POST['name']);
        if(!preg_match("/^[a-zA-Z]*$/",$name))
        {
            $nameErr="tên nhập sai";
        }

    }
    // kiểm tra email
    if(empty($_POST['email']))
    {
        $emailErr="name ko được rỗng";
    }
    else{// CÓ nhập vào thì phải kiểm tra nhập đúng hay sai MSS123456789
        $email=test_input($_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $emailErr="email nhập sai";
        }

    }
    // kiểm tra số dt
    if(empty($_POST['phone']))
    {
        $phoneErr="phone ko được rỗng";
    }
    else{// CÓ nhập vào thì phải kiểm tra nhập đúng hay sai MSS123456789
        $phone=test_input($_POST['phone']);
        if(!preg_match("/^[0]{1}[\d]{9,10}$/",$phone))
        {
            $phoneErr="phone nhập sai";
        }

    }
    // kiểm tra pass
    if(empty($_POST['pass']))
    {
        $passErr="pass ko được rỗng";
    }
    else{// CÓ nhập vào thì phải kiểm tra nhập đúng hay sai MSS123456789
        $pass=test_input($_POST['pass']);
        if(!preg_match("/^[A-Z]([\w\.@#!$%^*()]+){6,}$/",$pass))
        {
            $passErr="pass nhập sai";
        }

    }
    // kiểm tra giới tính
    if(empty($_POST['gender']))
    {
        $genderErr="pass ko được rỗng";
    }
    else{// CÓ nhập vào thì phải kiểm tra nhập đúng hay sai MSS123456789
        $gender=$_POST['gender'];

    }

}
// hàm kiểm tra khoảng trắng và bị thay đổi dữ liệu
function test_input($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" >
<p>PHP FORM</p>
<!-- MSS00001 -->
    Code ID:
    <input type="text" name="code" id="" value="<?php if(isset($code)) echo $code;?>">
    <span class="error">*<?php if(isset($codeErr)) echo $codeErr?></span><br><br>
    Name:
    <input type="text" name="name" id="" value="<?php if(isset($name)) echo $name;?>">
    <span class="error">*<?php if(isset($nameErr)) echo $nameErr;?></span><br><br>
    Email:
    <input type="text" name="email" id="" value="<?php if(isset($email)) echo $email;?>">
    <span class="error">*<?php if(isset($emailErr)) echo $emailErr;?></span><br><br>
    Phone:
    <input type="text" name="phone" id="" value="<?php if(isset($phone)) echo $phone;?>">
    <span class="error">*<?php if(isset($phoneErr)) echo $phoneErr;?></span><br><br>
    <!-- ký tự đầu là in hoa chuỗi là số, ký tự đặt biệt độ dài tối thiểu là 6 ký thự -->
    Pass:
    <input type="password" name="pass" id=""value="<?php if(isset($pass)) echo $pass;?>">
    <span class="error">*<?php if(isset($passErr)) echo $passErr;?></span><br><br>
    Comment:
    <textarea name="comment" id="" cols="30" rows="10"></textarea><br><br>
    Gender:
    <input type="radio" name="gender" id="" <?php if(isset($gender)&& $gender=="female") echo "checked";?>  value="female">Female
    <input type="radio" name="gender" id="" <?php if(isset($gender)&& $gender=="male") echo "checked";?>  value="male">Male
    <input type="radio" name="gender" id="" <?php if(isset($gender)&& $gender=="other") echo "checked";?> value="other">Other
    <span class="error">*<?php if(isset($genderErr)) echo $genderErr;?></span><br><br>
    <!-- submit -->
    <input type="submit" value="Submit">
</form>
<?php
echo $code;
echo "<br/>";
echo $name;
?>

</body>
</html>