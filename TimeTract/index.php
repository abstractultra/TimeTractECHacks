<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE HTML>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:900&display=swap" rel="stylesheet">
    <style>
        .pie {
            width: 50px;
            height: 50px;
            transform: rotate(-90deg);
            background: white;
            border-radius: 50%;
            position: relative;
            z-index: -1;
            margin: 5px;
        }

        body {
            margin: 0;
            max-height: 100%;
        }

        #rankings {
            margin: 20px;
            display: grid;
            max-height: 100px;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr;
            grid-gap: 20px;
        }

        .ranking-box {
            display: grid;
            grid-template-columns: 25% 25% 25% 25%;
            grid-template-rows: 70px 2fr 1fr 1fr;
            position: relative;
            height: 100%;
            width: 100%;
            align-items: top;
        }

        .small-ranking-box {
            display: grid;
            grid-template-columns: 20% 40% 40%;
            grid-template-rows: 1fr 1fr 1fr;
        }

        .small-ranking-box .profile-pic {
            grid-column: 2 / span 1;
            grid-row: 1 / span 3;
            position: relative;

        }

        .distracting-activities, .productive-activities {
            font-family: Poppins;
        }

        .small-ranking-box .profile-name {
            grid-column: -2 / span 1;
            grid-row: 1 / span 1;
            font-weight: bold;
            text-align: center;
            font-family: Poppins;
        }

        #lion-pulse, #dragon-pulse {
            color: white;
        }

        .small-ranking-box .profile-pulse {
            grid-column: 1 / span 1;
            grid-row: 3 / span 1;
            position: relative;
        }

        .small-ranking-box .profile-desc {
            grid-column: 3 / span 1;
            grid-row: 2 / -1;
            text-align: center;
        }

        .ranking-box, .small-ranking-box {
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.5);
        }

        .ranking-box .profile-pulse {
            position: relative;
        }

        .profile-pic {
            width: 100%;
            height: auto;
            align-self: center;
            justify-self: center;
        }

        .profile-pic > img {
            border-radius: 50%;
            width: 100%;
            height: auto;
        }

        .rank-number, .profile-pulse {
            font-weight: bold;
            font-family: Poppins;
            text-align: center;
            align-self: center;
            font-size: 20px;
        }

        .ranking-box .productive-activities {
            grid-column: 1 / -1;
            grid-row: 3 / span 1;
        }

        .ranking-box .distracting-activities {
            grid-column: 1 / -1;
            grid-row: 4 / span 1;
        }

        .ranking-box .profile-pic {
            grid-row: 2 / span 1;
            grid-column: 2 / 4;
        }

        .ranking-box .profile-desc {
            grid-row: 3 / span 1;
            grid-column: 2 / 4;
            text-align: center;
        }

        .ranking-box .profile-name {
            grid-column: 1 / -1;
            grid-row: 1 / span 1;
            height: 20px;
            margin-top: -45px;
            font-size: 35px;
            text-align: center;
            font-weight: bold;
            align-self: center;
            justify-self: center;
            font-family: Poppins;
        }

        .ranking-box .wreath {
            position: absolute;
            height: 130%;
            width: 90%;

            left: 21%;
        }

        .small-ranking-box .wreath {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .small-ranking-box .profile-name {
            font-size: 20px;
            grid-row: 1 / -1;
            align-self: center;
            justify-self: center;

        }

        .small-ranking-box .profile-desc {
            display: none;
        }

        .ranking-box:first-child {
            grid-column: 1 / span 1;
            grid-row: 1 / -1;
        }

        .ranking-box .prod-header {
            text-align: center;
            font-family: Poppins;
            font-size: 20px;
            color: blue;
        }

        .ranking-box .dist-header {
            text-align: center;
            font-family: Poppins;
            font-size: 20px;
            color: darkred;
        }

        .small-ranking-box .rank-number {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .ranking-box .wreath {
            position: relative;
            margin-left: -17%;
            min-width: 70px;
        }

        .wreath {
            margin-top: 6px;
        }

        .ranking-box .rank-number {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .ranking-box .rank-container {
            grid-row: 2 / span 1;
            grid-column: 1 / span 1;
            align-self: center;
            justify-self: center;
        }

        .rank-container {
            position: relative;
            min-width: 70px;
        }

    </style>
    <script src="../js/jquery.min.js"></script>
    <script>
        <?php readfile("../scripts/organize_api_keys.js");?>
    </script>
</head>
<body>
<div id="content">
    <div id="rankings">
        <div class="ranking-box">
            <div class="profile-name">
                Dragon He<br/>(@AbstractUltra)
            </div>
            <div class="rank-container">
                <img src="gold.png" class="wreath"/>
                <div class="rank-number">#1</div>
            </div>
            <div class="profile-pic" id="dragon-profile">
                <img src="abstractultra.png"/>
            </div>
            <div class="profile-pulse" id="dragon-pulse"></div>
            <div class="productive-activities" id="dragon-productive-activities">
                <h1 class="prod-header">Most Productive Activities</h1>
            </div>
            <div class="distracting-activities" id="dragon-distracting-activities">
                <h1 class="dist-header">Most Distracting Activities</h1>
            </div>
        </div>
        <div class="small-ranking-box">
            <div class="profile-name">
                Leon Si<br/>(@leonzalion)
            </div>
            <div class="rank-container">
                <img src="silver.png" class="wreath"/>
                <div class="rank-number">#2</div>
            </div>
            <div class="profile-pic" id="lion-profile">
                <img src="lion.png"/>
            </div>
            <div class="profile-pulse" id="lion-pulse"></div>
            <div class="productive-activities" id="lion-productive-activities">

            </div>
            <div class="distracting-activities" id="lion-distracting-activities">

            </div>
            <div class="expand-arrow" id="lion-expand-arrow">
            </div>
        </div>

        <div class="small-ranking-box">
            <div class="profile-name">
                ---
            </div>
            <div class="rank-container">
                <img src="bronze.png" class="wreath"/>
                <div class="rank-number">#3</div>
            </div>
            <div class="profile-pic">
                <img src="profile-pic-3.png"/>
            </div>
            <div class="profile-pulse">
                --
            </div>
            <div class="profile-desc">

            </div>
        </div>

        <div class="small-ranking-box">
            <div class="profile-name">
                ---
            </div>
            <div class="rank-container">
                <div class="rank-number">#4</div>
            </div>
            <div class="profile-pic">
                <img src="profile-pic-4.png"/>
            </div>
            <div class="profile-pulse">
                --
            </div>
            <div class="profile-desc">

            </div>
        </div>
    </div>
</div>

<script>
    function dsfURL(key) {
        var url = `https://www.rescuetime.com/anapi/daily_summary_feed?key=${key}`;
        console.log(url);
        return url;
    }

    function adURL(key) {
        var yesterdayStart = new Date(new Date().toDateString());
        yesterdayStart.setDate(yesterdayStart.getDate() - 1);
        yesterdayStart = formatDate(yesterdayStart);
        var yesterdayEnd = formatDate(new Date(new Date().toDateString()));
        var url = 'https://www.rescuetime.com/anapi/data?key=' + key +
            '&restrict_begin=' + yesterdayStart + '&restrict_end=' + yesterdayEnd + '&format=json';
        return url;
    }

    function formatDate(d) {
        return d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + d.getDate()).slice(-2);
    }

    function formatTime(t) {
        var f = Math.floor;
        return (t > 3600 ? "" + f(t / 3600) + "h " : "") + f(t % 3600 / 60) + "m";
    }

    var dragonKey = "B63vExwqbvjw8Mqop2yeWIQcYlMQUOudDscN2V0w";
    var lionKey = "B63SD5uLHof2HskzdelSGP5Tp2d5QyGdE8J0ELSQ";

    var dsf =
        $.post("getdata.php", {url: adURL(dragonKey)}, function (data) {
            data = JSON.parse(data);
            prod = data.rows.filter(arr => arr[5] > 0);
            dist = data.rows.filter(arr => arr[5] < 0);
            var myList = $('<ul></ul>');
            for (let i = 0; i < 3 && i < prod.length; ++i) {
                var myLi = $('<li></li>');
                myLi.html(`${prod[i][3]} - ${formatTime(prod[i][1])}`)
                myList.append(myLi);
            }
            $('#dragon-productive-activities').append(myList);

            myList = $('<ul></ul>');
            for (let i = 0; i < 3 && i < dist.length; ++i) {
                var myLi = $('<li></li>');
                myLi.html(`${dist[i][3]} - ${formatTime(dist[i][1])}`);
                myList.append(myLi);
            }
            $('#dragon-distracting-activities').append(myList);
        });

    $.post("getdata.php", {url: dsfURL(dragonKey)}, function (data) {
        data = JSON.parse(data)[0];
        let pie = createPie(data.very_distracting_percentage, data.distracting_percentage, data.neutral_percentage, data.productive_percentage, data.very_productive_percentage, data.productivity_pulse);
        $('#dragon-pulse').append(pie);
    });

    $.post("getdata.php", {url: adURL(lionKey)}, function (data) {
        data = JSON.parse(data);

    });

    $.post("getdata.php", {url: dsfURL(lionKey)}, function (data) {
        data = JSON.parse(data)[0];
        let pie = createPie(data.very_distracting_percentage, data.distracting_percentage, data.neutral_percentage, data.productive_percentage, data.very_productive_percentage, data.productivity_pulse);
        $('#lion-pulse').append(pie);

    });

    function $$(selector, context) {
        context = context || document;
        var elements = context.querySelectorAll(selector);
        return Array.prototype.slice.call(elements);
    }

    function createPie(very_distracted, distracted, neutral, productive, very_productive, pulse) {
        var values = [very_distracted, distracted, neutral, productive, very_productive];
        var NS = "http://www.w3.org/2000/svg";
        var svg = document.createElementNS(NS, 'svg');
        svg.setAttribute('class', 'pie');
        svg.setAttribute("viewBox", "0 0 32 32");
        var colors = ['red', 'lightred', 'lightgrey', 'lightblue', 'blue'];
        for (let i = 0, sum = 0; i < 5; ++i) {
            sum += values[i];
            var circle = document.createElementNS(NS, "circle");
            var title = document.createElementNS(NS, "title");

            circle.setAttribute("r", 16);
            circle.setAttribute("cx", 16);
            circle.setAttribute("cy", 16);
            circle.setAttribute("fill", "rgba(0,0,0,0)");
            circle.setAttribute("stroke", colors[i]);
            circle.setAttribute("stroke-dasharray", "" + sum + " 100");
            circle.setAttribute("stroke-width", "32px");

            svg.prepend(title);
            svg.prepend(circle);
        }
        var text = document.createElementNS(NS, 'text');
        text.setAttribute("x", 4);
        text.setAttribute("textLength", 24);
        text.setAttribute("y", -8);
        text.setAttribute("fill", "white");
        text.setAttribute("transform", "rotate(90)");
        text.innerHTML = pulse;

        svg.append(text);

        return svg;
    }

</script>
</body>
</html>