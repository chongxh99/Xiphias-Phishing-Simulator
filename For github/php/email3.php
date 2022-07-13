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
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
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
                                <td style="background-color: #007042; padding: 10px; text-align: center; ">
                                    <a href=""><img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_starbucks/starbukcs_logo.jpg" width="180" alt="Logo" title="Logo"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td><a href="#"><img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_starbucks/starbucks_banner.png"
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
                                                        <td><a href="#"><img class="thrd-img; center" src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_starbucks/starbucks_promo1.jpg" width="150" style="max-width: 150px; " alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">
                                                            <p style="font-size: 17px; font-weight: bold; text-align: center;">STARBUCKS 50% DISCOUNT PROMOTION</p>
                                                            <P style="text-align: center;">Welcome to our Starbucks coupons page, explore the latest verified starbucks.com discounts and promos for May 2022. Today, there is a total of 9 Starbucks coupons and discount deals. 
                                                                You can quickly filter today's Starbucks promo codes in order to find exclusive or verified offers. 
                                                                Follow and check our Starbucks coupon page daily for new promo codes, discounts, free shipping deals and more.</P>
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
                                                        <td><a href="#"><img class="thrd-img; center" src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_starbucks/starbucks_promo2.jpg" width="150" 
                                                            style="max-width: 150px" alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">
                                                            <p style="font-size: 17px; font-weight: bold; text-align: center;">STARBUCKS 20% DISCOUNT PROMOTION</p>
                                                            <P style="text-align: center;">Welcome to our Starbucks coupons page, explore the latest verified starbucks.com discounts and promos for May 2022. Today, there is a total of 9 Starbucks coupons and discount deals. 
                                                                You can quickly filter today's Starbucks promo codes in order to find exclusive or verified offers. 
                                                                Follow and check our Starbucks coupon page daily for new promo codes, discounts, free shipping deals and more.</P>
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
                                    <img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_apple/social_media_icon3.jpg" width="175" alt="">
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