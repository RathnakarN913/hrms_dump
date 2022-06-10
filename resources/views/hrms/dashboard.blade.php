@include('headers.common_header')


<link rel="stylesheet" href="https://egovindia.in/pmsvanidhi/assets_admin/Tsharithaharam/css/custom.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
    google.charts.load('current', {packages: ['corechart']});
</script>
<style>


.progress-circle {
   font-size: 20px;
   margin: 20px auto;
   position: relative; /* so that children can be absolutely positioned */
   padding: 0;
   width: 5em;
   height: 5em;
   background-color: #c1c1c1; 
   border-radius: 50%;
   line-height: 5em;
}

.progress-circle:after{
    border: none;
    position: absolute;
    top: 0.35em;
    left: 0.35em;
    text-align: center;
    display: block;
    border-radius: 50%;
    width: 4.3em;
    height: 4.3em;
    background-color: white;
    content: " ";
}
/* Text inside the control */
.progress-circle span {
    position: absolute;
    line-height: 5em;
    width: 5em;
    text-align: center;
    display: block;
    color: #53777A;
    z-index: 2;
}
.left-half-clipper {
   /* a round circle */
   border-radius: 50%;
   width: 5em;
   height: 5em;
   position: absolute; /* needed for clipping */
   clip: rect(0, 5em, 5em, 2.5em); /* clips the whole left half*/
}
/* when p>50, don't clip left half*/
.progress-circle.over50 .left-half-clipper {
   clip: rect(auto,auto,auto,auto);



}

.value-bar {
   /*This is an overlayed square, that is made round with the border radius,
   then it is cut to display only the left half, then rotated clockwise
   to escape the outer clipping path.*/
   position: absolute; /*needed for clipping*/
   clip: rect(0, 2.5em, 5em, 0);
   width: 5em;
   height: 5em;
   border-radius: 50%;
   border: 0.45em solid #590c74; /*The border is 0.35 but making it larger removes visual artifacts */
   /*background-color: #4D642D;*/ /* for debug */
   box-sizing: border-box;

}
/* Progress bar filling the whole right half for values above 50% */
.progress-circle.over50 .first50-bar {
   /*Progress bar for the first 50%, filling the whole right half*/
   position: absolute; /*needed for clipping*/
   clip: rect(0, 5em, 5em, 2.5em);
   background-color: #590c74;
   border-radius: 50%;
   width: 5em;
   height: 5em;
}
.progress-circle:not(.over50) .first50-bar{ display: none; }


