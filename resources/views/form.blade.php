<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->

    <!-- fav and touch icons -->
    <style type="text/css" id="enject">

        table
        {
            border-collapse:collapse;
        }
        table, td, th
        {
            border:1px solid #e3e3e3;
        }
        select{
            width:100%;
            border:0;
            border:none;
            margin-bottom: 0;
        }
        input{

            border:0;
            border:none;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                <div class="well well-small">System Menu</div>
                <ul id="sideManu" class="nav nav-tabs nav-stacked">
                    <li class="subMenu open"><a> 127.0.0.1:80</a>
                        <ul>
                            <li><a class="active" ><i class="icon-chevron-right"></i>127.0.0.1:80 </a></li>
                            <li><a ><i class="icon-chevron-right"></i>127.0.0.1:80</a></li>
                            <li><a ><i class="icon-chevron-right"></i>127.0.0.1:80</a></li>
                            <li><a ><i class="icon-chevron-right"></i>127.0.0.1:80</a></li>
                        </ul>
                    </li>
                    <li class="subMenu"><a> 127.0.0.1:90 </a>
                        <ul style="display:none">
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                        </ul>
                    </li>
                    <li class="subMenu"><a>127.0.0.1:10</a>
                        <ul style="display:none">
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                            <li><a ><i class="icon-chevron-right"></i> 127.0.0.1:90</a></li>
                        </ul>
                    </li>
                    <li><a >127.0.0.1:8080</a></li>
                    <li><a >127.0.0.1:9090</a></li>
                    <li><a >127.0.0.1:1010</a></li>
                </ul>
                <br/>

            </div>
            <!-- Sidebar end=============================================== -->
            <div class="span9" id="mainCol">
                <ul class="breadcrumb">
                    <li><a href="index.html">System Menu</a> <span class="divider">/</span></li>
                    <li class="active">127.0.0.1:80</li>
                </ul>

                <hr class="soft"/>

                <table>

                    <tr>
                        <th >Name</th>
                        <th >IP:Port</th>
                        <th >Time</th>
                        <th >LogLevel</th>
                        <th >State</th>
                        <th >Set State</th>
                        <th >Send Command</th>
                        <th >Send</th>
                    </tr>
                    @foreach($ips as $ip)
                    <tr>
                        <td>{{$ip->name}}</td>
                        <td>{{$ip->ip}}:{{$ip->port}}</td>
                        <td>Jobs</td>
                        <td>
                            <select class="srchTxt" >
                                <option value="">Trace</option>
                                <option value="">Debug</option>
                                <option value="">Warming</option>
                            </select >
                        </td>
                        <td>Online</td>
                        <td>
                            <select >
                                <option value="">Online</option>
                                <option value="">Offline</option>
                            </select >
                        </td>
                        <td>
                            <input  type="text" >
                        </td>
                        <td>
                            <button class="btn "> Send</button>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <hr class="soft"/>

            </div>
        </div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->

<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="themes/js/jquery.js" type="text/javascript"></script>
<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="themes/js/google-code-prettify/prettify.js"></script>

<script src="themes/js/bootshop.js"></script>
<script src="themes/js/jquery.lightbox-0.5.js"></script>

<!-- Themes switcher section ============================================================================================= -->

<span id="themesBtn"></span>
</body>
</html>