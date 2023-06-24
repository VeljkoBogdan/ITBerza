<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>IT Berza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>

        <div class="col-sm-8 text-left">
            <div class="container col-sm-12">
                <form class="form-horizontal" id="jobForm" action="add_job.php" method="POST">
                    <div class="text-center self-center rounded-md">
                        <div class="">
                            <h3>Employer Information</h3>
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group">
                            <label class="control-label" for="contact_name">
                                Contact Person:
                            </label>
                            <input type="text" name="contact_name" id="contact_name" value="" class="form-control col-xs-3"
                                   placeholder="Contact Person" maxlength="255">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="contact_email">
                                Contact Email: <span> </span>
                            </label>
                            <input type="text" name="contact_email" id="contact_email" value=""
                                   class="form-control col-xs-3 required-field"
                                   placeholder="Kontakt email" maxlength="255" data-error-id="contact_email_error">
                            <p class="text-red-500 text-xs italic error-message" id="contact_email_error"></p>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label class="control-label"
                                   for="contact_phone">
                                Contact Telephone:
                            </label>
                            <input type="text" name="contact_phone" id="contact_phone" value="" class="form-control col-xs-3" placeholder="Telephone Number (format: 123-456-7890)" maxlength="255">
                            <p class="hidden" id="application_phone_validate">Kontakt telefon nije validan</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="company_name">
                                Company Name:<span> (OBAVEZNO) </span>
                            </label>
                            <input type="text" name="company_name" id="company_name" value="" class="form-control col-xs-3" placeholder="Company Name" maxlength="255" data-error-id="company_name_error">
                            <p class="hidden" id="company_name_error">Polje je obavezno</p>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label class="control-label" for="pib">
                                Pib: <span> (OBAVEZNO) </span>
                            </label>
                            <input type="text" name="pib" id="pib" value="" class="form-control col-xs-3" placeholder="Poreski identifikacioni broj" pattern="[0-9.]+" minlength="9" maxlength="9" data-error-id="pib_error">
                            <p class="hidden" id="pib_error">Polje je obavezno</p>
                        </div>
                    </div>

                    <div style="border-top: 1px solid black" class="text-center self-center rounded-md">
                        <div class="">
                            <h3>Job Information</h3>
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group">
                            <label class="control-label" for="position_name">
                                Position Name: <span> (OBAVEZNO) </span>
                            </label>
                            <input type="text" name="position_name" id="position_name" value="" class="form-control col-xs-3" placeholder="Naziv radne pozicije" maxlength="255" data-error-id="position_name_error">
                            <p class="hidden" id="position_name_error">Polje je obavezno</p>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="categories">
                                Category:
                            </label>
                            <select class="form-control col-xs-3" id="categories" name="categories[]" tabindex="-1">
                                <option value="1">menadžment (srednji)</option>
                                <option value="2">trgovina, prodaja</option>
                                <option value="4">ekonomija (opšte)</option>
                                <option value="5">IT</option>
                                <option value="6">pravo</option>
                                <option value="7">mašinstvo</option>
                                <option value="8">dizajn</option>
                                <option value="9">obrazovanje, briga o deci</option>
                                <option value="10">zdravstvo</option>
                                <option value="11">građevina, geodezija</option>
                                <option value="13">mediji (novinarstvo, štampa)</option>
                                <option value="14">ostalo</option>
                                <option value="17">jezici, književnost</option>
                                <option value="18">rudarstvo, metalurgija</option>
                                <option value="19">psihologija</option>
                                <option value="20">grafičarstvo, izdavaštvo</option>
                                <option value="22">menadžment (viši)</option>
                                <option value="24">biologija</option>
                                <option value="26">osiguranje, lizing</option>
                                <option value="27">hemija</option>
                                <option value="28">arhitektura</option>
                                <option value="29">telekomunikacije</option>
                                <option value="30">elektrotehnika</option>
                                <option value="31">farmacija</option>
                                <option value="32">veterina</option>
                                <option value="33">sociologija/socijalni rad</option>
                                <option value="34">ljudski resursi (HR)</option>
                                <option value="37">fizika, matematika</option>
                                <option value="40">zaštita životne sredine, ekologija</option>
                                <option value="41">umetnost</option>
                                <option value="42">prehrambena tehnologija</option>
                                <option value="43">turizam</option>
                                <option value="44">ugostiteljstvo</option>
                                <option value="45">tekstilna industrija</option>
                                <option value="46">administracija</option>
                                <option value="47">računovodstvo, knjigovodstvo</option>
                                <option value="48">marketing, promocija</option>
                                <option value="49">PR</option>
                                <option value="50">briga o lepoti</option>
                                <option value="51">sport, rekreacija</option>
                                <option value="52">obezbeđenje</option>
                                <option value="53">zaštita na radu</option>
                                <option value="54">poljoprivreda</option>
                                <option value="55">šumarstvo</option>
                                <option value="56">saobraćaj</option>
                                <option value="57">logistika</option>
                                <option value="58">bankarstvo</option>
                                <option value="59">finansije</option>
                                <option value="60">transport</option>
                                <option value="61">magacin</option>
                                <option value="62">zabava</option>
                                <option value="63">pozivni centri</option>
                                <option value="64">stomatologija</option>
                                <option value="65">kontrola kvaliteta</option>
                                <option value="66">priprema hrane</option>
                                <option value="67">higijena</option>
                                <option value="68">održavanje</option>
                                <option value="69">proizvodnja i montaža</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="form-group">
                            <label class="control-label" for="locations">
                                City:
                            </label>
                            <select class="form-control col-xs-3" id="locations" name="locations[]" tabindex="-1" data-ssid="ss-40410">
                                <option value="1">Zrenjanin</option>
                                <option value="2">Novi Sad</option>
                                <option value="3">Sremska Mitrovica</option>
                                <option value="4">Pančevo</option>
                                <option value="5">Vršac</option>
                                <option value="6">Sombor</option>
                                <option value="7">Kikinda</option>
                                <option value="8">Ruma</option>
                                <option value="9">Apatin</option>
                                <option value="10">Bačka Topola</option>
                                <option value="11">Kula</option>
                                <option value="12">Senta</option>
                                <option value="13">Crvenka</option>
                                <option value="14">Ada</option>
                                <option value="15">Bečej</option>
                                <option value="16">Srbobran</option>
                                <option value="17">Vrbas</option>
                                <option value="18">Odžaci</option>
                                <option value="19">Temerin</option>
                                <option value="20">Žabalj</option>
                                <option value="21">Bačka Palanka</option>
                                <option value="22">Futog</option>
                                <option value="23">Beočin</option>
                                <option value="24">Sremski Karlovci</option>
                                <option value="25">Šid</option>
                                <option value="26">Inđija</option>
                                <option value="27">Kovin</option>
                                <option value="29">Stara Pazova</option>
                                <option value="31">Kanjiža</option>
                                <option value="32">Horgoš</option>
                                <option value="34">Bela Crkva</option>
                                <option value="35">Beograd</option>
                                <option value="37">Smederevo</option>
                                <option value="38">Požarevac</option>
                                <option value="39">Kragujevac</option>
                                <option value="40">Kraljevo</option>
                                <option value="41">Kruševac</option>
                                <option value="42">Čačak</option>
                                <option value="43">Obrenovac</option>
                                <option value="44">Mladenovac</option>
                                <option value="45">Smederevska Palanka</option>
                                <option value="46">Velika Plana</option>
                                <option value="47">Lazarevac</option>
                                <option value="48">Aranđelovac</option>
                                <option value="49">Ljig</option>
                                <option value="51">Gornji Milanovac</option>
                                <option value="52">Arilje</option>
                                <option value="53">Jagodina</option>
                                <option value="54">Ćuprija</option>
                                <option value="55">Paraćin</option>
                                <option value="56">Despotovac</option>
                                <option value="58">Ivanjica</option>
                                <option value="59">Vrnjačka Banja</option>
                                <option value="60">Trstenik</option>
                                <option value="61">Aleksinac</option>
                                <option value="62">Sokobanja</option>
                                <option value="63">Aleksandrovac</option>
                                <option value="66">Donji Milanovac</option>
                                <option value="67">Kladovo</option>
                                <option value="68">Negotin</option>
                                <option value="69">Bor</option>
                                <option value="70">Zaječar</option>
                                <option value="74">Knjaževac</option>
                                <option value="76">Žagubica</option>
                                <option value="77">Majdanpek</option>
                                <option value="78">Despotovo</option>
                                <option value="79">Šabac</option>
                                <option value="80">Valjevo</option>
                                <option value="81">Užice</option>
                                <option value="82">Novi Pazar</option>
                                <option value="83">Loznica</option>
                                <option value="87">Krupanj</option>
                                <option value="90">Požega</option>
                                <option value="91">Bajina Bašta</option>
                                <option value="92">Priboj</option>
                                <option value="94">Prijepolje</option>
                                <option value="96">Niš</option>
                                <option value="97">Leskovac</option>
                                <option value="98">Vranje</option>
                                <option value="99">Prokuplje</option>
                                <option value="100">Pirot</option>
                                <option value="101">Babušnica</option>
                                <option value="103">Dimitrovgrad</option>
                                <option value="108">Medveđa</option>
                                <option value="109">Surdulica</option>
                                <option value="111">Kosovska Mitrovica</option>
                                <option value="112">Peć</option>
                                <option value="113">Priština</option>
                                <option value="114">Prizren</option>
                                <option value="117">Uroševac</option>
                                <option value="131">Ivangrad</option>
                                <option value="136">Danilovgrad</option>
                                <option value="148">Subotica</option>
                                <option value="150">Veternik</option>
                                <option value="151">Čelarevo</option>
                                <option value="153">Titel</option>
                                <option value="160">Vrdnik</option>
                                <option value="161">Boljevac</option>
                                <option value="165">Bač</option>
                                <option value="166">Stari Banovci</option>
                                <option value="167">Novi Bečej</option>
                                <option value="177">Niška Banja</option>
                                <option value="180">Kopaonik</option>
                                <option value="183">Vreoci</option>
                                <option value="189">Novi Kneževac</option>
                                <option value="193">Čoka</option>
                                <option value="198">Kać</option>
                                <option value="212">Čurug</option>
                                <option value="214">Čajetina</option>
                                <option value="222">Novo Miloševo</option>
                                <option value="226">Inostranstvo</option>
                                <option value="230">Banja Koviljača</option>
                                <option value="233">Kosovska Kamenica</option>
                                <option value="236">Nova Pazova</option>
                                <option value="238">Banja Vrujci</option>
                                <option value="239">Sremska Kamenica</option>
                                <option value="245">Zlatibor</option>
                                <option value="248">Lovćenac</option>
                                <option value="260">Topola</option>
                                <option value="263">Kovačica</option>
                                <option value="267">Šimanovci</option>
                                <option value="268">Lapovo</option>
                                <option value="269">Preševo</option>
                                <option value="270">Svilajnac</option>
                                <option value="271">Mali Iđoš</option>
                                <option value="272">Bujanovac</option>
                                <option value="273">Gajdobra</option>
                                <option value="274">Ub</option>
                                <option value="275">Batajnica</option>
                                <option value="276">Gnjilane</option>
                                <option value="277">Veliko Gradište</option>
                                <option value="278">Lebane</option>
                                <option value="279">Kuršumlija</option>
                                <option value="280">Mali Zvornik</option>
                                <option value="281">Surčin</option>
                                <option value="282">Pećinci</option>
                                <option value="283">Batočina</option>
                                <option value="284">Sjenica</option>
                                <option value="286">Novi Banovci</option>
                                <option value="287">Ljubovija</option>
                                <option value="288">Vladičin Han</option>
                                <option value="289">Petrovac na Mlavi</option>
                                <option value="290">Feketić</option>
                                <option value="291">Kosjerić</option>
                                <option value="292">Popovac</option>
                                <option value="293">Lajkovac</option>
                                <option value="294">Raška</option>
                                <option value="295">Nova Varoš</option>
                                <option value="296">Palić</option>
                                <option value="297">Sopot</option>
                                <option value="298">Barič</option>
                                <option value="299">Bački Petrovac</option>
                                <option value="300">Leštane</option>
                                <option value="301">Alibunar</option>
                                <option value="302">Bela Palanka</option>
                                <option value="303">Blace</option>
                                <option value="304">Bogatić</option>
                                <option value="305">Bojnik</option>
                                <option value="306">Bosilegrad</option>
                                <option value="307">Brus</option>
                                <option value="308">Ćićevac</option>
                                <option value="309">Crna Trava</option>
                                <option value="310">Dečani</option>
                                <option value="311">Doljevac</option>
                                <option value="312">Ðakovica</option>
                                <option value="313">Gadžin Han</option>
                                <option value="314">Glogovac</option>
                                <option value="315">Golubac</option>
                                <option value="316">Gora</option>
                                <option value="317">Irig</option>
                                <option value="318">Istok</option>
                                <option value="319">Kačanik</option>
                                <option value="320">Klina</option>
                                <option value="321">Knić</option>
                                <option value="322">Kosovo Polje</option>
                                <option value="323">Kučevo</option>
                                <option value="324">Leposavić</option>
                                <option value="325">Lipljan</option>
                                <option value="326">Lučani</option>
                                <option value="327">Malo Crniće</option>
                                <option value="328">Merošina</option>
                                <option value="329">Mionica</option>
                                <option value="330">Nova Crnja</option>
                                <option value="331">Novo Brdo</option>
                                <option value="332">Obilić</option>
                                <option value="333">Opovo</option>
                                <option value="334">Orahovac</option>
                                <option value="335">Osečina</option>
                                <option value="336">Plandište</option>
                                <option value="337">Podujevo</option>
                                <option value="338">Rača</option>
                                <option value="339">Ražanj</option>
                                <option value="340">Rekovac</option>
                                <option value="341">Sečanj</option>
                                <option value="342">Srbica</option>
                                <option value="343">Suva Reka</option>
                                <option value="344">Svrljig</option>
                                <option value="345">Štimlje</option>
                                <option value="346">Štrpce</option>
                                <option value="347">Trgovište</option>
                                <option value="348">Tutin</option>
                                <option value="349">Varvarin</option>
                                <option value="350">Vitina</option>
                                <option value="351">Vladimirci</option>
                                <option value="352">Vlasotince</option>
                                <option value="353">Vučitrn</option>
                                <option value="354">Zubin Potok</option>
                                <option value="355">Zvečan</option>
                                <option value="356">Žabari</option>
                                <option value="357">Žitište</option>
                                <option value="358">Žitorađa</option>
                                <option value="359">Koceljeva</option>
                                <option value="360">Busije</option>
                                <option value="361">Putinci</option>
                                <option value="362">Zemun Polje</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <span class=""><b>Remote work:</b> </span>
                            <div class="">
                                <span class="">
                                    <input type="radio" id="remoteWork" class="form-radio" name="remote_work" value="1">
                                    <label for="remoteWork" class="control-label">
                                        Yes
                                    </label>
                                </span>

                                <span class="">
                                    <input type="radio" id="noRemoteWork" class="form-radio" name="remote_work" value="0">
                                    <label for="noRemoteWork" class="control-label">
                                        No
                                    </label>
                                </span>
                            </div>

                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="form-group">
                            <label class="control-label" for="professional_qualification">
                                Professional qualifications:
                            </label>
                            <select id="professional_qualification" name="professional_qualification" class="form-control col-xs-3">
                                <option selected="" value="">Choose the qualification for the given job</option>
                                <option value="1">Primary School</option>
                                <option value="2">High School</option>
                                <option value="3">College / Higher School</option>
                                <option value="4">University</option>
                                <option value="5">Magistracy</option>
                                <option value="6">Doctorate / PhD</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="employment_type">
                                Employment Type: <span> (OBAVEZNO) </span>
                            </label>
                            <select id="employment_type" name="employment_type" data-error-id="employment_type_error" class="required-field form-control col-xs-3">
                                <option disabled="" selected="" value="">Choose a type </option>
                                <option value="1">Contract</option>
                                <option value="2">Internship</option>
                                <option value="3">Part-time job</option>
                            </select>
                            <p class="hidden" id="employment_type_error">Polje je obavezno</p>
                        </div>
                    </div>


                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="form-group">
                            <label class="control-label" for="text">
                                Text:
                            </label>
                            <textarea name="text" class="form-control col-xs-3" id="text" rows="4"></textarea>
                            <p class="italic">
                                <small>
                                    Here, describe in detail your program, the program organizer, what it entails, what
                                    are the application criteria, what needs to be sent with the application, etc.
                                </small>
                            </p>
                            <p class="hidden" id="text_error">
                                Polje je obavezno ukoliko nije dodata datoteka</p>
                        </div>
                    </div>

                    <div id="choose_application_type" class="flex md:flex-nowrap flex-col md:flex-row justify-between -mx-3 mt-2">
                        <div class="form-group">
                            <div class="">
                                <div id="email_input_form" class="mb-8">
                                    <label class="control-label" for="application_address">
                                        Signup Email:
                                    </label>
                                    <input type="text" name="application_address" id="application_address" value="" class="form-control col-xs-3" placeholder="Email for user signup" maxlength="255">
                                    <p class="hidden mb-3" id="application_email_error">Za konkurisanje preko forme Email polje je obavezno</p>
                                    <p class="hidden mb-3" id="application_email_validate">Email adresa nije validna!</p>
                                </div>

                                <div id="phone_input_form" class="mb-8">
                                    <label class="control-label" for="application_phone">
                                        Signup Telephone:
                                    </label>
                                    <input type="text" name="application_phone" id="application_phone" value="" class="form-control col-xs-3" placeholder="Telephone for user signup" maxlength="255">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class=" mt-5 grid md:grid-cols-3">
                        <div id="ad_period" class="form-group">
                            <div class=""><b>Ad duration:</b> <span> (OBAVEZNO) </span></div>
                            <label class="control-label">
                                <input type="radio" data-period="15" class="form-radio" name="ad_period" value="15" data-error-id="ad_period_error">
                                <span class="ml-2">15 dana</span>
                            </label>
                            <label class="control-label">
                                <input type="radio" data-period="30" class="form-radio" name="ad_period" value="30" data-error-id="ad_period_error">
                                <span class="ml-2">30 dana</span>
                            </label>
                            <p class="text-red-500 text-xs italic error-message hidden" id="ad_period_error">Polje je
                                obavezno</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="visible_from">
                                Signup Period: <span> (OBAVEZNO) </span>
                            </label>
                            <div class="sm:columns-2">
                                <input type="text" id="visible_from" name="visible_from" value="" class="date" placeholder="Od">
                                <input type="text" id="visible_to" name="visible_to" value="" class="date" placeholder="Do">
                            </div>
                            <p class="text-red-500 text-xs italic error-message hidden" id="visible_date_error">
                                Polja su obavezna
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-default border" type="button" id="submit_btn">
                                    Finish Job Form
                                </button>
                                <div></div><hr>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>ADS</p>
            </div>
            <div class="well">
                <p>ADS</p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center ">
    <p>&copy; 2023 Your Website. All rights reserved.</p>
</footer>

<!--        SCRIPTS           -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>