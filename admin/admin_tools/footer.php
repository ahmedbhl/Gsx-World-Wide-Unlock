 </div>
   </div>

                    <div class="widget-foot">
                      <div class="clearfix"></div> 

            </div>
          </div>
             
          <!-- Today status ends -->

          <!-- Dashboard Graph starts -->

          
          <!-- Dashboard graph ends -->

            

          <!-- Calendar and Logs -->
          

        </div>
    </div>

	  <!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->


<!-- Notification box starts -->
   

<!-- Notification box ends -->   

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- JS -->
<script src="../../autres/js/jquery.js"></script> <!-- jQuery -->
<script src="../../autres/js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="../../autres/js/jquery-ui-1.10.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="../../autres/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="../../autres/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="../../autres/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

<!-- jQuery Flot -->
<script src="../../autres/js/excanvas.min.js"></script>
<script src="../../autres/js/jquery.flot.js"></script>
<script src="../../autres/js/jquery.flot.resize.js"></script>
<script src="../../autres/js/jquery.flot.pie.js"></script>
<script src="../../autres/js/jquery.flot.stack.js"></script>

<script src="../../autres/js/jquery.gritter.min.js"></script> <!-- jQuery Gritter -->
<script src="../../autres/js/sparklines.js"></script> <!-- Sparklines -->
<script src="../../autres/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="../../autres/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="../../autres/js/bootstrap-switch.min.js"></script> <!-- Bootstrap Toggle -->
<script src="../../autres/js/filter.js"></script> <!-- Filter for support page -->
<script src="../../autres/js/custom.js"></script> <!-- Custom codes -->
<script src="../../autres/js/charts.js"></script> <!-- Custom chart codes -->
<script src="../../autres/js/jquery.mousewheel.js"></script> <!-- Mouse Wheel -->
<script src="../../autres/js/jquery.horizontal.scroll.js"></script> <!-- horizontall scroll with mouse wheel -->
<script type="text/javascript" src="../../autres/js/jquery.slimscroll.min.js"></script> <!-- vertical scroll with mouse wheel -->

<!-- Script for this page -->
<script type="text/javascript">
$(function () {

    /* Bar Chart starts */

    var d1 = [];
    for (var i = 0; i <= 30; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 30; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#52b9e9", "#0aa4eb"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });
    }

    plotWithOptions();
    
    $(".stackControls input").click(function (e) {
        e.preventDefault();
        stack = $(this).val() == "With stacking" ? true : null;
        plotWithOptions();
    });
    $(".graphControls input").click(function (e) {
        e.preventDefault();
        bars = $(this).val().indexOf("Bars") != -1;
        lines = $(this).val().indexOf("Lines") != -1;
        steps = $(this).val().indexOf("steps") != -1;
        plotWithOptions();
    });

    /* Bar chart ends */

});


/* Curve chart starts */

$(function () {
    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    var plot = $.plot($("#curve-chart"),
           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
               series: {
                   lines: { show: true, 
                            fill: true,
                            fillColor: {
                              colors: [{
                                opacity: 0.05
                              }, {
                                opacity: 0.01
                              }]
                          }
                  },
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true, borderWidth:0 },
               yaxis: { min: -1.2, max: 1.2 },
               colors: ["#fa3031", "#54728C"]
             });


    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            width: 100,
            left: x + 5,
            border: '1px solid #000',
            padding: '2px 8px',
            color: '#ccc',
            'background-color': '#000',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#curve-chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
    }); 

    $("#curve-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });

});

/* Curve chart ends */
</script>
</body>
</html>