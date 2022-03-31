<?php
    // CREATE DATABASE
    $servername = "localhost";
    $username = "id18235052_root";
    $password = "DPAEUR<a%Lui2)/E";

    $con = mysqli_connect($servername, $username, $password);
    if ($con === false)
        die("ERROR: Could not connect. " . mysqli_connect_error());

    $sql = "CREATE DATABASE project_db";
    if (mysqli_query($con, $sql)) echo "Database created successfully. <br>";
        else echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    mysqli_close($con);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // CREATE TABLE
    $servername = "localhost";
    $username = "id18235052_root";
    $password = "DPAEUR<a%Lui2)/E";
    $dbname = "id18235052_project_db";

    $con = mysqli_connect($servername, $username, $password, $dbname);
    if ($con === false) die("ERROR: Could not connect. " . mysqli_connect_error());

    $sql = "CREATE TABLE MIPS_ref (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                   category VARCHAR(20) NOT NULL,
                                   lang VARCHAR(10) NOT NULL,
                                   refName VARCHAR(100) NOT NULL,
                                   link VARCHAR(100) NOT NULL)";
    if (mysqli_query($con, $sql)) echo "Table of references created successfully. ";
    else echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);


    $sql = "CREATE TABLE pending (u_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                  date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                  category VARCHAR(20) NOT NULL,
                                  lang VARCHAR(10) NOT NULL,
                                  refName VARCHAR(100) NOT NULL UNIQUE,
                                  link VARCHAR(500) NOT NULL)";
    if (mysqli_query($con, $sql)) echo "Table of pending suggestion created successfully. <br>";
    else echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //  INSERT MIPS REFs TO DATABASE

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Wikidepia',
                    'English',
                    'MIPS architecture',
                    'https://en.wikipedia.org/wiki/MIPS_architecture')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Wikidepia',
                    'English',
                    'MIPS architecture processors',
                    'https://en.wikipedia.org/wiki/MIPS_architecture_processors')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'English',
                    'MIPS Assembly Programming Simplified',
                    'https://youtube.com/playlist?list=PL5b07qlmA3P6zUdDf-o97ddfpvPFuNa5A')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'English',
                    'Computer Architecture - by Mifta Sintaha',
                    'https://youtube.com/playlist?list=PLW1OMpQZxu7yGGcqrMsZtHZEa4X5IETVh')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'English',
                    'Computer Architecture - by Tahia Tabassum',
                    'https://youtube.com/playlist?list=PL13iOr69GclZmrxScES2ECHf9PZhpRuCO')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'English',
                    'MIPS Instruction Set Architecture (1 of 2)',
                    'https://youtube.com/playlist?list=PLylNWPMX1lPlmEeeMdbEFQo20eHAJL8hx')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'English',
                    'MIPS Instruction Set Architecture (2 of 2)',
                    'https://youtube.com/playlist?list=PLylNWPMX1lPnipZzKdCWRj2-un5xvLLdK')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'English',
                    'MIPS Assembly Language Programming',
                    'https://youtube.com/playlist?list=PL1C2GgOjAF-KYdV5bH-xzoybEHreDZ3Kh')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'English',
                    'MIPS Lectures',
                    'https://youtube.com/playlist?list=PL6AD3A7DB35D14937')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'Portuguese',
                    'Assembly MIPS - Como Programar',
                    'https://youtube.com/playlist?list=PLHCyLhqWSaHBFGanvPRIIvta3eSna2G6Z')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'Hindi',
                    'MIPS Computer Architecture Lectures in Hindi',
                    'https://youtube.com/playlist?list=PLOq2ARxtuVPjufvrv9CsRfOCQ8gDyB-xY')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube playlist',
                    'Vietnamese',
                    'MIPS - MARS',
                    'https://youtube.com/playlist?list=PL3FqACoShMKbxU7QsM2H_mxjHf-TKqXDi')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Youtube video',
                    'English',
                    'You Can Learn MIPS Assembly in 15 Minutes | Getting Started in 2021',
                    'https://youtu.be/5AN4Fo0GiBI')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Textbook',
                    'English',
                    'Computer Organization and Design – The Hardware / Software Interface - by David A. Paterson & John L. Hennessy',
                    'https://www.google.com/search?client=firefox-b-d&q=Computer+Organization+and+Design+%E2%80%93+The+Hardware+%2F+Software+Interface')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Textbook',
                    'English',
                    'Introduction to MIPS Assembly Language Programming - by Charles Kann, Gettysburg College',
                    'https://www.google.com/search?client=firefox-b-d&q=Introduction+to+MIPS+Assembly+Language+Programming')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Textbook',
                    'English',
                    'MIPS Assembly Language Programming - by Robert L.Britton',
                    'https://www.google.com/search?client=firefox-b-d&q=MIPS+Assembly+Language+Programming')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Textbook',
                    'English',
                    'Guide to RISC Processors - by Sivarama P. Dandamudi',
                    'https://www.google.com/search?client=firefox-b-d&q=Guide+to+RISC+Processors')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Textbook',
                    'English',
                    'See MIPS Run - by Dominic Sweetman',
                    'https://www.google.com/search?client=firefox-b-d&q=See+MIPS+Run')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $name = "The MIPS Programmer's Handbook - by Erin Farquhar & Philip J. Bunce";
    $_name = mysqli_real_escape_string($con, $name);
    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Textbook',
                    'English',
                    '$_name',
                    'https://www.google.com/search?client=firefox-b-d&q=The+MIPS+Programmer%27s+Handbook')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Textbook',
                    'English',
                    'The Ultimate Educational Guide to MIPS Assembly Programming - by Panayotis M. Papazoglou',
                    'https://www.google.com/search?client=firefox-b-d&q=The+Ultimate+Educational+Guide+to+MIPS+Assembly+Programming')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('PDF - Powerpoint',
                    'English',
                    'MIPS Quick Tutorial',
                    'http://www.cs.ucc.ie/~jvaughan/archres/RISC/MIPS%20Quick%20Tutorial.pdf')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $name = "MIPS Assembly Language Programmer’s Guide";
    $_name = mysqli_real_escape_string($con, $name);
    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('PDF - Powerpoint',
                    'English',
                    '$_name',
                    'https://www.cs.unibo.it/~solmi/teaching/arch_2002-2003/AssemblyLanguageProgDoc.pdf')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('PDF - Powerpoint',
                    'English',
                    'MIPS Assembly Language Programming using QtSpim - by Ed Jorgensen',
                    'http://www.egr.unlv.edu/~ed/MIPStextSMv11.pdf')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('PDF - Powerpoint',
                    'English',
                    'MARS Tutorial - by Pete Sanderson & Ken Vollmar',
                    'https://cs.slu.edu/~fritts/CSCI140_F12/schedule/MARS%20Tutorial.pdf')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('PDF - Powerpoint',
                    'English',
                    'Learning MIPS & SPIM',
                    'https://www2.engr.arizona.edu/~ece369/Resources/spim/QtSPIM_examples.pdf')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('PDF - Powerpoint',
                    'English',
                    'MIPS Assembly Language Programming Discussion and Project Book - by Daniel J. Ellard',
                    'https://gear.kku.ac.th/~watis/courses/198701/MIPSAssemblyLanguageProgramming.pdf')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Others',
                    'English',
                    'MIPS Converter - Convert MIPS instruction to HEX',
                    'https://www.eg.bucknell.edu/~csci320/mips_web/index.html')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Others',
                    'English',
                    'MIPS Reference Data / MIPS Green Sheet',
                    'https://inst.eecs.berkeley.edu/~cs61c/resources/MIPS_Green_Sheet.pdf')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Others',
                    'English',
                    'Programmed Introduction to MIPS Assembly Language',
                    'https://chortle.ccsu.edu/assemblytutorial/index.html')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    $sql = "INSERT INTO MIPS_ref (category, lang, refName, link)
            VALUES ('Others',
                    'English',
                    'Teaching Resources from official website of MIPS',
                    'https://www.mips.com/mac/resources/')";
    if (!mysqli_query($con, $sql))
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    mysqli_close($con);
?>