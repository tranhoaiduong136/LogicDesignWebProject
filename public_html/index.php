<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--FONTS-->
	<link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<!--/FONTS-->
    <link href="css/style.css" rel="stylesheet">
	<script src="js/myscripts.js"></script>
    <title>Logic Design Project</title>
</head>
<body>
    <!--NAV BAR-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
        <div class="container-fluid px-4 px-lg-5 justify-center">
            <a class="navbar-brand text-success" href="home" style="font-family: Aldrich, sans-serif;">MIPS for everyone</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="choice">Tool</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <!--/NAV BAR-->

    <header id="hero-section" class="cover-img container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>A collection of web-based supporting tools for MIPS learners</h2>
                    <p>These are some tools created to support students in their MIPS learning process. We have a list of references
                    that you may find useful, a datapath visualizer and a MIPS simulator which can parse and run MIPS code.</p>
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <button onClick="window.location = 'choice'" class="btn btn-md btn-success" type="button">
                            Start learning »
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr class="my-4">
    <section id="general-info" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid mx-5">
        <div class="d-flex flex-column justify-content-center text-left">
            <img style="max-width: 45rem;" class="img-fluid mx-auto d-block" src="img/JavaScript-frameworks-pana.png">
            <div class="d-block mx-5">
                <h5 class="text-center">What is <mark>MIPS</mark>?</h5>
                <p class="text-black my-2">
                    MIPS stands for <em>Microprocessor without Interlocked Pipelined Stages</em>. It is a reduced instruction
                    set computer (RISC) instruction set architecture (ISA) introduced for the first time by a company
                    named MIPS Technologies in 1985. This architecture still plays a major role in the embedded
                    processor market nowadays and hundreds of customers continue to use it commercially,
                    including Microchip Technology, Mobileye and MediaTek. <br><br>
                    MIPS can be considered a perfect exemplar of a RISC system. Its implementation is relatively simple
                    and straightforward, but still enough to illustrate the nature of pure RISC. Besides, this
                    architecture greatly influenced later RISC architectures, such as Alpha. For those reasons, MIPS
                    architecture is often taught in Computer Architecture course of universities and technical schools. <br><br>
                    It’s a great one to learn, because it can help you get a better understanding of how your code
                    would be executed on hardware, and also expose you to various kinds of low-level concerns,
                    things that you may have never thought of when coding in higher-level languages. <br>
                    <small><a href="https://www.youtube.com/watch?v=u1Luj0TVK9w" class="text-success text-decoratio-none">See how this website can help you learning MIPS >></a></small>
                </p>
            </div>
        </div>
    </section>
    <hr class="my-4">
    <section id="ref" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container mt-5 mb-5">
        <h2 class="text-center">Want to learn MIPS?</h2> <br>
        <div class="d-flex flex-lg-row flex-md-row flex-sm-col">
            <div class="text-wrap">
                To get started with MIPS programming, first you will need a good Integrated Development Environment (IDE)
                that can help you compile and execute your code. We recommend using MARS (MIPS Assembler and Runtime
                Simulator). You can easily find it by looking for “mars mips” on the Internet, or
                <a href="http://courses.missouristate.edu/kenvollmar/mars/" class="text-decoration-none">click here</a>.
                Beside MARS, you can also use the <a href="http://spimsimulator.sourceforge.net/" class="text-decoration-none">QtSpim / SPIM simulator</a>.
                <br><br>
                After installing the IDE, you can go through some references provided below:
            </div>
        </div>

        <div class="mt-3 mb-2">
            <?php
                $servername = "localhost";
                $username = "id18235052_root";
                $password = "DPAEUR<a%Lui2)/E";
                $dbname = "id18235052_project_db";

                $con = mysqli_connect($servername, $username, $password, $dbname);
                
                if ($con === false) die("ERROR: Could not connect. " . mysqli_connect_error());

                $sql = "SELECT * FROM MIPS_ref";
                $result = mysqli_query($con, $sql);

                echo ("<table class='table table-responsive table-hover'>");
                echo "<caption>List of references</caption>";
                $head_class0 = "table";
                echo "<thead class='text-center'><tr><th>#</th><th>Category</th><th>Reference</th><th>Language</th></tr></thead>";
                echo "<tbody>";

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $link_address = $row['link'];
                        echo "<tr>";
                            echo ("<th class='text-center'>" . $row['id'] . "</th>");
                            echo ("<td class='text-center'>" . $row['category'] . "</td>");
                            echo ("<td><a href='$link_address'>" . $row['refName'] . "</a></td>");
                            echo ("<td class='text-center'>" . $row['lang'] . "</td>");
                        echo "</tr>";
                    }
                } else echo "0 results found!";

                echo "</tbody>";
                echo "</table>";
                mysqli_close($con);
            ?>
        </div>
        <div class="mb-5">
            <div class="text-center mb-2">
                If you find out some interesting and useful references that had not been listed above, feel free to make
                a suggestion to us. Any help is welcomed and appreciated.
            </div>
            <div class="d-flex flex-row mx-5 justify-content-center">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalSuggestion">
                    Make a suggestion
                </button>
            </div>

            <div id="ModalSuggestion" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">Your suggestion</h1>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="">
                                <div class="mb-3">
                                    <label for="category-select" class="form-label">Category</label>
                                    <select class="form-control" name="category-select">
                                        <option value="Wikidepia">Wikidepia</option>
                                        <option value="Youtube playlist / video">Youtube playlist / video</option>
                                        <option value="Textbook">Textbook</option>
                                        <option value="PDF - Powerpoint">PDF / Powerpoint</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="language" class="form-label">Language</label>
                                    <input type="text" class="form-control" name="language">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Reference name</label>
                                    <input type="text" class="form-control" name="name" aria-describedby="nameHelp">
                                    <div id="nameHelp" class="form-text text-primary">This is a required field!</div>

                                </div>
                                <div class="mb-3">
                                    <label for="link" class="form-label">Reference link</label>
                                    <input type="text" class="form-control" name="link" aria-describedby="linkHelp">
                                    <div id="linkHelp" class="form-text text-primary">This is a required field!</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $category = $lang = $name = $link = "";
                $servername = "localhost";
                $username = "id18235052_root";
                $password = "DPAEUR<a%Lui2)/E";
                $dbname = "id18235052_project_db";

                $con = mysqli_connect($servername, $username, $password, $dbname);
                if ($con === false) die("ERROR: Could not connect. " . mysqli_connect_error());

                $category = $_POST["category-select"];
                $lang = $_POST["language"];
                $name = $_POST["name"];
                $link = mysqli_real_escape_string($con, $_POST["link"]);

                if (empty($link) || empty($name)) {
                    echo "<div class='text-center text-danger'>ERROR: Your suggestion can not be processed. Please fill in all the required fields!</div>";
                } else {
                    echo "<div class='text-center text-success'>Your suggestion has been received. Thank you!</div>";
                    $sql = "INSERT INTO pending (category, lang, refName, link)
                            VALUES ('" . $category . "', '" . $lang . "', '" . $name . "', '" . $link . "')";
                    if (!mysqli_query($con, $sql))
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
            }
        ?>
    </section>

    <div class="d-flex flex-row mx-5 justify-content-center text-center">
        <a href="#hero-section" class="text-success text-decoration-none px-2 py-2 h3">&#9650;</a>
    </div>

    <footer class="py-5" style="background-color: #2d6a4f;">
        <div class="container px-4 px-lg-5"><div class="small text-center text-light">Copyright &copy; 2021</div></div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
