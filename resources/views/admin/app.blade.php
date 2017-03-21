<!DOCTYPE HTML>
<html>

<!-- Mirrored from www.extracoding.com/demo/html/adminise/layouts1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Mar 2017 21:54:23 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Adminise - Clean And Corporate Admin Panel Template</title>
    <!--// Stylesheets //-->
    <link href="assets/css/style.css" rel="stylesheet" media="screen" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
    <link href="css/bootstrap-tagsinput.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--// Javascript //-->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
    <script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/js/icheck.min.js"></script>
    <script type="text/javascript" src="assets/js/selectnav.min.js"></script>
    <script type="text/javascript" src="assets/js/functions.js"></script>
    <script type="text/javascript" src="js/bootstrap-tagsinput.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <script>
        function getCities() {
            console.log('d');
            if ($('#countries').val().length > 1){
                var country = $(this).val();
                console.log(country);
                // $.ajax({url: "/getCities/" + country, success: function(result){
                //     $("#div1").html(result);
                // }});
            }
        }
    </script>
    <![endif]-->
</head>
<body>
<!-- Wrapper Start -->
@yield('panel')
<!-- Wrapper End -->

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42761673-1', 'extracoding.com');
    ga('send', 'pageview');

</script>


</body>

<!-- Mirrored from www.extracoding.com/demo/html/adminise/layouts1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Mar 2017 21:54:26 GMT -->
</html>
