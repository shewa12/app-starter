<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
	<style type="text/css">
		body {
			background: #e3e3e3;
			margin: 0px;
			padding: 0px;
		}
		input {
			width: 100% !important;
			height: 25px;
			border: 1px solid #94b6ea;
		}
		textarea{
			width: 100% !important;
		}
		table {
			width: 100%;
			text-align: left;
			border:1px solid;
			margin-bottom: 20px;
		}

		td, th {
		  border: 1px solid #484848;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
		.container {
			width: 100%;
			margin:auto;
			background-color:#e3e3e3;
			padding-bottom:20px;
		}
		.row {
			overflow: hidden;
			width: 99%;
			margin: auto;

		}
		header {
			background-color: #484848;
			color: #fff;
			width: 100%;
			height: 100px;
		}
		.nav {
			padding:0px 10px 10px 10px;
		}
		.header-left{
			float: left;
			width: 50%;
			text-align:left;
			line-height: 15px;
		}
		.header-right{
			float: right;
			width: 50%;
			text-align:right;
			line-height: 15px;
		}
		.logo {
			font-size: 34px;
			font-weight: bold;
			font-style: italic;
		}		
		.title {
			font-size: 24px;
			font-weight: bold;

		}
		.warn {
			float: left;
			width: 80%;
			padding-right:20px;
			text-align: left;
			overflow: hidden;
		}		
		.contract-id {
			float: right;
			width: 15%;
			text-align: left;
		}
		.panel-head{
			background-color: #484848;
			color:#fff;
			padding:5px;
		}
		.radio-left input{
			width: 20px !important;
			vertical-align: middle;
			margin-top: -2px;
		}
		.sign-one{
			float: left;
			width: 40%
		}
		.sign-two{
			float: right;
			width: 40%;
			text-align: right;
		}

		.footer-menu {
	
			font-size: 12px;
			color: #5e5a5a;
			padding: 0px !important;
		}
		.footer-menu  li {
			list-style: none;
			float: left;
			padding-right:0px;
			line-height: 20px;
		}
		.footer-menu li:last-child{
			padding-right:0px;
		}
		.footer-menu  li a{
			text-decoration: none;
		}
	</style>
</head>	
<body width="100%">
<div class="container">

	<header>
		<div class="nav">
			<div class="header-left">
				<h3 class="title">Kontrakt</h3>
				<p>Kontrakt for kjøp av kjøretøy - bil, motorsykkel, atv, båt</p>
			</div>
			<div class="header-right">
				<h3 class="logo">TJ AUTO</h3>
				<p>ORG.NR 975782336MVA   KONTO 1201.69.26653</p>
			</div>			
		</div>
	</header>

	<div class="row" style="height:90px;margin-top:20px;">
		<img src="{{url('public/images/warning.png')}}" alt="image" style="width:40px;height: 40px;float: left;">
		<div class="warn">

			
			<span class="wanr-text">
			Kontrakten må  fylles ut så nøyaktig og utfyllende som mulig. Den som bevisst gir uriktig eller ufullstendige opplysninger i kontrakten kan holdes erstatnings- og straffeansvarlig			
			</span>
		</div>	
		<div class="contract-id">

			<div class="panel">
				<div class="panel-head">
					Kontrakt ID
				</div>
				<div class="panel-body" style="border:1px solid;">
					{{$saleDetail->kontraktId}}
					
				</div>				
			</div>	

		</div>	
	</div>
	<!--kjoper start-->
	<div class="row" style="height:250px;">
		<h3>KJØPER</h3>
		<table>
			<tr>
				<th with="400px">Navn/Firmanavn</th>
				<th with="400px">Fødselsnummer/Organisasjonsnummer</th>
				<th with="400px">Fullmaktshaver</th>
			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->name}}
					</td>					
					<td>
						{{$saleDetail->idNumber}}
					</td>					
					<td>
						{{$saleDetail->Fullmaktshaver}}
					</td>
				</tr>
			</tbody>
		</table>		

		<table >
			<tr>
				<th width="30%">Gateadresse/Postboks</th>
				<th width="30%">Postnummer/-sted</th>
				<th width="30%">Telefon</th>
			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->address}}
					</td>					
					<td>
						{{$saleDetail->zip}}-{{$saleDetail->city}}
					</td>					
					<td>
						{{$saleDetail->phone}}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!--kjoper end-->
	<!--kjoretoy-->
	<div class="row" >
		<h3>KJØRETØY</h3>
		<table>
			<tr>
				<th width="25%">Fabrikat</th>
				<th width="25%">Årsmodell</th>
				<th width="25%">Modell</th>
				<th width="25%">Variant</th>
			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->brand}}
					</td>					
					<td>
						{{$saleDetail->modelYear}}
					</td>					
					<td>
						{{$saleDetail->model}}
					</td>					
					<td>
						{{$saleDetail->variant}}
					</td>
				</tr>
			</tbody>
		</table>		

		<table>
			<tr>
				<th width="25%">Kilometerstand</th>
				<th width="25%">Registreringsdato</th>
				<th width="25%">Registreringsnummer</th>
				<th width="25%">Understellsnummer</th>
			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->miles}}
					</td>					
					<td>
						{{$saleDetail->registrationDate}}
					</td>					
					<td>
						{{$saleDetail->registration}}
					</td>					
					<td>
						{{$saleDetail->vin}}
					</td>
				</tr>
			</tbody>
		</table>
		<table>
			<tr>
				<th width="50%">Medfølgende utstyr</th>
				<th width="50%">Særskilte vilkår</th>

			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->medfølgende}}
					</td>					
					<td>
						
							{{$saleDetail->særskilte}}
						
					</td>					

				</tr>
			</tbody>
		</table>
		<table>
			<tr>
				<th width="15%">Årsavgift inkludert?</th>
				<th width="15%">Servicehefte foreligger?</th>
				<th width="15%">Selges fri for heftelser?</th>
				<th width="55%">
				</th>
			</tr>
			<tbody>
				<tr>
					<td width="15%">
						<div class="radio-left">
							@if($saleDetail->arsavgift=='yes')
							<input type="radio" name="arsavgift" checked value="yes">Ja
							<input type="radio" name="arsavgift" value="no">Nei
							@else
							<input type="radio" name="arsavgift" value="yes">Ja
							<input type="radio" name="arsavgift" checked value="no">Nei
							@endif
						</div>			
					</td>					
					<td width="15%">
						<div class="radio-left">
							@if($saleDetail->servicehefte=='yes')
							<input type="radio" name="servicehefte" checked>Ja
							<input type="radio" name="servicehefte">Nei
							@else

							<input type="radio" name="servicehefte">Ja
							<input type="radio" name="servicehefte"checked>Nei							
							@endif
						</div>	
					</td>					
					<td width="15%">
						<div class="radio-left">
							@if($saleDetail->selges=='yes')
							<input type="radio" name="selges" checked>Ja
							<input type="radio" name="selges">Nei
							@else

							<input type="radio" name="selges">Ja
							<input type="radio" name="selges"checked>Nei							
							@endif							

						</div>	
					</td>					
					<td width="55%">
						<ol>
							<li>Årsmodell kan avvike da rutinene for modellbenevnelse hos  de forskjellige produsentene varierer, også  internt.
							</li>
							<li>Førstegangs registrering av kjøretøyet - ikke nødvendigvis i norge</li>
						</ol>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>	
	<!--kjoretoy end-->
	<!--INNBYTTEKJØRETØY start-->
	<div class="row">
		<h3>INNBYTTEKJØRETØY</h3>
		<table>
			<tr>
				<th width="25%">Fabrikat</th>
				<th width="25%">Årsmodell</th>
				<th width="25%">Modell</th>
				<th width="25%">Variant</th>
			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->brand}}
					</td>					
					<td>
						{{$saleDetail->modelYear}}
					</td>					
					<td>
						{{$saleDetail->model}}
					</td>					
					<td>
						{{$saleDetail->variant}}
					</td>
				</tr>
			</tbody>
		</table>		

		<table>
			<tr>
				<th width="25%">Kilometerstand </th>
				<th width="25%">Registreringsdato</th>
				<th width="25%">Registreringsnummer</th>
				<th width="25%">Understellsnummer</th>
			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->miles}}
					</td>					
					<td>
						{{$saleDetail->registrationDate}}
					</td>					
					<td>
						{{$saleDetail->registration}}
					</td>					
					<td>
						{{$saleDetail->vin}}
					</td>
				</tr>
			</tbody>
		</table>

		<table>
			<tr>
				<th width="20%">Feil med motor?</th>
				<th width="20%">Feil med bremser?</th>
				<th width="20%">Feil med girkasse / clutch?</th>
				<th width="20%">Rustskader?</th>
				<th width="20%">Stilles fri for heftelser?</th>
			</tr>
			<tbody>
				<tr>
					<td>
						<div class="radio-left">
							@if($saleDetail->motor=='yes')
							<input type="radio" name="motor" checked>Ja
							<input type="radio" name="motor">Nei
							@else
							<input type="radio" name="motor">Ja
							<input type="radio" name="motor" checked>Nei							
							@endif
						</div>			
					</td>					
					<td>
						<div class="radio-left">
							@if($saleDetail->bremser=='yes')
							<input type="radio" name="bremser" checked value="yes">Ja
							<input type="radio" name="bremser" value="no">Nei
							@else
							<input type="radio" name="bremser"  value="yes">Ja
							<input type="radio" name="bremser" checked value="no">Nei							
							@endif							

						</div>			
					</td>					
					<td>
						<div class="radio-left">
							@if($saleDetail->girkasse=='yes')
							<input type="radio" name="girkasse" checked value="yes">Ja
							<input type="radio" name="girkasse" value="no">Nei
							@else
							<input type="radio" name="girkasse"  value="yes">Ja
							<input type="radio" name="girkasse" checked value="no">Nei							
							@endif							

						</div>	
					</td>					
					<td>
						<div class="radio-left">
							@if($saleDetail->rustskader=='yes')
							<input type="radio" name="rustskader" checked value="yes">Ja
							<input type="radio" name="rustskader" value="no">Nei
							@else
							<input type="radio" name="rustskader"  value="yes">Ja
							<input type="radio" name="rustskader" checked value="no">Nei							
							@endif							

						</div>	
					</td>					
					<td>
						<div class="radio-left">
							@if($saleDetail->stilles=='yes')
							<input type="radio" name="stilles" checked value="yes">Ja
							<input type="radio" name="stilles" value="no">Nei
							@else
							<input type="radio" name="stilles"  value="yes">Ja
							<input type="radio" name="stilles" checked value="no">Nei							
							@endif							

						</div>	
					</td>
				</tr>
			</tbody>
		</table>	
	</div>		
	<!--INNBYTTEKJØRETØY end-->	
	<!--betailingsbetingsler start-->
	<div class="row">
		<h3>BETALINGSBETINGELSER</h3>
		<table>
			<tr>
				<th width="25%">Salgssum kjøretøy </th>
				<th width="25%">Omregistreringsavgift</th>
				<th width="25%">Årsavgift</th>
				<th width="25%">KJØPESUM</th>
			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->salgssum}}
					</td>					
					<td>
						{{$saleDetail->omregistreringsavgift}}
					</td>					
					<td>
						{{$saleDetail->arsavgift}}
					</td>					
					<td>
						{{$saleDetail->kjopesum}}
					</td>
				</tr>
			</tbody>
		</table>	
			
	</div>	
	<!--betailingsbetingsler end-->		
	<!--betailing start-->
	<div class="row">
		<h3>BETALING</h3>
		<table>
			<tr>
				<th width="25%">Kjøpesum</th>
				<th width="25%">Fratrekk innskudd</th>
				<th width="25%">Fratrekk innbytte</th>
				<th width="25%">SUM TIL BETALING</th>
			</tr>
			<tbody>
				<tr>
					<td>
						{{$saleDetail->kjopesum}}
					</td>					
					<td>
						{{$saleDetail->innskudd}}
					</td>					
					<td>
						{{$saleDetail->innbytte}}
					</td>					
					<td>
						${{$saleDetail->SUM}}
					</td>
				</tr>
			</tbody>
		</table>	
			
	</div>		
	<!--betailing end-->	
	<!--bottom-->
	<!--juridisk sign start-->
	<div class="row">
		<h3>JURIDISK OG SIGNATURER</h3>
		<p>
			Kjøper attesterer med sin signatur at han/hun er kjent med gjeldende lover og forskrifter, og at overstående informasjon medfører riktighet og er sannferdig ved kontraktens underskrift. Likeledes at kjøper har besiktiget og prøvekjørt kjøretøyet, og har utført sin undersøkelsesplikt til det fulle, samt at alle salgsvilkår (side 2) er grundig lest, forstått og akseptert uten innsigelser eller forbehold. Forbrukerkjøp er regulert etter Lov om forbrukerkjøp (fkjl.) med tillegg av våre salgsvilkår der dette kommer til anvendelse. Etter Lov om forbrukerkjøp har TJ Auto rett til å utføre avhjelp ved  en eventuell reklamasjon. TJ Auto må således alltid kontaktes så snart det foreligger en reklamasjon, før utbedring igangsettes. Kjøper med innbyttekjøretøy er økonomisk ansvarlig for eventuelle rettslige mangler ved kjøretøyet som skulle vise seg i ettertid.
		</p>
	</div>
	<div class="row">
		<table>
			<tr width="100%">
				<th>Sted  og dato</th>
			</tr>
			<tbody>
				<tr>
					<td>{{$saleDetail->sted}}</td>
				</tr>
			</tbody>
		</table>
		
		
	</div>	
	<div class="row">
		<table>
			<tr>
				<th width="50%">Underskrift kjøper</th>
				<th width="50%">Underskrift selger</th>
			</tr>
			<tbody>
				<tr>
					<td>{{$saleDetail->kjøper}}</td>
					<td>{{$saleDetail->selger}}</td>
				</tr>
			</tbody>
		</table>

	</div>
	<!--juridisk sign end-->
	<div class="row" style="height: 60px;padding:0px">
		<ul class="footer-menu">
			
				<li><a><b>POST</b> Postboks  94, 2717 Grua</a></li>
				<li><a><b>BESØK</b> Hadelandsvegen 2113, 2740 Roa</a></li>
		 		<li><a><b>TELEFON</b> 920  28 935</a></li>
				<li><a><b>E-POST</b> post@tjauto.no</a></li>
		 		<li><a><b>NETT</b> www.tjauto.no</a></li>				
						
		</ul>

	</div>		
	<!--bottom end-->	
</div>
</body>
</html>
