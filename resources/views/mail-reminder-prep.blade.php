<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Reminder Email</title>
    <style>
        /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */

        /*All the styling goes here*/

        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
        }

        body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%;
        }

        table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: center;
            padding: 5px;
        }

        /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

        .body {
            background-color: #f6f6f6;
            width: 100%;
        }

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px;
        }

        /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
        .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%;
        }

        .wrapper {
            box-sizing: border-box;
            padding: 20px;
        }

        .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .footer {
            clear: both;
            margin-top: 10px;
            text-align: center;
            width: 100%;
        }

        .footer td,
        .footer p,
        .footer span,
        .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center;
        }

        /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize;
        }

        p,
        ul,
        ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px;
        }

        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px;
        }

        a {
            color: #3498db;
            text-decoration: underline;
        }

        /* -------------------------------------
          BUTTONS
      ------------------------------------- */
        .btn {
            box-sizing: border-box;
            width: 100%;
        }

        .btn>tbody>tr>td {
            padding: 5px 0;
        }

        .btn table {
            width: auto;
        }

        .btn table td {
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center;
        }

        .btn a {
            background-color: #ffffff;
            border: solid 1px #3498db;
            border-radius: 5px;
            box-sizing: border-box;
            color: #3498db;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            padding: 6px 25px;
            text-decoration: none;
            text-transform: capitalize;
        }

        .btn-primary table td {
            background-color: #3498db;
        }

        .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff;
        }

        /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .align-center {
            text-align: center;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .clear {
            clear: both;
        }

        .mt0 {
            margin-top: 0;
        }

        .mb0 {
            margin-bottom: 0;
        }

        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0;
        }

        .powered-by a {
            text-decoration: none;
        }

        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0;
        }

        /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
        @media only screen and (max-width: 620px) {
            table.body h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }

            table.body p,
            table.body ul,
            table.body ol,
            table.body td,
            table.body span,
            table.body a {
                font-size: 16px !important;
            }

            table.body .wrapper,
            table.body .article {
                padding: 10px !important;
            }

            table.body .content {
                padding: 0 !important;
            }

            table.body .container {
                padding: 0 !important;
                width: 100% !important;
            }

            table.body .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }

            table.body .btn table {
                width: 100% !important;
            }

            table.body .btn a {
                width: 100% !important;
            }

            table.body .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
        }

        /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
            }

            .btn-primary table td:hover {
                background-color: #34495e !important;
            }

            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
            }
        }
        .list-item {
            list-style-position: outside
        }

        ul {
            margin-bottom: 3em;
        }
        ul li+li {
            margin-top: 1em;
        }

    </style>
</head>

<body>
    <img src="{{ asset('img/email.webp') }}" alt="Annifest 2023">
    <span class="preheader">This is your chance to get to know your dream universities!</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>
            <td>&nbsp;</td>
            <td class="container">
                <div class="content">

                    <!-- START CENTERED WHITE CONTAINER -->
                    <table role="presentation" class="main">

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <p>
                                                {{-- <label style="font-size: 16px;">Hi {{ $client->fullname }}!</label> --}}
                                            </p>
                                            <br>
                                            <p>
                                                ANNIFEST Uni Prep Talk will be held <b>TOMORROW!</b>
                                            </p>
                                            <p>
                                                Are you ready to get the gist of what will happen and what you should do and strategize in your university application game plan?
                                            </p>
                                            <p>
                                                Remember, after attending ANNIFEST Uni Prep Talk, we???ll make sure you???ll get to know:
                                                <ul>
                                                    <li class="list-item">What happens in top universities??? admission assessment from UC Berkeley???s admission officer</li>
                                                    <li class="list-item">The list of trending majors based on future career prospects from the UK, Australian, and Asia universities' perspectives</li>
                                                    <li class="list-item">Be ready at the age of uncertainty and how to build your unique profile and be successful post-university life</li>
                                                    <li class="list-item">How to improve your university profile and essay, and have yours reviewed directly by ALL-in mentors</li>
                                                </ul>
                                            </p>
                                            <p style="text-align: center">
                                                Are you excited? Come and join us tomorrow!
                                            </p>
                                            <a href="https://us02web.zoom.us/j/87219434605?pwd=QUU3bE1kS0l1dENmL3J3NEMyT0Fmdz09">
                                                <button class="btn btn-primary" style="cursor:pointer; padding-top: 10px; padding-bottom: 10px; border: none; background-color: #3498db; color: #ffffff;">Uni Prep Talk</button>
                                            </a>
                                            <p style="text-align: center">
                                                The link will be active on 15 April 2023
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- END MAIN CONTENT AREA -->
                    </table>
                    <!-- END CENTERED WHITE CONTAINER -->

                    <!-- START FOOTER -->
                    <div class="footer">
                        <table>

                            <tr>
                
                                <td class="content-block" style="text-align: left">
                
                                    <img src="{{ asset('img/logo-allin-white.webp') }}" alt="" style="width: 80px">
                
                                </td>
                
                                <td class="content-block" style="text-align: right">
                
                                    <a href="mailto:info@all-inedu.com" target="_blank" class="text-decoration-none text-white">
                
                                        <img src="{{asset('img/icon/icons8-mail-48.png')}}" alt="" style="width:20px">
                
                                        </a>
                
                                    <a href="https://www.facebook.com/allineduspace/" target="_blank"
                
                                        class="text-decoration-none text-white">
                
                                        <img src="{{asset('img/icon/icons8-facebook-60.png')}}" alt="" style="width:20px">
                
                                    </a>
                
                                    <a href="https://www.instagram.com/allineduspace/" target="_blank"
                
                                        class="text-decoration-none text-white">
                
                                        <img src="{{asset('img/icon/icons8-instagram-60.png')}}" alt="" style="width:20px">
                
                                    </a>
                
                                    <a href="https://www.youtube.com/@allineduspace" target="_blank"
                
                                        class="text-decoration-none text-white">
                
                                        <img src="{{asset('img/icon/icons8-youtube-60.png')}}" alt="" style="width:20px">
                
                                    </a>
                
                                </td>
                
                            </tr>
                
                        </table>
                
                    </div>
                    <!-- END FOOTER -->

                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</body>

</html>