/* Progress bar rotation position */
.progress-circle.p0 .value-bar { display: none; }
.progress-circle.p1 .value-bar { transform: rotate(4deg); }
.progress-circle.p2 .value-bar { transform: rotate(7deg); }
.progress-circle.p3 .value-bar { transform: rotate(11deg); }
.progress-circle.p4 .value-bar { transform: rotate(14deg); }
.progress-circle.p5 .value-bar { transform: rotate(18deg); }
.progress-circle.p6 .value-bar { transform: rotate(22deg); }
.progress-circle.p7 .value-bar { transform: rotate(25deg); }
.progress-circle.p8 .value-bar { transform: rotate(29deg); }
.progress-circle.p9 .value-bar { transform: rotate(32deg); }
.progress-circle.p10 .value-bar { transform: rotate(36deg); }
.progress-circle.p11 .value-bar { transform: rotate(40deg); }
.progress-circle.p12 .value-bar { transform: rotate(43deg); }
.progress-circle.p13 .value-bar { transform: rotate(47deg); }
.progress-circle.p14 .value-bar { transform: rotate(50deg); }
.progress-circle.p15 .value-bar { transform: rotate(54deg); }
.progress-circle.p16 .value-bar { transform: rotate(58deg); }
.progress-circle.p17 .value-bar { transform: rotate(61deg); }
.progress-circle.p18 .value-bar { transform: rotate(65deg); }
.progress-circle.p19 .value-bar { transform: rotate(68deg); }
.progress-circle.p20 .value-bar { transform: rotate(72deg); }
.progress-circle.p21 .value-bar { transform: rotate(76deg); }
.progress-circle.p22 .value-bar { transform: rotate(79deg); }
.progress-circle.p23 .value-bar { transform: rotate(83deg); }
.progress-circle.p24 .value-bar { transform: rotate(86deg); }
.progress-circle.p25 .value-bar { transform: rotate(90deg); }
.progress-circle.p26 .value-bar { transform: rotate(94deg); }
.progress-circle.p27 .value-bar { transform: rotate(97deg); }
.progress-circle.p28 .value-bar { transform: rotate(101deg); }
.progress-circle.p29 .value-bar { transform: rotate(104deg); }
.progress-circle.p30 .value-bar { transform: rotate(108deg); }
.progress-circle.p31 .value-bar { transform: rotate(112deg); }
.progress-circle.p32 .value-bar { transform: rotate(115deg); }
.progress-circle.p33 .value-bar { transform: rotate(119deg); }
.progress-circle.p34 .value-bar { transform: rotate(122deg); }
.progress-circle.p35 .value-bar { transform: rotate(126deg); }
.progress-circle.p36 .value-bar { transform: rotate(130deg); }
.progress-circle.p37 .value-bar { transform: rotate(133deg); }
.progress-circle.p38 .value-bar { transform: rotate(137deg); }
.progress-circle.p39 .value-bar { transform: rotate(140deg); }
.progress-circle.p40 .value-bar { transform: rotate(144deg); }
.progress-circle.p41 .value-bar { transform: rotate(148deg); }
.progress-circle.p42 .value-bar { transform: rotate(151deg); }
.progress-circle.p43 .value-bar { transform: rotate(155deg); }
.progress-circle.p44 .value-bar { transform: rotate(158deg); }
.progress-circle.p45 .value-bar { transform: rotate(162deg); }
.progress-circle.p46 .value-bar { transform: rotate(166deg); }
.progress-circle.p47 .value-bar { transform: rotate(169deg); }
.progress-circle.p48 .value-bar { transform: rotate(173deg); }
.progress-circle.p49 .value-bar { transform: rotate(176deg); }
.progress-circle.p50 .value-bar { transform: rotate(180deg); }
.progress-circle.p51 .value-bar { transform: rotate(184deg); }
.progress-circle.p52 .value-bar { transform: rotate(187deg); }
.progress-circle.p53 .value-bar { transform: rotate(191deg); }
.progress-circle.p54 .value-bar { transform: rotate(194deg); }
.progress-circle.p55 .value-bar { transform: rotate(198deg); }
.progress-circle.p56 .value-bar { transform: rotate(202deg); }
.progress-circle.p57 .value-bar { transform: rotate(205deg); }
.progress-circle.p58 .value-bar { transform: rotate(209deg); }
.progress-circle.p59 .value-bar { transform: rotate(212deg); }
.progress-circle.p60 .value-bar { transform: rotate(216deg); }
.progress-circle.p61 .value-bar { transform: rotate(220deg); }
.progress-circle.p62 .value-bar { transform: rotate(223deg); }
.progress-circle.p63 .value-bar { transform: rotate(227deg); }
.progress-circle.p64 .value-bar { transform: rotate(230deg); }
.progress-circle.p65 .value-bar { transform: rotate(234deg); }
.progress-circle.p66 .value-bar { transform: rotate(238deg); }
.progress-circle.p67 .value-bar { transform: rotate(241deg); }
.progress-circle.p68 .value-bar { transform: rotate(245deg); }
.progress-circle.p69 .value-bar { transform: rotate(248deg); }
.progress-circle.p70 .value-bar { transform: rotate(252deg); }
.progress-circle.p71 .value-bar { transform: rotate(256deg); }
.progress-circle.p72 .value-bar { transform: rotate(259deg); }
.progress-circle.p73 .value-bar { transform: rotate(263deg); }
.progress-circle.p74 .value-bar { transform: rotate(266deg); }
.progress-circle.p75 .value-bar { transform: rotate(270deg); }
.progress-circle.p76 .value-bar { transform: rotate(274deg); }
.progress-circle.p77 .value-bar { transform: rotate(277deg); }
.progress-circle.p78 .value-bar { transform: rotate(281deg); }
.progress-circle.p79 .value-bar { transform: rotate(284deg); }
.progress-circle.p80 .value-bar { transform: rotate(288deg); }
.progress-circle.p81 .value-bar { transform: rotate(292deg); }
.progress-circle.p82 .value-bar { transform: rotate(295deg); }
.progress-circle.p83 .value-bar { transform: rotate(299deg); }
.progress-circle.p84 .value-bar { transform: rotate(302deg); }
.progress-circle.p85 .value-bar { transform: rotate(306deg); }
.progress-circle.p86 .value-bar { transform: rotate(310deg); }
.progress-circle.p87 .value-bar { transform: rotate(313deg); }
.progress-circle.p88 .value-bar { transform: rotate(317deg); }
.progress-circle.p89 .value-bar { transform: rotate(320deg); }
.progress-circle.p90 .value-bar { transform: rotate(324deg); }
.progress-circle.p91 .value-bar { transform: rotate(328deg); }
.progress-circle.p92 .value-bar { transform: rotate(331deg); }
.progress-circle.p93 .value-bar { transform: rotate(335deg); }
.progress-circle.p94 .value-bar { transform: rotate(338deg); }
.progress-circle.p95 .value-bar { transform: rotate(342deg); }
.progress-circle.p96 .value-bar { transform: rotate(346deg); }
.progress-circle.p97 .value-bar { transform: rotate(349deg); }
.progress-circle.p98 .value-bar { transform: rotate(353deg); }
.progress-circle.p99 .value-bar { transform: rotate(356deg); }
.progress-circle.p100 .value-bar { transform: rotate(360deg); }











