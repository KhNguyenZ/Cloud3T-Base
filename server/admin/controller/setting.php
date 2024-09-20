<?php
        if(isset($_POST['btnSaveSetting']))
        {
            $Logo = $_POST['Logo'];
            $Title = $_POST['Title'];
            $Owner = $_POST['Owner'];
            $Fav = $_POST['Fav'];
            $Copyright = $_POST['Copyright'];
            $APIKey = $_POST['APIKey'];
            $APIID = $_POST['APIID'];
            $notify = base64_encode($_POST['notify']);
            $sqlquery = "UPDATE `settings` SET
            `Logo` = '$Logo', 
            `Title` = '$Title', 
            `Owner` = '$Owner', 
            `Fav` = '$Fav', 
            `Copyright` = '$Copyright',
            `APIKey` = '$APIKey', 
            `APIID` = '$APIID',
            `ThongBao` = '$notify'
            ";
            $update = $KNCMS->query($sqlquery);
            if($update) $KNCMS->msg_success("Lưu thành công", "", 1000);
            else $KNCMS->msg_warning("Lưu thất bại | ".$sqlquery, "", 10000);
        }
        ?>