<style>

    address {
        font-size: 12px;
    }

    address ul li {
        display: inline;
        list-style-type: none;
        color: white;
    }

</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}" type="text/css">
</head>
<body>
<footer id="page-footer">
    <div class="inner">
        <section id="footer-main">
            <div class="container-news">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <article class="contact-us">
                            <br><br><br><br><br>
                            <object class="comp-logo">
                            </object>
                            <address>

                                <ul>

                                        <li style="float: left;margin-right: 20px;"><?php echo $footer->data->compAddress?></li>
                                        <li style="float: left;"><i
                                                    class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;<?php echo $footer->data->compPhone1 .
                                                    '<br>' . '<i class="fa fa-fax"></i>' . '&nbsp;&nbsp;' . $footer->data->compFax1 . '<br>' .
                                                    '<i class="fa fa-envelope"></i>' . '&nbsp;&nbsp;&nbsp;' . $footer->data->compEmail;?>
                                        </li>

                                </ul>
                            </address>

                            <br><br><br><br><br><br><br>
                        </article>
                    </div>
                </div><!-- /.col-sm-3 -->
            </div><!-- /.row -->
        </section>
    </div><!-- /.container -->

    <section id="footer-thumbnails" class="footer-thumbnails"></section><!-- /#footer-thumbnails -->

</footer>
</body>
</html>

