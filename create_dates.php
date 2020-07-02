<?php
/**
 * @copyright Copyright (c) 2020 Philipp Stappert <mail@philipprogramm.de>
 * 
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @license MIT License
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
    // max execution time
    function shutdown(){
        $error = error_get_last();

        if ($error == null) {
            echo("<script>console.log('No errors occured.');</script>");
        } else {
            goToNow("error.php?error=Maximale Skriptausführungszeit erreicht. Haben Sie die richtigen Start- und Enddaten eingegeben? <br> <a href='index.php?url=create_dates'>Zurück zur Seite</a>");
        }
    }
    register_shutdown_function('shutdown');
    set_time_limit(5);


    // create Dates
    if (isset($_GET["startdate"]) && isset($_GET["enddate"])){
        $startDate = date("Y-m-d", strtotime($_GET["startdate"]));
        $endDate = date("Y-m-d", strtotime($_GET["enddate"]));
        $dateArray = explode("-", $startDate);
        $date = $startDate;
        $dates = $dateArray[2] . "." . $dateArray[1] . "." . $dateArray[0] . "";
        $date = date("Y-m-d", strtotime($date . " + 7 days"));

        $repeater = true;
        while ($repeater) {
            if ($date == $endDate){
                $repeater = false;
            }
            if (checkHolidays($date) == false){
                $dateArray = explode("-", $date);
                $rightDate = $dateArray[2] . "." . $dateArray[1] . "." . $dateArray[0];
                $dates = $dates . ";" . $rightDate;
            };

            $date = date("Y-m-d", strtotime($date . " + 7 days"));
        }
    }
?>
<div class="form-middle border border-danger rounded">
    <p>Info: Dieses Formular errechnet alle Daten, die wöchentlich und außerhalb der Ferien innerhalb von Start- und Enddatum sind.</p>
	<form method="get" action="index.php">
        <input type="hidden" name="url" value="create_dates">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="startdate">Startdatum:</span>
		  </div>
		  <input type="date" class="form-control" aria-label="Startdatum" aria-describedby="startdate" name="startdate" required>
        </div>
        <div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="enddate">Enddatum:</span>
		  </div>
		  <input type="date" class="form-control" aria-label="Enddatum" aria-describedby="enddate" name="enddate" required>
        </div>
        <center><input type="submit" class="btn btn-danger" value="✔ Termine berechnen" /></center>
	</form>
        <?php
            if(isset($dates)){
        ?>
                <p>Termine:</p>
                <ul>
        <?php
                foreach (explode(";", $dates) as $dat){
        ?>
                    <li><?php echo $dat; ?></li>
        <?php
                }
        ?>
                </ul>
        <?php
            }
        ?>
</div>