<!-- google web fonts -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

<!-- common functions -->
<script src="assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="assets/js/altair_admin_common.min.js"></script>
<!-- page specific plugins -->
<!-- file input -->
<script src="assets/js/custom/uikit_fileinput.min.js"></script>

<!--  user edit functions -->
<script src="assets/js/pages/page_user_edit.min.js"></script>

<!-- d3 -->
<script src="bower_components/d3/d3.min.js"></script>
<!-- metrics graphics (charts) -->
<script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
<!-- chartist (charts) -->
<script src="bower_components/chartist/dist/chartist.min.js"></script>
<!-- maplace (google maps) -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="bower_components/maplace-js/dist/maplace.min.js"></script>
<!-- peity (small charts) -->
<script src="bower_components/peity/jquery.peity.min.js"></script>
<!-- easy-pie-chart (circular statistics) -->
<script src="bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- countUp -->
<script src="bower_components/countUp.js/dist/countUp.min.js"></script>
<!-- handlebars.js -->
<script src="bower_components/handlebars/handlebars.min.js"></script>
<script src="assets/js/custom/handlebars_helpers.min.js"></script>
<!-- CLNDR -->
<script src="bower_components/clndr/clndr.min.js"></script>
<!-- fitvids -->
<script src="bower_components/fitvids/jquery.fitvids.js"></script>

<!--  dashbord functions -->
<script src="assets/js/pages/dashboard.min.js"></script>

<script>
    $mini_sidebar_toggle
        .on('ifChecked', function(event) {
            $switcher.removeClass('switcher_active');
            localStorage.setItem("altair_sidebar_mini", '1');
            localStorage.removeItem('altair_sidebar_slim');
            location.reload(true);
        })
        .on('ifUnchecked', function(event) {
            $switcher.removeClass('switcher_active');
            localStorage.removeItem('altair_sidebar_mini');
            location.reload(true);
        });

    // toggle slim sidebar

    // change input's state to checked if mini sidebar is active
    if ((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
        $slim_sidebar_toggle.iCheck('check');
    }

    $slim_sidebar_toggle
        .on('ifChecked', function(event) {
            $switcher.removeClass('switcher_active');
            localStorage.setItem("altair_sidebar_slim", '1');
            localStorage.removeItem('altair_sidebar_mini');
            location.reload(true);
        })
        .on('ifUnchecked', function(event) {
            $switcher.removeClass('switcher_active');
            localStorage.removeItem('altair_sidebar_slim');
            location.reload(true);
        });

    // toggle boxed layout

    $boxed_layout_toggle
        .on('ifChecked', function(event) {
            $switcher.removeClass('switcher_active');
            localStorage.setItem("altair_layout", 'boxed');
            location.reload(true);
        })
        .on('ifUnchecked', function(event) {
            $switcher.removeClass('switcher_active');
            localStorage.removeItem('altair_layout');
            location.reload(true);
        });

    // main menu accordion mode
    if ($sidebar_main.hasClass('accordion_mode')) {
        $accordion_mode_toggle.iCheck('check');
    }

    $accordion_mode_toggle
        .on('ifChecked', function() {
            $sidebar_main.addClass('accordion_mode');
        })
        .on('ifUnchecked', function() {
            $sidebar_main.removeClass('accordion_mode');
        });


    });
</script>
</body>

</html>