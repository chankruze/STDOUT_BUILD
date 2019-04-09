<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Build Stats</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./assets/css/main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- <script src="./assets/js/main.js" type="text/javascript"></script> -->
</head>

<body>

    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><i class="fas fa-frog Blink"></i> N00b Kernel</a>
            <span class="navbar-text">
                N00biness overloaded !
            </span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto"></ul>
                <span class="navbar-text"><i class="fab fa-dev"></i> chankruze</span>
                <span class="navbar-text"><i class="fas fa-code-branch"></i> 1.0.0</span>
            </div>
        </nav>
    </div>

    <!-- alert -->
    <div class="container">
        <div class="alert alert-primary" role="alert">
            build STDOUT window
        </div>
    </div>

    <!-- footer -->
    <footer class="footer fixed-bottom">
        <div class="float-left">
            <span>Powered by</span>
            <a href="https://geekofia.in">geekofia</a>
        </div>
        <div class="ml-auto float-right">
            <span class="links">
                <a class="navbar-brand" href="https://paypal.me/" target="_blank"><i class="fab fa-paypal"></i></a>
                <a class="navbar-brand" href="https://t.me/geekofia" target="_blank"><i class="fab fa-telegram"></i></a>
                <a class="navbar-brand" href="https://instagram.com/chankruze" target="_blank"><i
                        class="fab fa-instagram"></i></a>
            </span>
        </div>
    </footer>

    <div class="container">
        <div class="jumbotron" id="stdout">
            <pre>
                <?php
                /**
                 * Execute the given command by displaying console output live to the user.
                 *  @param  string  cmd          :  command to be executed
                 *  @return array   exit_status  :  exit status of the executed command
                 *                  output       :  console output of the executed command
                 */

                function liveExecuteCommand($cmd){

                    while (@ob_end_flush()); // end all output buffers if any

                    $proc = popen("$cmd 2>&1 ; echo Exit status : $?", 'r');

                    $live_output = "";
                    $complete_output = "";

                    while (!feof($proc)) {
                        $live_output = fread($proc, 4096);
                        $complete_output = $complete_output . $live_output;
                        echo "$live_output";
                        echo "<script type='text/javascript'>
                            var stdout = document.getElementById('stdout');
                            stdout.scrollTop = stdout.scrollHeight - stdout.clientHeight;</script>";
                        @flush();
                    }

                    pclose($proc);

                    // get exit status
                    preg_match('/[0-9]+$/', $complete_output, $matches);

                    // return exit status and intended output
                    return array(
                        'exit_status' => intval($matches[0]),
                        'output' => str_replace("Exit status : " . $matches[0], '', $complete_output),
                    );
                }

                $result = liveExecuteCommand("nc -l 3333");

                if($result['exit_status'] === 0){

                } else {
                    // do something on failure
                }

                ?>
            </pre>
        </div>
    </div>

</body>

</html>