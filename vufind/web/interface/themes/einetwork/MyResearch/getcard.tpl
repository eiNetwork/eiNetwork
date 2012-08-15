{*<script type="text/javascript" src="{$path}/js/validate/jquery.validate.js"></script>*}
<div id="page-content" class="content">
	<div id="left-bar">
		&nbsp;
	</div>
	<div id="main-content">
		<p>Please enter the following information to set up your account.</p>
		<p>Fields marks in yellow are required.</p>
		<div class="page">
			<form id="getacard" method="POST" action="{$path}/MyResearch/GetCard">
				<div class="title">Personal Information</div>
				<div class="name">
					<div id="first_name" class="require">
						<div >
							First Name
							<span class="error">*required</span>
						</div>
						<div>
							<input name="firstName" type="text" class="required text"/>
						</div>
					</div>
					<div id="middle_name" class="short">
						<div>MI</div>
						<div>
							<input name="middleInitial" type="text" class="text" />
						</div>
					</div>
					<div id="last_name" class="require">
						<div>
							Last Name
							<span class="error">*required</span>
						</div>
						<div>
							<input name="lastName" type="text"  class="required text" />
						</div>
					</div>
				</div>
				
				
				<div class="birth_date">
					<div >Birth Date</div>
					<select class="valid" id="month">
						<option value="01">January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
					<select class="valid" id="day">
						<option value="1">01</option>
						<option value="2">02</option>
						<option value="3">03</option>
						<option value="4">04</option>
						<option value="5">05</option>
						<option value="6">06</option>
						<option value="7">07</option>
						<option value="8">08</option>
						<option value="9">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
					<select class="valid" id="year">
						<option value="1922">1922</option>
						<option value="1923">1923</option>
						<option value="1922">1924</option>
						<option value="1923">1925</option>
						<option value="1922">1926</option>
						<option value="1923">1927</option>
						<option value="1922">1928</option>
						<option value="1923">1929</option>
						<option value="1922">1930</option>
						<option value="1923">1931</option>
						<option value="1922">1932</option>
						<option value="1923">1933</option>
						<option value="1922">1934</option>
						<option value="1923">1935</option>
						<option value="1922">1936</option>
						<option value="1923">1937</option>
						<option value="1922">1938</option>
						<option value="1923">1939</option>
						<option value="1922">1940</option>
						<option value="1923">1941</option>
						<option value="1922">1942</option>
						<option value="1923">1943</option>
						<option value="1922">1944</option>
						<option value="1923">1945</option>
						<option value="1922">1946</option>
						<option value="1923">1947</option>
						<option value="1922">1948</option>
						<option value="1923">1949</option>
						<option value="1922">1950</option>
						<option value="1923">1951</option>
						<option value="1922">1952</option>
						<option value="1923">1953</option>
						<option value="1922">1954</option>
						<option value="1923">1955</option>
						<option value="1922">1956</option>
						<option value="1923">1957</option>
						<option value="1922">1958</option>
						<option value="1923">1959</option>
						<option value="1922">1960</option>
						<option value="1923">1961</option>
						<option value="1922">1962</option>
						<option value="1923">1963</option>
						<option value="1922">1964</option>
						<option value="1923">1965</option>
						<option value="1922">1966</option>
						<option value="1923">1967</option>
						<option value="1922">1968</option>
						<option value="1923">1969</option>
						<option value="1922">1970</option>
						<option value="1923">1971</option>
						<option value="1922">1972</option>
						<option value="1923">1973</option>
						<option value="1922">1974</option>
						<option value="1923">1975</option>
						<option value="1922">1976</option>
						<option value="1923">1977</option>
						<option value="1922">1978</option>
						<option value="1923">1979</option>
						<option value="1922">1980</option>
						<option value="1923">1981</option>
						<option value="1922">1982</option>
						<option value="1923">1983</option>
						<option value="1922">1984</option>
						<option value="1923">1985</option>
						<option value="1922">1986</option>
						<option value="1923">1987</option>
						<option value="1922">1988</option>
						<option value="1923">1989</option>
						<option value="1922">1990</option>
						<option value="1923">1991</option>
						<option value="1922">1992</option>
						<option value="1923">1993</option>
						<option value="1922">1994</option>
						<option value="1923">1995</option>
						<option value="1922">1996</option>
						<option value="1923">1997</option>
						<option value="1922">1998</option>
						<option value="1923">1999</option>
						<option value="1922">2000</option>
						<option value="1923">2001</option>
						<option value="1922">2002</option>
						<option value="1923">2003</option>
						<option value="1922">2004</option>
						<option value="1923">2005</option>
						<option value="1922">2006</option>
						<option value="1923">2007</option>
						<option value="1922">2008</option>
						<option value="1923">2009</option>
					</select>
				</div>
				
				<div class="gender">
					<div>Gender</div>
					<div>
						<select class="valid">
							<option value="m">Male</option>
							<option value="f">Female</option>
						</select>
					</div>
				</div>
				
				
				<div class="email require">
					<div>
						Email Address
					</div>
					<input name="email" type="text" class="text">
				</div>
				
				<div class="phone require">
					<div>
						Phone Number
					</div>
					<div>
						<input name="phone" type="text" class="text"/>
					</div>
				</div>
				
				<div class="title">Primary Address</div>
				<div class="address">
					
					<div id="street" class="require">
						<div>
							Street Address or P.O. Box
							 <span class="error">*required</span>
						</div>
						<div>
							<input name="street" type="text" class="text"/>
						</div>
					</div>
					<div id="apartment">
						<div>Apartment Number, Suite</div>
						<div>
							<input name="apartment" type="text" class="text"/>
						</div>
					</div>
					
					<div id="city" class="require">
						<div>
							City
							<span class="error">*required</span>
						</div>
						<div>
							<input name="city" type="text" class="text"/>
						</div>
					</div>
					<div id="state">
						<div>State</div>
						<div>
							<select name="state">
								<option value="Alabama">AL</option>
								<option value="Alaska">AK</option>
								<option value="Arizona">AZ</option>
								<option value="Arkansas">AR</option>
								<option value="California">CA</option>
								<option value="Colorado">CO</option>
								<option value="Connecticut">CT</option>
								<option value="District of Columbia">DC</option>
								<option value="Delaware">DE</option>
								<option value="Floria">FL</option>
								<option value="Georgia">GA</option>
								<option value="Hawaii">HI</option>
								<option value="Idaho">ID</option>
								<option value="Illinois">IL</option>
								<option value="Indiana">IN</option>
								<option value="Iowa">IA</option>
								<option value="Kansas">KS</option>
								<option value="Kentucky">KY</option>
								<option value="Louisiana">LA</option>
								<option value="Maine">ME</option>
								<option value="Maryland">MD</option>
								<option value="Massachusetts">MA</option>
								<option value="Michigan">MI</option>
								<option value="Minnesota">MT</option>
								<option value="Nebraska">NE</option>
								<option value="Nevada">NV</option>
								<option value="New Hampshire">NH</option>
								<option value="New Jersey">NJ</option>
								<option value="New Mexico">NM</option>
								<option value="New York">NY</option>
								<option value="North Carolina">NC</option>
								<option value="North Dakota">ND</option>
								<option value="Ohio">OH</option>
								<option value="Oklahoma">OK</option>
								<option value="Oregon">OR</option>
								<option value="Pennsylvania" selected="selected">PA</option>
								<option value="Rhode Island">RI</option>
								<option value="South Carolina">SC</option>
								<option value="South Dakota">SD</option>
								<option value="Tennessee">TN</option>
								<option value="Texas">TX</option>
								<option value="Utah">UT</option>
								<option value="Vermont">VT</option>
								<option value="Virgina">VA</option>
								<option value="Washington">WA</option>
								<option value="West Virginia">WV</option>
								<option value="Wisconsin">WI</option>
								<option value="Wyoming">WY</option>
							</select>
						</div>
					</div>
						
					<div id="zip_code" class="require">
						<div>
							Zip Code
							<span class="error">*required</span>
						</div>
						<div>
							<input name="zip" type="text" class="text"/>
						</div>
						
					</div>
					
				</div>
				
				<div class="title">Secondary Address</div>
				<div class="address">
					
					<div id="street">
						<div>Street Address or P.O. Box</div>
						<div>
							<input name="street" type="text" class="text"/>
						</div>
					</div>
					<div id="apartment">
						<div>Apartment Number, Suite</div>
						<div>
							<input name="apartment" type="text" class="text"/>
						</div>
					</div>
				
					<div id="city">
						<div>City</div>
						<div>
							<input name="city" type="text" class="text"/>
						</div>
					</div>
					<div id="state">
						<div>State</div>
						<div>
							<select name="state">
								<option value="Alabama">AL</option>
								<option value="Alaska">AK</option>
								<option value="Arizona">AZ</option>
								<option value="Arkansas">AR</option>
								<option value="California">CA</option>
								<option value="Colorado">CO</option>
								<option value="Connecticut">CT</option>
								<option value="District of Columbia">DC</option>
								<option value="Delaware">DE</option>
								<option value="Floria">FL</option>
								<option value="Georgia">GA</option>
								<option value="Hawaii">HI</option>
								<option value="Idaho">ID</option>
								<option value="Illinois">IL</option>
								<option value="Indiana">IN</option>
								<option value="Iowa">IA</option>
								<option value="Kansas">KS</option>
								<option value="Kentucky">KY</option>
								<option value="Louisiana">LA</option>
								<option value="Maine">ME</option>
								<option value="Maryland">MD</option>
								<option value="Massachusetts">MA</option>
								<option value="Michigan">MI</option>
								<option value="Minnesota">MT</option>
								<option value="Nebraska">NE</option>
								<option value="Nevada">NV</option>
								<option value="New Hampshire">NH</option>
								<option value="New Jersey">NJ</option>
								<option value="New Mexico">NM</option>
								<option value="New York">NY</option>
								<option value="North Carolina">NC</option>
								<option value="North Dakota">ND</option>
								<option value="Ohio">OH</option>
								<option value="Oklahoma">OK</option>
								<option value="Oregon">OR</option>
								<option value="Pennsylvania" selected="selected">PA</option>
								<option value="Rhode Island">RI</option>
								<option value="South Carolina">SC</option>
								<option value="South Dakota">SD</option>
								<option value="Tennessee">TN</option>
								<option value="Texas">TX</option>
								<option value="Utah">UT</option>
								<option value="Vermont">VT</option>
								<option value="Virgina">VA</option>
								<option value="Washington">WA</option>
								<option value="West Virginia">WV</option>
								<option value="Wisconsin">WI</option>
								<option value="Wyoming">WY</option>
							</select>
						</div>
					</div>
						
					<div id="zip_code">
						<div>Zip Code</div>
						<div>
							<input name="zip" type="text" class="text"/>
						</div>
						
					</div>
					
				</div>
				

				
				<div class="agreement">
					<p>
					I agree to be responsible for all library materials borrowed on my card.
					I will pay any late fees or charges for all delinquent, lost or damaged materials.
					</p>
					<p>
					We will not release email addresses or any other information in your library record to
					third parties without an appropriate legal court document.
					</p>
					<input id="getcardSubmit" name="submit" class="button" type="submit" onclick="return checkNewCard()" value="Submit" />
				</div>
			
			</form>
		</div>
	</div>
	<div id="right-bar">
		&nbsp;
	</div>
</div>
<script type="text/javascript">
{literal}
	$(document).ready(function(){
		$("#getacard").validate();
		
		$('input[name=phone]').blur(function(){
			var phone=$(this).val(),
			    phoneReg=/^[2-9]\d{9}$/;
			if(!phone){
				$('.phone').children('div').append('<span class="error">*required</span>');
				return false;
			}else if(!phoneReg.test(phone)){
				$('.phone').children('div').append('<span class="error">please a valid phone number</span>');
				phoneValid=false;
				return false;
			}else{
				$('.phone').children('div').append('<span classs="error">&nbsp;</span>');
				return true;
			}
		});

		$('#email_input').blur(function(){
			var email=$('input[name="email"]').val(),
		            emailReg=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			if(!emailReg.test(email)||email==''){
				$('#emailError').text("*please enter a vaild phone number");
				emailValid=false;
				return false;
			}else{
				$('#emailError').html('&nbsp;');
			}
		});
	});
{/literal}
</script>
