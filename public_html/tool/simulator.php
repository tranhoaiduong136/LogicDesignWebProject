<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<script src="../js/myscripts.js"></script>
    <title>Logic Design Project</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
        <div class="container-fluid px-4 px-lg-5 justify-center">
            <a class="navbar-brand text-success" href="./home" style="font-family: Aldrich, sans-serif;">MIPS for everyone</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="./home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="./choice">Tool</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <section class="container-fluid mb-5">
        <div class="my-3 mx-5 d-flex justify-content-between">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./home">Home</a></li>
                    <li class="breadcrumb-item"><a href="./choice">Tool</a></li>
                    <li class="breadcrumb-item active" aria-current="page">MIPS Simulator</li>
                </ol>
            </nav>
            <a href="datapath-visualizer" class="text-decoration-none">&#8592; MIPS Single-cycle Datapath Visualizer</a>
        </div>

        <div class="d-flex flex-column justify-content-center text-center mx-5 px-5">
            <h1 id="tool-name">MIPS Simulator</h1>
        </div>

        <div class="container-fluid mb-5">
            <img src ='img/All_the_data-bro.png' class='img-fluid mx-auto d-block mb-3' style="width:30rem;" alt="programmer-coding-programming"/>
            <div class="form-group">
                <div class="container mx-auto d-block">
                    <div class="container mb-4">
                        <label for="Type" class="form-label h5 my-2">This Simulator supports these functionalities:</label>
                            <table class="table table-sm table-responsive table-hover table-bordered align-middle mb-3">
                                <caption>Functionalities supported by the Simulator</caption>
                                <tr class="text-center table-active"><th>MIPS virtual machine</th></tr>
                                <tr><td>Virtual machine (C++ implementation)</td></tr>
                                <tr class="text-center table-active"><th>MIPS and machine code converter</th></tr>
                                <tr><td>Machine Code to Assembly code</td></tr>
                                <tr><td>Assembly code to Machine code</td></tr>
                            </table>

                        <div class="text-secondary">
                            <small>
                                Note: <br>
                                - The input syntax used in Virtual Machine (C++ implementation) is a bit different from standard MIPS code. <br>
                                - For the MIPS and machine code converter, address of J-type instruction is set to be equal 0x01 by default.
                                Besides, minor bugs / errors may occur when handling too complicated program and hex values can not be processed at this moment.
                            </small>
                        </div>
                    </div>
                    <a href="MIPS_simulator" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5" style="background-color: #2d6a4f;">
        <div class="container px-4 px-lg-5"><div class="small text-center text-light">Copyright &copy; 2021</div></div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
