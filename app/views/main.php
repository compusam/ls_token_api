<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LACA-SOFT</title>

        <link href="http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,100" rel="stylesheet" type="text/css">
        <link href="<?php echo "./public/css/style.css"; ?>" rel="stylesheet" type="text/css">
                
    </head>
    <body>
        <p style="text-align: center; font-size: 40px; color: #FFFFFF; line-height: 15px;">LACA-SOFT<br />
            <span style="font-size: 12px;">Token Server</span>
        </p>
        <div id="container">
            <div id="menuFix" style="background: none repeat scroll 0px 0px rgb(0, 0, 0); float: left; margin: 10px; position: fixed; padding: 5px; color: rgb(255, 255, 255); top: 5px; right: 20px;">
                 <a href="#aServer" onclick="$.scrollTo('#aServer', 'slow');"><span style="text-align: center; font-size: 20px; color: #FFFFFF; line-height: 15px; font-weight: 100;">Server </span></a> |
            </div>


            <p id="aServer" style="text-align: center; font-size: 35px; color: #FFFFFF; line-height: 15px; font-weight: 100;">Server</p>

            <p id="server" class="masterTooltip" title="Click to Show" style="text-align: justify; font-size: 20px; color: #FFFFFF; line-height: 15px; cursor: pointer;">Status: 
                <span style="color:#B78831;">/server/getStatus</span>
            </p>

            <div class="server hide">
                <p style="text-align: justify; font-size: 14px; color: #DFDFDF; line-height: 15px;">Response:</p>
                <div class="code" >
                    <p style="text-align: justify; font-size: 14px; color: #03114C; line-height: 15px;">
                        <span style="color:#B78831;">
                        d/m/Y h:i:s
                        </span>
                    </p>
                </div>
            </div>

           
        <p style="color:#FFFFFF;"><?php echo "LACA-SOFT&copy; " . date('Y');?></p>

        </div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            // Tooltip only Text
            $('.masterTooltip').hover(function(){
                    // Hover over code
                    var title = $(this).attr('title');
                    $(this).data('tipText', title).removeAttr('title');
                    $('<p class="tooltip"></p>')
                    .text(title)
                    .appendTo('body')
                    .fadeIn('fast');
            }, function() {
                    // Hover out code
                    $(this).attr('title', $(this).data('tipText'));
                    $('.tooltip').remove();
            }).mousemove(function(e) {
                    var mousex = e.pageX + 20; //Get X coordinates
                    var mousey = e.pageY + 10; //Get Y coordinates
                    $('.tooltip')
                    .css({ top: mousey, left: mousex })
            });
        });
        </script>

        <script>
            $(document).ready(function() {
                $('p').click(function() {
                    var id = $(this).attr("id");
                    id = '.'+ id;
                    
                    $(id).slideToggle("slow");
                    
                });
            });
        </script>
    </body>
</html>
