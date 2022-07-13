<?php
    $email = $_GET["email"];
    $template = $_GET["template"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style type="text/css">
        body {
            Margin: 0;
            padding: 0;
            background-color: #f6f9fc;
        }
        table  {
            border-spacing: 0;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f6f9fc;
            padding-bottom: 40px;
        }
        .webkit {
            max-width: 600px;
            background-color: #ffffff;
        }
        .outer {
            Margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: sans-serif;
            color: #4a4a4a;
        }
        .three-columns {
            text-align: center;
            font-size: 0;
            padding-top: 40px ;
            padding-bottom: 30px;
        }
        .three-columns .column {
            width: 100%;
            max-width: 200px;
            display: inline-block;
            vertical-align: top;
        }
        .padding {
            padding: 15px;
        }
        .three-columns .content {
            font-size: 15px;
            line-height: 20px;
        }
        a {
            text-decoration: none;
            color: #388CDA;
            font-size: 16px;
        }

        @media screen and (max-width: 600px) {
            img.third-img-last {
                width:200px!important;
                max-width:200px!important;
            }
        }
        @media screen and (max-width: 400px) {
            img.third-img-last {
                width:200px!important;
                max-width:200px!important;
            }
        }
    </style>
</head>
<body>

    <center class="wrapper">
        <div class="webkit">
            <table class="outer" style="align-items:center">
                
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr>
                                <td style="background-color: #D6D7DD; padding:10px; text-align: center; ">
                                    <a href=""><img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_apple/apple_logo3.jpg" width="180" alt="Logo" title="Logo"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td><a href="#"><img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_apple/apple_promotion1.jpg"
                          alt="Banner" style="max-width: 100%;"></a></td>
                </tr>
                
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr>
                                <td class="three columns">
                                    <table class="column">
                                        <tr>
                                            <td class="padding">
                                                <table class="content">
                                                    <tr>
                                                        <td><a href="#"><img class="thrd-img" src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_apple/apple_product1.jpg" width="150" style="max-width: 150px" alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">
                                                            <p style="font-size: 17px; font-weight: bold;">MACBOOK + IPHONE COMBO</p>
                                                            <P>These two latest product will be sell in a promotion price if 
                                                                you buy both at one time from the link below.</P>
                                                             <form id="form__submit" action="" method="post">
                                                            <a href="https://hubbuddies.com/271317/xiphias/php/phishing.php?email=<?php echo $email ?>&template=<?php echo $template ?>" name="phishingEmail">Learn more..</a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="column">
                                        <tr>
                                            <td class="padding">
                                                <table class="content">
                                                    <tr>
                                                        <td><a href="#"><img class="thrd-img" src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_apple/apple_product2.jpg" width="150" 
                                                            style="max-width: 150px" alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">
                                                            <input type="hidden" value="<? echo $email ?>" class="form-control" id="password" name="password">
                                                            <p style="font-size: 17px; font-weight: bold;">IPHONE + APPLE WATCH</p>
                                                            <P>These two latest product will be sell in a promotion 
                                                                price if you buy both at one time from the link below.</P>
                                                            <a href="https://hubbuddies.com/271317/xiphias/php/phishing.php?email=<?php echo $email ?>&template=<?php echo $template ?>" name="phishingEmail">Learn more..</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="column">
                                        <tr>
                                            <td class="padding">
                                                <table class="content">
                                                    <tr>
                                                        <td><a href="#"><img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_apple/apple_product3.jpg" width="150" 
                                                            style="max-width: 150px" alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">
                                                            <p style="font-size: 17px; font-weight: bold;">APPLE FAMILY BUNDLE</p>
                                                            <P>The family bundle set contain most of the latest product to be sell in a promotion 
                                                                price if you buy this bundle set at one time from the link below.</P>
                                                            <a href="https://hubbuddies.com/271317/xiphias/php/phishing.php?email=<?php echo $email ?>&template=<?php echo $template ?>" name="phishingEmail">Learn more..</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr>
                                <td style="background-color: #D6D7DD; padding:15px; text-align: center;">
                                    <p style="font-size: 18px; color: #ffffff; margin-bottom:13px">Connect with us</p>
                                    <img src="../assets/image/email template (apple)/social media icon 3.jpg" width="175" alt="">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </div>
    </center>
    
</body>
</html>