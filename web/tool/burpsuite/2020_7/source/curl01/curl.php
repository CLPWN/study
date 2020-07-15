<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>curl</title>
</head>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="curl.php">
        <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top"
            alt="" loading="lazy">
        魚拓!
    </a>
</nav>

<body>
    <div class="container">
        <div class="row py-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="text-right  ">
                    <form action="curl.php" method="post">
                        <div class="form-group p-2">
                            <input type="text" name="url" class="form-control" placeholder="pdf化したいサイトのURLを入力"
                                aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary right">get gyotaku</button>
                    </form>
                    <?php if(isset($_POST["url"]))
                        {
                        echo '<form action="uc.html" method="post">   
                                <button type="submit" class="btn btn-link">get pdf</button>
                                </form>';
                        }
                ?>
                </div>
                <div class="row ">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded" style="min-height:100vh; width:100%;">
                           <?php
                            if(isset($_POST["url"]))
                            {
                                $url = $_POST["url"];
                                if(1)
                                {
                                    $ch = curl_init(); 
                                    curl_setopt($ch, CURLOPT_URL, $url); 
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    $html =  curl_exec($ch);
                                    highlight_string(($html));
                                    curl_close($ch); 
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>