<?php

class Login_model extends Dbh
{
    protected function getUser($uid, $pwd)
    {
        $sql = "SELECT users_pwd FROM users WHERE users_uid =? or users_email = ?";
        $stmt = $this->connect()->prepare($sql);


        if (!$stmt->execute([$uid, $pwd])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkPwd == true) {
            $sql = "SELECT * FROM users WHERE users_uid =? or users_email = ? AND users_pwd = ?";
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute([$uid, $uid, $pwd])) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            $stmt = null;
        }
    }
}
