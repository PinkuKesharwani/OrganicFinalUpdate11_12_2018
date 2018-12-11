<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .our-team{
            text-align: center;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }
        .our-team:before,
        .our-team:after{
            content: "";
            width: 130px;
            height: 150px;
            background: #00bed3;
            position: absolute;
            z-index: -1;
        }
        .our-team:before{
            bottom: -20px;
            left: 0;
        }
        .our-team:after{
            top: -20px;
            right: 0;
        }
        .our-team .pic{
            margin: 20px;
            position: relative;
            border: 3px solid #00bed3;
            transition: all 0.5s ease 0s;
        }
        .our-team:hover .pic{
            border-color: #33343e;
        }
        .our-team .pic:after{
            content: "";
            width: 100%;
            height: 0;
            background: #33343e;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transform-origin: 0 0 0;
            transition: all 0.5s ease 0s;
        }
        .our-team:hover .pic:after{
            height: 100%;
            opacity: 0.85;
        }
        .our-team img{
            width: 100%;
            height: auto;
        }
        .our-team .team-content{
            width: 100%;
            position: absolute;
            top: -50%;
            left: 0;
            transition: all 0.5s ease 0.2s;
        }
        .our-team:hover .team-content{
            top: 38%;
        }
        .our-team .title{
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            margin: 0 0 5px 0;
        }
        .our-team .post{
            font-size: 14px;
            color: #fff;
            line-height: 26px;
            text-transform: capitalize;
        }
        .our-team .social{
            padding: 0;
            margin: 40px 0 0 0;
            list-style: none;
        }
        .our-team .social li{
            display: inline-block;
        }
        .our-team .social li a{
            display: inline-block;
            width: 35px;
            height: 35px;
            line-height: 35px;
            border-radius: 50%;
            border: 1px solid #fff;
            font-size: 18px;
            color: #fff;
            margin: 0 7px;
            transition: all 0.5s ease 0s;
        }
        .our-team .social li a:hover{
            background: #fff;
            color: #00bed3;
        }
        @media only screen and (max-width: 990px){
            .our-team{ margin-bottom: 30px; }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="our-team">
                <div class="pic">
                    <img src="bijju.jpg" alt="">
                </div>
                <div class="team-content">
                    <h3 class="title">Bijendra Sahu</h3>
                    <span class="post">Sr. Softwere developer</span>
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="our-team">
                <div class="pic">
                    <img src="aadi.JPG" alt="">
                </div>
                <div class="team-content">
                    <h3 class="title">Aditya Shrivastava</h3>
                    <span class="post">Jr. Softwere developer</span>
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>




