<?php

    require_once($_SERVER['DOCUMENT_ROOT'] . '/framework/class.quiz.php');
    $Quiz = new Quiz();

    $show_results = false;
    $special = false;
    if($_GET['show_results'] == true){
        $show_results = true;
        $userResults = $Quiz->getUserResults(true);
    }else if($_GET['special'] == true){
        $special = true;
        $userResults = $Quiz->getUserResults(true);
    }else{
        $userResults = $Quiz->getUserResults();
    }


    if($special == true){
        $json_object = array();
        foreach($userResults as $user){
            $count = $user['quiz_score'];
            while($count > 0){
                $tmp = array();
                $tmp['label'] = $user['name'];
                array_push($json_object, $tmp);
                $count--;
            }
        }

        $json_object = json_encode($json_object);
    }

    //{"label":"IMAC PRO",  "value":2,  "question":"What CSS property is used for changing the font?"}
    /* 
    echo "<pre>";
    var_dump($userResults);
    echo "</pre>";
    die();
    */

?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bailey Gifts</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="assets/css/mdb.min.css" rel="stylesheet">
        <!-- Add font awesome here -->

        <!-- Custom Styles -->
        <link rel='stylesheet' href='assets/custom/css/custom.css' /> 

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    </head>


    <body>
        <?php 
            echo '<div class="snowflakes" aria-hidden="true">';
            for ($i = 0; $i < 50; $i++){ 
                echo "<div class='snowflake'>❅</div>";
            }
            echo "</div>";
        ?>

        <div class='text-center mt-3 mb-5'>
            <h1>Bailey Christmas Day Gift Special</h1>
        </div>

        <?php if($show_results == true){ ?>
            <ul class="nav nav-tabs nav-justified md-tabs primary" id="myTabJust" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#winner" role="tab" aria-controls="winner-tab"
                    aria-selected="true">Winner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#second" role="tab" aria-controls="second-tab"
                    aria-selected="false">Second</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab-just" data-toggle="tab" href="#third" role="tab" aria-controls="third-tab"
                    aria-selected="false">Third</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab-just" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth-tab"
                    aria-selected="false">Fourth</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab-just" data-toggle="tab" href="#fifth" role="tab" aria-controls="fifth-tab"
                    aria-selected="false">Fifth</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab-just" data-toggle="tab" href="#last" role="tab" aria-controls="last-tab"
                    aria-selected="false">Last</a>
                </li>
            </ul>
            <div class="tab-content card pt-5" id="myTabContentJust" style='color: black !important;'>
                <div class="tab-pane fade show active" id="winner" role="tabpanel" aria-labelledby="winner">
                   <?php
                        echo '<div class="text-center">';
                                echo "<img class='top-profile-images mb-2' src='assets/images/". $userResults[0]['picture_name'] .".png'>";
                                echo "<h3>Score: ". $userResults[0]['quiz_score'] ."</h3><br />";
                                echo "<h3>Time: ". $userResults[0]['time_spent'] ."</h3><br />";
                        echo "</div>";
                   ?>
                </div>
                <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second">
                    <div class="tab-pane fade show active" id="winner" role="tabpanel" aria-labelledby="winner">
                    <?php
                        echo '<div class="text-center">';
                                echo "<img class='top-profile-images mb-2' src='assets/images/". $userResults[1]['picture_name'] .".png'>";
                                echo "<h3>Score: ". $userResults[1]['quiz_score'] ."</h3><br />";
                                echo "<h3>Time: ". $userResults[1]['time_spent'] ."</h3><br />";
                        echo "</div>";
                   ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third">
                    <div class="tab-pane fade show active" id="winner" role="tabpanel" aria-labelledby="winner">
                    <?php
                        echo '<div class="text-center">';
                                echo "<img class='top-profile-images mb-2' src='assets/images/". $userResults[2]['picture_name'] .".png'>";
                                echo "<h3>Score: ". $userResults[2]['quiz_score'] ."</h3><br />";
                                echo "<h3>Time: ". $userResults[2]['time_spent'] ."</h3><br />";
                        echo "</div>";
                   ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth">
                    <div class="tab-pane fade show active" id="winner" role="tabpanel" aria-labelledby="winner">
                    <?php
                        echo '<div class="text-center">';
                                echo "<img class='top-profile-images mb-2' src='assets/images/". $userResults[3]['picture_name'] .".png'>";
                                echo "<h3>Score: ". $userResults[3]['quiz_score'] ."</h3><br />";
                                echo "<h3>Time: ". $userResults[3]['time_spent'] ."</h3><br />";
                        echo "</div>";
                   ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="fourth">
                    <div class="tab-pane fade show active" id="winner" role="tabpanel" aria-labelledby="winner">
                    <?php
                        echo '<div class="text-center">';
                                echo "<img class='top-profile-images mb-2' src='assets/images/". $userResults[4]['picture_name'] .".png'>";
                                echo "<h3>Score: ". $userResults[4]['quiz_score'] ."</h3><br />";
                                echo "<h3>Time: ". $userResults[4]['time_spent'] ."</h3><br />";
                        echo "</div>";
                   ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="last" role="tabpanel" aria-labelledby="fourth">
                    <div class="tab-pane fade show active" id="winner" role="tabpanel" aria-labelledby="winner">
                    <?php
                        echo '<div class="text-center">';
                                echo "<img class='top-profile-images mb-2' src='assets/images/". $userResults[5]['picture_name'] .".png'>";
                                echo "<h3>Score: ". $userResults[5]['quiz_score'] ."</h3><br />";
                                echo "<h3>Time: ". $userResults[5]['time_spent'] ."</h3><br />";
                        echo "</div>";
                   ?>
                    </div>
                </div>
            </div>
            <div class='text-center mt-5'>
                <button id='super_ultra_gift_special_button' class='btn btn-primary mt-3'>Super Ultra Gift Special</button>
            </div>

        <?php }else if($special == true){ ?>
            <div id="chart"></div>
        <?php }else{ ?>
            <div class='container'>
                <div class='row mb-5'>
                    <?php 
                        foreach($userResults as $user){
                            $style_string = '';
                            if($user['quiz_done']){
                                $style_string = 'style="border: 5px solid green"';
                            }
                            echo "<div class='col-md-3 mb-3'>";
                                echo "<img class='top-profile-images' src='assets/images/". $user['picture_name'] .".png' ".  $style_string .">";
                            echo "</div>";
                        }
                    ?>
                </div>
                <div class='text-center'>
                    <button id='show_results_button' class='btn btn-primary mt-3'>Show Results</button>
                </div>
            </div>
        <?php } ?>


        <script type="text/javascript" src="assets/jquery.js"></script>
	  	<!-- Bootstrap tooltips -->
	  	<script type="text/javascript " src="assets/js/popper.min.js"></script>
	  	<!-- Bootstrap core JavaScript -->
	  	<script type="text/javascript " src="assets/js/bootstrap.min.js"></script>
	  	<!-- MDB core JavaScript -->
	  	<script type="text/javascript " src="assets/js/mdb.min.js"></script>
        <!-- Charts Module -->
        <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
	  	<!-- Custom js --> 
	  	<script type='text/javascript' src='assets/custom/js/custom.js'></script>


        <script type='text/javascript'>  
            $(document).ready(function(){
                $('body').on('click', '#show_results_button', function(e){
                    e.preventDefault();
                    window.location = '/admin?show_results=true';
                });

                $('body').on('click', '#super_ultra_gift_special_button', function(e){
                    window.location = '/admin?special=true';
                });


                <?php if($special == true) {?>
                    var padding = {top:20, right:40, bottom:0, left:0},
                    w = 500 - padding.left - padding.right,
                    h = 500 - padding.top  - padding.bottom,
                    r = Math.min(w, h)/2,
                    rotation = 0,
                    oldrotation = 0,
                    picked = 100000,
                    oldpick = [],
                    color = d3.scale.category20();//category20c()
                    //randomNumbers = getRandomNumbers();
                //http://osric.com/bingo-card-generator/?title=HTML+and+CSS+BINGO!&words=padding%2Cfont-family%2Ccolor%2Cfont-weight%2Cfont-size%2Cbackground-color%2Cnesting%2Cbottom%2Csans-serif%2Cperiod%2Cpound+sign%2C%EF%B9%A4body%EF%B9%A5%2C%EF%B9%A4ul%EF%B9%A5%2C%EF%B9%A4h1%EF%B9%A5%2Cmargin%2C%3C++%3E%2C{+}%2C%EF%B9%A4p%EF%B9%A5%2C%EF%B9%A4!DOCTYPE+html%EF%B9%A5%2C%EF%B9%A4head%EF%B9%A5%2Ccolon%2C%EF%B9%A4style%EF%B9%A5%2C.html%2CHTML%2CCSS%2CJavaScript%2Cborder&freespace=true&freespaceValue=Web+Design+Master&freespaceRandom=false&width=5&height=5&number=35#results
                var data = <?php echo $json_object; ?>;
                var svg = d3.select('#chart')
                    .append("svg")
                    .data([data])
                    .attr("width",  w + padding.left + padding.right)
                    .attr("height", h + padding.top + padding.bottom);
                var container = svg.append("g")
                    .attr("class", "chartholder")
                    .attr("transform", "translate(" + (w/2 + padding.left) + "," + (h/2 + padding.top) + ")");
                var vis = container
                    .append("g");
                    
                var pie = d3.layout.pie().sort(null).value(function(d){return 1;});
                // declare an arc generator function
                var arc = d3.svg.arc().outerRadius(r);
                // select paths, use arc generator to draw
                var arcs = vis.selectAll("g.slice")
                    .data(pie)
                    .enter()
                    .append("g")
                    .attr("class", "slice");
                    
                arcs.append("path")
                    .attr("fill", function(d, i){ return color(i); })
                    .attr("d", function (d) { return arc(d); });
                // add the text
                arcs.append("text").attr("transform", function(d){
                        d.innerRadius = 0;
                        d.outerRadius = r;
                        d.angle = (d.startAngle + d.endAngle)/2;
                        return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius -10) +")";
                    })
                    .attr("text-anchor", "end")
                    .text( function(d, i) {
                        return data[i].label;
                    });
                container.on("click", spin);
                function spin(d){
                    
                    container.on("click", null);
                    //all slices have been seen, all done
                    console.log("OldPick: " + oldpick.length, "Data length: " + data.length);
                    if(oldpick.length == data.length){
                        console.log("done");
                        container.on("click", null);
                        return;
                    }
                    var  ps       = 360/data.length,
                        pieslice = Math.round(1440/data.length),
                        rng      = Math.floor((Math.random() * 1440) + 360);
                        
                    rotation = (Math.round(rng / ps) * ps);
                    
                    picked = Math.round(data.length - (rotation % 360)/ps);
                    picked = picked >= data.length ? (picked % data.length) : picked;
                    if(oldpick.indexOf(picked) !== -1){
                        d3.select(this).call(spin);
                        return;
                    } else {
                        oldpick.push(picked);
                    }
                    rotation += 90 - Math.round(ps/2);
                    vis.transition()
                        .duration(15000)
                        .attrTween("transform", rotTween)
                        .each("end", function(){
                            console.log(data);
                            alert("The Winner Is: " + data[picked].label);
                            //mark question as seen
                            /* 
                            d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                                .attr("fill", "#111");
                            //populate question
                            d3.select("#question h1")
                                .text(data[picked].question);
                            */
                            oldrotation = rotation;
                    
                            /* Get the result value from object "data" */
                            console.log(data[picked].value)
                    
                            /* Comment the below line for restrict spin to sngle time */
                            container.on("click", spin);
                        });
                }
                //make arrow
                svg.append("g")
                    .attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h/2)+padding.top) + ")")
                    .append("path")
                    .attr("d", "M-" + (r*.15) + ",0L0," + (r*.05) + "L0,-" + (r*.05) + "Z")
                    .style({"fill":"black"});
                //draw spin circle
                container.append("circle")
                    .attr("cx", 0)
                    .attr("cy", 0)
                    .attr("r", 60)
                    .style({"fill":"white","cursor":"pointer"});
                //spin text
                container.append("text")
                    .attr("x", 0)
                    .attr("y", 15)
                    .attr("text-anchor", "middle")
                    .text("SPIN")
                    .style({"font-weight":"bold", "font-size":"30px"});
                
                
                function rotTween(to) {
                var i = d3.interpolate(oldrotation % 360, rotation);
                return function(t) {
                    return "rotate(" + i(t) + ")";
                };
                }
                
                
                function getRandomNumbers(){
                    var array = new Uint16Array(1000);
                    var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);
                    if(window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function"){
                        window.crypto.getRandomValues(array);
                        console.log("works");
                    } else {
                        //no support for crypto, get crappy random numbers
                        for(var i=0; i < 1000; i++){
                            array[i] = Math.floor(Math.random() * 100000) + 1;
                        }
                    }
                    return array;
                }

                <?php } ?>
            });
        </script>
    </body>
</html>