<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset($title_tab) ? $title_tab : "Mr.Toefl.id" ?> </title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?= base_url('assets/css/plugins/toastr/toastr.min.css') ?>" rel="stylesheet">
    <?php
    for ($i = 0; $i < count($css); $i++) {
        echo '<link rel="stylesheet" href="' . $css[$i] . '">';
    }
    ?>
</head>

<body class="top-navigation fixed-nav" style="color: black">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <?php $this->load->view($navbar);?>
        </div>
        <div class="wrapper wrapper-content">
            <div class="container">
                <?php $this->load->view($content);?>
            </div>

        </div>
        <?php $this->load->view($footer); ?>

        </div>
        </div>


    <script>
        let sessionSection = `<?= json_encode($this->session->userdata("sessionSection")->last_session) ?>`;
        let js = JSON.parse(sessionSection);

        function convertTime(number) {
            if (number < 10) {
                return "0" + number;
            } else {
                return number;
            }
        }

        if (js != null) {
            localStorage.setItem("sessionSection", sessionSection);
            let lastSession = js;
            let startSession = lastSession.start_at;
            let finishSession = lastSession.finish_at;

            if (startSession !== "" && (finishSession === "" || finishSession === null)) {
                let countDownDate = new Date(startSession)
                countDownDate = countDownDate.getTime();

                var countDownFunc = setInterval(function () {
                    var date = new Date()
                    date.setUTCHours(date.getUTCHours() - 2);
                    var now = date.getTime();
                    var timeLeft = countDownDate - now;

                    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                    var time = `<i class="fa fa-clock-o"></i> ${convertTime(hours)} : ${convertTime(minutes)} : ${convertTime(seconds)}`;
                    document.getElementById("countdown").innerHTML = time;

                    if (hours < 1 && minutes < 1 && seconds < 1) {
                        clearInterval(countDownFunc);
                        document.getElementById("countdown").innerHTML = `<i class="fa fa-clock-o"></i> 00 : 00 : 00`;
                    }
                }, 1000)
            }
        }
    </script>
    <!-- Mainly scripts -->
    <script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?> "></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?> "></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?> "></script>
    <script src="<?= base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?> "></script>
    <script src="<?= base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?> "></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url('assets/js/inspinia.js') ?> "></script>
    <script src="<?= base_url('assets/js/plugins/pace/pace.min.js') ?> "></script>

    <!-- Flot -->
    <script src="<?= base_url('assets/js/plugins/flot/jquery.flot.js') ?> "></script>
    <script src="<?= base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js') ?> "></script>
    <script src="<?= base_url('assets/js/plugins/flot/jquery.flot.resize.js') ?> "></script>

    <!-- ChartJS-->
    <script src="<?= base_url('assets/js/plugins/chartJs/Chart.min.js') ?> "></script>

    <!-- Toastr -->
    <script src="<?= base_url('assets/js/plugins/toastr/toastr.min.js') ?>"></script>

    <!-- Peity -->
    <script src="<?= base_url('assets/js/plugins/peity/jquery.peity.min.js') ?> "></script>
    <!-- Peity demo -->
    <script src="<?= base_url('assets/js/demo/peity-demo.js') ?> "></script>

    <!-- Custom Javascript -->
    <?php
    for ($i = 0; $i < count($javascript); $i++) {
        echo '<script type="module" src="' . $javascript[$i] . '"></script>';
    }
    ?>

    <script>
        const fontS = localStorage.getItem("fontSize");
        if (fontS != null) {
            $("body").css("font-size", fontS);
            $(".fontSize").each(function () {
                $(".fontSize").removeClass("selected")
                if ($(this).css("font-size") == fontS) {
                    $(this).addClass("selected")
                }
            });
        }
        $(".fontSize").on("click", function() {
            $(".fontSize").removeClass("selected");
            $(this).addClass("selected");
            const fontSize = $(this).css("font-size");
            $("body").css("font-size", fontSize);
            localStorage.setItem("fontSize", fontSize);
        })
    </script>

</body>

</html>