.layout-builder {
    position: fixed;
    width: 300px;
    background: white;
    z-index: 1000;
    right: -300px;
    top: 0;
    bottom: 0;
    box-shadow: 8px 0 10px 3px rgba(0, 0, 0, 0.50);
    overflow: auto;
    transition: right .2s;
}

.layout-builder.show {
    right: 0;
	display: none;
}

.layout-builder .layout-builder-toggle.shw i {
    -webkit-animation: spin 2s linear infinite;
    -moz-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
    100% {
        -webkit-transform: rotate(360deg);
    }
}

@-moz-keyframes spin {
    100% {
        -moz-transform: rotate(360deg);
    }
}

@keyframes spin {
    100% {
        transform: rotate(360deg);
    }
}

.layout-builder .layout-builder-toggle.hdn {
    display: none;
}

.layout-builder.show .layout-builder-toggle.hdn {
    display: flex;

}

.layout-builder .layout-builder-toggle {
    cursor: pointer;
    width: 50px;
    height: 50px;
    color: white;
    background: black;
    position: fixed;
    top: 50%;
    margin-left: -50px;
    display: none;
    font-size: 23px;
    justify-content: center;
    align-items: center;
    margin-top: -25px;
}

.layout-builder .layout-builder-body {
    padding: 30px;
}

.layout-builder .layout-builder-body .custom-radio {
    width: 46.6%;
    float: left;
    height: 50px;
    margin-right: 1rem;
    margin-bottom: 1rem;
    border-radius: 2px;
    cursor: pointer;
}

.layout-builder .layout-builder-body .custom-radio.active {
    border: 3px solid white;
    box-shadow: 0px 0px 0px 1px black;
}

.layout-builder .layout-builder-body .custom-radio:hover {
    opacity: .9;
}

.layout-builder .layout-builder-body .custom-radio:nth-child(even) {
    margin-right: 0;
}

.layout-builder .layout-builder-body .custom-radio:nth-child(1) {
    background: #2e61bf; /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #2e61bf, #60c363); /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #2e61bf, #60c363);
}

