<header class="main-header">
	<h1>
		<span class="tall-char">P</span>lant <span class="tall-char">S</span>ubmission <span class="tall-char">F</span>orm
	</h1>
	<p class="header-desc">
		Use this form to submit information regarding a species not featured on this site or if a correction to an existing page is needed.
	</p>
</header>
<form class="plant-form" method="post">
	<fieldset>
		<legend class="boldText">Details</legend>
		<div class="input-elem">
			<label class="label-align">Contributor:</label>
			<input class="input-text" type="text" name="contributor" maxlength="40" required />
		</div>
		<div class="input-elem">
			<label class="label-align">Plant Name:</label>
			<input class="input-text" type="text" name="plantName" maxlength="40" required />
		</div>
		<div class="input-elem">
			<label class="label-align">Description:</label>
			<textarea class="input-area" name="description" maxlength="1200" ></textarea>
		</div>
		<div class="input-elem">
			<label>Light Needs:</label>
			<select class="input-select" name="lightReq">
				<option value="shade">Shade</option>
				<option value="partShade">Partial Shade</option>
				<option value="partSun">Partial Sun</option>
				<option value="sun">Sun</option>
				<option value="unknown">Unknown</option>
			</select>
		</div>
		<div class="input-elem">
			<label>Growth Habit:</label>
			<select class="input-select" name="growthHabit">
				<option value="climbing">Climbing</option>
				<option value="selfHeading">Self-Heading</option>
				<option value="creeping">Creeping</option>
				<option value="unknown">Unknown</option>
			</select>
		</div>
		<div class="input-elem">
			<label>Difficulty:</label>
			<select class="input-select" name="difficulty">
				<option value="easy">Easy</option>
				<option value="medium">Medium</option>
				<option value="hard">Hard</option>
				<option value="unknown">Unknown</option>
			</select>
		</div>
		<div class="input-elem">
			<input id="cb_indoors" type="checkbox" value="indoorYes"/>
			<label class="label-checkbox" for="cb_indoors">Suitable for Indoors:</label>
			<!-- <input id="signup-offfers" class="input-check" name="offers" type="checkbox" checked>
			<label for="signup-offfers">Receive special offers:</label> -->
		</div>
		<div class="input-elem center-text">
			<input class="input-submit" type="submit" value="Submit" />
		</div>
	</fieldset>
</form>