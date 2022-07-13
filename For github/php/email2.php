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
                                <td style="background-color: #FFFFFF; padding: 10px; text-align: center; ">
                                    <a href=""><img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_netflix/netflix_logo.jpg" width="180" alt="Logo" title="Logo"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td><a href="#"><img src="https://hubbuddies.com/271317/xiphias/assets/image/netflix_banner.png"
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
                                                        <td><a href="#"><img class="thrd-img; center" src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_netflix/netflix_promocode1.jpg" width="150" style="max-width: 150px; " alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">
                                                            <p style="font-size: 17px; font-weight: bold; text-align: center;">NETFLIX PROMOTION CODE</p>
                                                            <P>Looking for Netflix promo codes that work? We’ve got you covered. As Netflix continues to add hundreds of new TV shows and 
                                                                movies to its streaming service, more and more people are trying to get a subscription at a discount</P>
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
                                                        <td><a href="#"><img class="thrd-img; center" src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_netflix/netflix_freeacc.png" width="150" 
                                                            style="max-width: 150px" alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">
                                                            <p style="font-size: 17px; font-weight: bold; text-align: center;">NETFLIX FREE ACCOUNT</p>
                                                            <P>You can download TV shows and movies for later watching offline on the Netflix app and it does not count towards
                                                                 the limit of how many screens you can watch simultaneously on.</P>
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
                                <td style="background-color: #FFFFFF; padding:15px; text-align: center;">
                                    <p style="font-size: 18px; color: #0E0C0D; margin-bottom:13px">Connect with us</p>
                                    <img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_netflix/social_media_icon2.jpg" width="300" alt="">
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