.layout-builder .layout-builder-body .custom-radio:nth-child(2) {
    background: #4568dc; /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #4568dc, #b06ab3); /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #4568dc, #b06ab3);
}

.layout-builder .layout-builder-body .custom-radio:nth-child(3) {
    background: #bf74b7; /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #bf74b7, #80b0d8); /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #bf74b7, #80b0d8);
}

.layout-builder .layout-builder-body .custom-radio:nth-child(4) {
    background: #5397ce; /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #5397ce, #dca937); /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #5397ce, #dca937);
}

.layout-builder .layout-builder-body .custom-radio label {
    display: none;
}

.layout-builder .layout-builder-body .custom-control input[type="checkbox"]:checked + label {
    color: black;
}

.layout-builder .layout-colors {
    display: flex;
    flex-wrap: wrap;
    margin-left: -10px;
}

.layout-builder .layout-colors .layout-color-item {
    width: 40px;
    height: 40px;
    background: red;
    margin: 10px;
    border-radius: 3px;
    overflow: hidden;
    border: 5px solid transparent;
    cursor: pointer;
}

.layout-builder .layout-colors .layout-color-item.active {
    box-shadow: 0px 0px 0px 1px black
}

.layout-builder .layout-colors .layout-color-item span {
    display: block;
    height: 45%;
}

.layout-builder .layout-colors .layout-color-item span:first-child {
    background: black;
    transform: rotate(15deg);
    width: 110%;
    height: 70%;
    margin-top: -5px;
}

.layout-alert {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px 10px;
}

