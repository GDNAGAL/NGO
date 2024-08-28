<?php
class User {
    public $UserID;
    public $FullName;
    public $Email;
    public $isEmailVerified;
    public $MobileNo;
    public $isMobileVerified;
    public $isAdminUser;
    public $isNGOUser;
    public $Role;

    public function __construct($row) {
        $this->UserID = $row['ID'];
        $this->FullName = $row['FullName'];
        $this->Email = $row['Email'];
        $this->isEmailVerified = $row['isEmailVerified'];
        $this->MobileNo = $row['MobileNo'];
        $this->isMobileVerified = $row['isMobileVerified'];
        $this->isAdminUser = $row['isAdmin'];
        $this->isNGOUser = $row['isNGOUser'];

        if($this->isAdminUser){
            $this->Role = "ADMIN";
        }else if($this->isNGOUser){
            $this->Role = "NGOUSER";
        }else{
            $this->Role = "VISITOR";
        }
    }
}
?>
