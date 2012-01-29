<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Calender Auto</title>

        <script type="text/javascript" src="script/jquery-1.7.1.js"></script>
        <script type="text/javascript">
            var calNum;
            
            /** 
             * Initialize interactive actions.
             */
            function initAct(){
                $('.close').click(function(){
                    $('.mask').hide();
                });
                
                $('td.active').click(function(){
                    $('.mask').show();
                    $('.dialog > h2').text('Date selected ' + $(this).data('value'));
                });
                
                $('.info').click(function(){
                    alert($(this).attr('foo'));
                    return false;
                });
            };
            
            /**
             * Load calender.
             * @param nav "prev" or "next"
             * @param nw cal current date
             */
            function loadCal(nav,nw){
                $.get('ajax.php', {action:'loadcal', calnav:nav, now:nw}, function(data){
                    $('.cal-menu span').text(data.title);
                    $('div#cal-struct').html(data.table);
                    calNum = data.numb;
                    initAct();
                }, 'json');
            };
            
            $(document).ready(function(){
                // Load calender
                loadCal();
                // Load next month
                $('button#cal-next').click(function(){
                    loadCal('next', calNum);
                });
            });
        </script>
        <link type="text/css" rel="stylesheet" href="style/calender.css" />
    </head>
    <body>
        <div class="mask">
            <div class="dialog">
                <div class="close"></div>
                <h2>Form will go here</h2>
            </div>
        </div>
        <div id="calender">
            <div class="cal-menu">
                <button id="cal-prev" title="Previous month">&laquo;</button>
                <button id="cal-today">Today</button>
                <button id="cal-next" title="Next month">&raquo;</button>
                <span>January 2012</span>
            </div>
            <div id="cal-struct">
            </div>
        </div>
    </body>
</html>