.error
{
    color: red !important;
} .bars {
	 text-align: center;
	 margin-top: 2rem;
}
/* Progress Bars */
 .progress--bar {
	 height: 1.5rem;
	 margin: 1rem;
	 background-color: #ddd;
}
 .progress--bar:after {
	 content: '';
	 display: block;
	 height: 100%;
	 background-color: #590c74;
}
 .progress--circle {
	 position: relative;
	 display: inline-block;
	 margin: 1rem;
	 width: 120px;
	 height: 120px;
	 border-radius: 50%;
	 background-color: #ddd;
}
 .progress--circle:before {
	content: '';
    position: absolute;
    top: 6px;
    left: 6px;
    width: 108px;
    height: 108px;
    border-radius: 50%;
    background-color: white;
}
 .progress--circle:after {
	 content: '';
	 display: inline-block;
	 width: 100%;
	 height: 100%;
	 border-radius: 50%;
	 background-color: #590c74;
}
 .progress__number {
	 position: absolute;
	 top: 50%;
	 width: 100%;
	 line-height: 1;
	 margin-top: -0.75rem;
	 text-align: center;
	 font-size: 1.5rem;
	 color: #777;
}
 .progress--pie:before {
	 display: none;
	/* Get rid of white circle for "pie chart style" meter */
}
 .progress--pie .progress__number {
	 color: white;
	 text-shadow: rgba(0, 0, 0, 0.35) 1px 1px 1px;
}
/** * $step is set to 5 by default, meaning you can only use percentage classes in increments of five (e.g. 25, 30, 45, 50, and so on). This helps to reduce the size of the final CSS file. If you need a number that doesn't end in 0 or 5, you can change the text percentage while rounding the class up/down to the nearest 5. */
 .progress--bar.progress--0:after {
	 width: 0%;
}
 .progress--circle.progress--0:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(90deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--5:after {
	 width: 5%;
}
 .progress--circle.progress--5:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(108deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--10:after {
	 width: 10%;
}
 .progress--circle.progress--10:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(126deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--15:after {
	 width: 15%;
}
 .progress--circle.progress--15:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(144deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--20:after {
	 width: 20%;
}
 .progress--circle.progress--20:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(162deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--25:after {
	 width: 25%;
}
 .progress--circle.progress--25:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(180deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--30:after {
	 width: 30%;
}
 .progress--circle.progress--30:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(198deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--35:after {
	 width: 35%;
}
 .progress--circle.progress--35:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(216deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--40:after {
	 width: 40%;
}
 .progress--circle.progress--40:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(234deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--45:after {
	 width: 45%;
}
 .progress--circle.progress--45:after {
	 background-image: linear-gradient(90deg, #ddd 50%, transparent 50%, transparent), linear-gradient(252deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--50:after {
	 width: 50%;
}
 .progress--circle.progress--50:after {
	 background-image: linear-gradient(-90deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--55:after {
	 width: 55%;
}
 .progress--circle.progress--55:after {
	 background-image: linear-gradient(-72deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--60:after {
	 width: 60%;
}
 .progress--circle.progress--60:after {
	 background-image: linear-gradient(-54deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--65:after {
	 width: 65%;
}
 .progress--circle.progress--65:after {
	 background-image: linear-gradient(-36deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--70:after {
	 width: 70%;
}
 .progress--circle.progress--70:after {
	 background-image: linear-gradient(-18deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--75:after {
	 width: 75%;
}
 .progress--circle.progress--75:after {
	 background-image: linear-gradient(0deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--80:after {
	 width: 80%;
}
 .progress--circle.progress--80:after {
	 background-image: linear-gradient(18deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--85:after {
	 width: 85%;
}
 .progress--circle.progress--85:after {
	 background-image: linear-gradient(36deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--90:after {
	 width: 90%;
}
 .progress--circle.progress--90:after {
	 background-image: linear-gradient(54deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--95:after {
	 width: 95%;
}
 .progress--circle.progress--95:after {
	 background-image: linear-gradient(72deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}
 .progress--bar.progress--100:after {
	 width: 100%;
}
 .progress--circle.progress--100:after {
	 background-image: linear-gradient(90deg, #590c74 50%, transparent 50%, transparent), linear-gradient(270deg, #590c74 50%, #ddd 50%, #ddd);
}

    .table th,
    .jsgrid .jsgrid-table th,
    .table td,
    .jsgrid .jsgrid-table td {
        padding: 10px 3px;
        vertical-align: top;
        border-top: 1px solid #CED4DA;
    }

    .table th,
    .jsgrid .jsgrid-table th,
    .table td,
    .jsgrid .jsgrid-table td {
        vertical-align: top;
        line-height: 1;
        white-space: break-spaces;
    }

    .card .card-body {
        padding: 5px;
    }

    .content-wrapper {
        background: #F5F7FF;
        padding: 20px;
        width: 100%;
        -webkit-flex-grow: 1;
        flex-grow: 1;
    }

    .clr-white {
        color: white !important;
    }

    svg>g:last-child>g:last-child {
        pointer-events: none !important
    }

    div.google-visualization-tooltip {
        pointer-events: none !important
    }

    .export-btn {
        margin: 10px 0px;
        padding: 5px;
    }

    /*card*/
    .card {
        height: 100%;
        margin-bottom: 15px;
    }

    .card .card-body, .page-header .card-body {
        padding: 20px;
    }

</style>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 mb-3 ">
            <div class=" ">
                <div class="col-12 mt-3">
                    <h4 style="font-size: 1.125rem;"><b>Dashboard</b></h4>

                </div>
            </div>
        </div>
    </div>

    <div class=" ">
            <div class="col-12">
                <div class=" row justify-content-start d-flex">

                    @if(session()->get('user_type') == 'AO')

                        <div class="col-md-4 text-center ">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <h5> Sanctioned Posts</h5>
                                    <a href="" target="_blank">
                                        <div class="progress-circle over50   p100">
                                            <span>100 %</span>
                                            <div class="left-half-clipper">
                                                <div class="first50-bar"></div>
                                                <div class="value-bar"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="color-textt"> <strong> {{$san}} </strong></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 text-center ">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <h5> Occupied Posts</h5>
                                    <a href="" target="_blank">
                                        @if($san == 0)
                                            <div class="progress-circle 0">
                                                <span>0 %</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="progress-circle @if(round(($occu / $san)*100,1) > 50) over50 @endif p{{round(($occu / $san)*100,1)}}">
                                                <span>{{round(($occu / $san)*100,1)}} %</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                        @endif
                                    </a>
                                    <a href="#" class="color-textt"> <strong> {{$occu}} / {{$san}} </strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center ">
                            <div class="card mb-0">
                                <div class="card-body">

                                    <h5> Vacant Posts</h5>
                                    <a href="" target="_blank">
                                        @if($san == 0)
                                            <div class="progress-circle 0">
                                                <span>0 %</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="progress-circle  @if(round((($san - $occu)/$san)*100,1) > 50) over50 @endif p{{round((($san - $occu)/$san)*100,1)}}">
                                                <span>{{round((($san - $occu)/$san)*100,1)}} %</span>
                                                <div class="left-half-clipper">
                                                    <div class="first50-bar"></div>
                                                    <div class="value-bar"></div>
                                                </div>
                                            </div>
                                        @endif
                                    </a>
                                    <a href="#" class="color-textt"> <strong> {{$san - $occu}} / {{$san}} </strong></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @elseif(session()->get('user_type') == 'PD')

                          <div class="col-md-4 text-center ">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <h5> Completed Attendence </h5>
                                    <a href="" target="_blank">
                                        <div class="progress-circle over50   p100">
                                            <span>100 %</span>
                                            <div class="left-half-clipper">
                                                <div class="first50-bar"></div>
                                                <div class="value-bar"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="color-textt"> <strong> {{$san}} </strong></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 text-center ">
                            <div class="card mb-0">
                                <div class="card-body">

                                    <h5> Pending Attendence </h5>
                                    <a href="" target="_blank">
                                        <div class="progress-circle  0">
                                            <span>0 %</span>
                                            <div class="left-half-clipper">
                                                <div class="first50-bar"></div>
                                                <div class="value-bar"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="color-textt"> <strong> {{$san - $occu}} / {{$san}} </strong></a>
                                </div>
                            </div>
                        </div>
                        @else



                        @endif


                    </div>
            </div>
    </div>

    <br>
    <!--<div class="row justify-content-center d-flex">-->
    <!--    <div class="col-1">-->
    <!--        <button class="btn btn-primary btn-sm" type="button">All</button>-->
    <!--    </div>-->
    <!--    <div class="col-1">-->
    <!--        <button class="btn btn-primary btn-sm" type="button">Government</button>-->
    <!--    </div>-->
    <!--    <div class="col-1">-->
    <!--        <button class="btn btn-primary btn-sm" type="button">Outsourcing</button>-->
    <!--    </div>-->
    <!--    <div class="col-1">-->
    <!--        <button class="btn btn-primary btn-sm" type="button">HR Policy</button>-->
    <!--    </div>-->
    <!--</div>-->



    <!--tabs-->
    @if(session()->get('user_type') == 'AO')
        <div class="m-4">
        <ul class="nav nav-tabs" id="myTab" style="background-color: #bce1ed;">
            <li class="nav-item">
                <a href="#all" class="nav-link active" data-bs-toggle="tab">All</a>
            </li>
            <li class="nav-item">
                <a href="#govt" class="nav-link" data-bs-toggle="tab">Government</a>
            </li>
            <li class="nav-item">
                <a href="#outsource" class="nav-link" data-bs-toggle="tab">Non HR</a>
            </li>
            <li class="nav-item">
                <a href="#hr" class="nav-link" data-bs-toggle="tab">HR</a>
            </li>
        </ul>

        <div class="tab-content" style="overflow:hidden;">
            <div class="tab-pane fade show active" id="all">
                <div class="row">
                    <div class="col-6">
                        <div id = "container2" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                    </div>
                    <div class="col-6">
                        <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="govt">
                <h3>Government</h3>
                <div class="row">
                    <div class="col-6">
                        <div id = "container4" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                    </div>
                    <div class="col-6">
                        <div id = "container3" style = "width: 550px; height: 400px; margin: 0 auto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="outsource">
                <h3>NON HR</h3>
                <div class="row">
                    <div class="col-6">
                        <div id = "container6" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                    </div>
                    <div class="col-6">
                        <div id = "container5" style = "width: 550px; height: 400px; margin: 0 auto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="hr">
                <h3>HR</h3>
                <div class="row">
                    <div class="col-6">
                        <div id = "container8" style = "width: 550px; height: 400px; margin: 0 auto"></div>
                    </div>
                    <div class="col-6">
                        <div id = "container7" style = "width: 550px; height: 400px; margin: 0 auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

    <!--end tabs-->



    </div>
    @include('headers.footer')

        </div>

      <script language = "JavaScript">

         function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Browser');
            data.addColumn('number', 'Percentage');
            data.addRows([
              ['Sactioned', {{$san}}],
              ['Vacant', {{$san - $occu}}],
              ['Occupied', {{$occu}}],

            ]);

            // Set chart options
            var options = {
              'title':'HRMS Statistics - Sanctioned Vs Vacant Vs Occupied',
              'width':700,
              'height':400
            };


            // Instantiate and draw the chart.
            var chart4 = new google.visualization.ColumnChart(document.getElementById('container2'));
            chart4.draw(data, options);


            var chart = new google.visualization.PieChart(document.getElementById('container'));
            chart.draw(data, options);

         }
          google.charts.setOnLoadCallback(drawChart);
            // chart 2
        function drawChart1() {
            var data1 = new google.visualization.DataTable();
            data1.addColumn('string', 'Browser');
            data1.addColumn('number', 'Percentage');
            data1.addRows([
              ['Sactioned', {{$gov_san}}],
              ['Vacant', {{$gov_san - $gov_occu}}],
              ['Occupied', {{$gov_occu}}],

            ]);

            var options1 = {
              'title':'HRMS Statistics - Sanctioned Vs Vacant Vs Occupied',
              'width':700,
              'height':400,


            };

            var chart5 = new google.visualization.ColumnChart(document.getElementById('container4'));
            chart5.draw(data1, options1);

            var chart1 = new google.visualization.PieChart(document.getElementById('container3'));
            chart1.draw(data1, options1);
        }
        google.charts.setOnLoadCallback(drawChart1);
            // chart 3
        function drawChart2() {
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Browser');
            data2.addColumn('number', 'Percentage');
            data2.addRows([
              ['Sactioned', {{$out_san}}],
              ['Vacant', {{$out_san - $out_occu}}],
              ['Occupied', {{$out_occu}}],

            ]);

            var options2 = {
              'title':'HRMS Statistics - Sanctioned Vs Vacant Vs Occupied',
              'width':700,
              'height':400
            };

            var chart6 = new google.visualization.ColumnChart(document.getElementById('container6'));
            chart6.draw(data2, options2);

            var chart2 = new google.visualization.PieChart(document.getElementById('container5'));
            chart2.draw(data2, options2);
        }
        google.charts.setOnLoadCallback(drawChart2);
            // chart4
        function drawChart3() {
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Browser');
            data3.addColumn('number', 'Percentage');
            data3.addRows([
              ['Sactioned', {{$hr_san}}],
              ['Vacant', {{$hr_san - $hr_occu}}],
              ['Occupied', {{$hr_occu}}],

            ]);

            var options3 = {
              'title':'HRMS Statistics - Sanctioned Vs Vacant Vs Occupied',
              'width':700,
              'height':400
            };

            var chart3 = new google.visualization.PieChart(document.getElementById('container7'));
            chart3.draw(data3, options3);

            var chart7 = new google.visualization.ColumnChart(document.getElementById('container8'));
            chart7.draw(data3, options3);
         }
         google.charts.setOnLoadCallback(drawChart3);
      </script>

            </div>
        </div>
    </div>

</div>





</div>


