<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
	<style type="text/css">
		body {
			background: #fff;
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
		}
		thead{
			background-color: #716666;
			color: #fff;
			text-align: center;
		}
		.container {
			width: 80%;
			margin:auto;
			background-color:#e3e3e3;
			padding-bottom:20px;
		}
		.row {
			overflow: hidden;
			width: 90%;
			margin: auto;
			padding: 20px 0px 20px 0px;
		}
		header {
			background-color: #484848;
			color: #fff;
			width: 100%;
			height: 100px;
		}
		.nav {
			padding:0px 40px 10px 40px;
		}
		.header-left{
			float: left;
			width: 40%;
			text-align:left;
			line-height: 10px;
		}
		.header-right{
			float: right;
			width: 40%;
			text-align:right;
			line-height: 5px;
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
			width: 50%;
			text-align: left;
		}		
		.contract-id {
			float: right;
			width: 30%;
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
		button {
			width:200px; 
			background:orange;
			color:white;
			padding:5px;
			cursor: pointer;
			font-weight: bold;
		}
		.footer-menu {
			width: 100%;
			font-size: 12px;
			color: #5e5a5a;
		}
		.footer-menu  li {
			list-style: none;
			float: left;
			padding-right:10px;
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
<body>
<div class="container">
	<form action="{{route('submitContract')}}" method="post">
		@csrf
		<input type="hidden" name="saleId" value="{{$saleDetail->saleId}}">
	<header>
		<div class="nav">
			<div class="header-left">
				<h3 class="title">Kontrakt</h3>
				<p>Kontrakt for kj??p av kj??ret??y - bil, motorsykkel, atv, b??t</p>
			</div>
			<div class="header-right">
				<h3 class="logo">TJ AUTO</h3>
				<p>ORG.NR 975782336MVA   KONTO 1201.69.26653</p>
			</div>			
		</div>
	</header>

	<div class="row">
		<div class="warn">
			<img src="" alt="image">
			<span class="wanr-text">
			Kontrakten m??  fylles ut s?? n??yaktig og utfyllende som mulig. Den som bevisst gir uriktig eller ufullstendige opplysninger i kontrakten kan holdes erstatnings- og straffeansvarlig			
			</span>
		</div>	
		<div class="contract-id">
			<div class="panel">
				<div class="panel-head">
					Kontrakt ID
				</div>
				<div class="panel-body">
					<input type="" name="kontraktId" value="{{$saleDetail->kontraktId}}">
				</div>				
			</div>	

		</div>	
	</div>

	<div class="row">
		<h3>KJ??PER</h3>
		<table>
			<thead>
				<th>Navn/Firmanavn</th>
				<th>F??dselsnummer/Organisasjonsnummer</th>
				<th>Fullmaktshaver</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="" value="{{$saleDetail->name}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->idNumber}}">
					</td>					
					<td>
						<input type="" name="Fullmaktshaver" value="{{$saleDetail->Fullmaktshaver}}">
					</td>
				</tr>
			</tbody>
		</table>		

		<table>
			<thead>
				<th>Gateadresse/Postboks</th>
				<th>Postnummer/-sted</th>
				<th>Telefon</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="" value="{{$saleDetail->address}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->zip}} {{$saleDetail->city}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->phone}}">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!--kjoper end-->

	<!--kjoretoy-->
	<div class="row">
		<h3>KJ??RET??Y</h3>
		<table>
			<thead>
				<th>Fabrikat</th>
				<th>??rsmodell</th>
				<th>Modell</th>
				<th>Variant</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="" value="{{$saleDetail->brand}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->modelYear}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->model}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->variant}}">
					</td>
				</tr>
			</tbody>
		</table>		

		<table>
			<thead>
				<th>Kilometerstand</th>
				<th>Registreringsdato</th>
				<th>Registreringsnummer</th>
				<th>Understellsnummer</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="" value="{{$saleDetail->miles}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->registrationDate}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->registration}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->vin}}">
					</td>
				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<th>Medf??lgende utstyr</th>
				<th>S??rskilte vilk??r</th>

			</thead>
			<tbody>
				<tr>
					<td>
						<textarea rows="10" name="medf??lgende"></textarea>
					</td>					
					<td>
						<textarea rows="10" name="s??rskilte"></textarea>
					</td>					

				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<th>??rsavgift inkludert?</th>
				<th>Servicehefte foreligger?</th>
				<th>Selges fri for heftelser?</th>
				<th>
				</th>
			</thead>
			<tbody>
				<tr>
					<td width="15%">
						<div class="radio-left">
							<input type="radio" name="arsavgift" value="yes">Ja
							<input type="radio" name="arsavgift" value="no">Nei
						</div>			
					</td>					
					<td width="15%">
						<div class="radio-left">
							<input type="radio" name="servicehefte" value="yes">Ja
							<input type="radio" name="servicehefte" value="no">Nei
						</div>	
					</td>					
					<td width="15%">
						<div class="radio-left">
							<input type="radio" name="selges" value="yes">Ja
							<input type="radio" name="selges" value="no">Nei
						</div>	
					</td>					
					<td>
						<ol>
							<li>??rsmodell kan avvike da rutinene for modellbenevnelse hos  de forskjellige produsentene varierer, ogs??  internt.
							</li>
							<li>F??rstegangs registrering av kj??ret??yet - ikke n??dvendigvis i norge</li>
						</ol>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>	
	<!--kjoretoy end-->

	<!--joretoy start-->
	<div class="row">
		<h3>INNBYTTEKJ??RET??Y</h3>
		<table>
			<thead>
				<th>Fabrikat</th>
				<th>??rsmodell</th>
				<th>Modell</th>
				<th>Variant</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="" value="{{$saleDetail->brand}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->modelYear}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->model}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->variant}}">
					</td>
				</tr>
			</tbody>
		</table>		

		<table>
			<thead>
				<th>Kilometerstand </th>
				<th>Registreringsdato</th>
				<th>Registreringsnummer</th>
				<th>Understellsnummer</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="" value="{{$saleDetail->miles}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->registrationDate}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->registration}}">
					</td>					
					<td>
						<input type="" value="{{$saleDetail->vin}}">
					</td>
				</tr>
			</tbody>
		</table>

		<table>
			<thead>
				<th>Feil med motor?</th>
				<th>Feil med bremser?</th>
				<th>Feil med girkasse / clutch?</th>
				<th>Rustskader?</th>
				<th>Stilles fri for heftelser?</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<div class="radio-left">
							<input type="radio" name="motor" value="yes">Ja
							<input type="radio" name="motor" value="no">Nei
						</div>			
					</td>					
					<td>
						<div class="radio-left">
							<input type="radio" name="bremser" value="yes">Ja
							<input type="radio" name="bremser" value="no">Nei
						</div>			
					</td>					
					<td>
						<div class="radio-left">
							<input type="radio" name="girkasse" value="yes">Ja
							<input type="radio" name="girkasse" value="no">Nei
						</div>	
					</td>					
					<td>
						<div class="radio-left">
							<input type="radio" name="rustskader" value="yes">Ja
							<input type="radio" name="rustskader" value="no">Nei
						</div>	
					</td>					
					<td>
						<div class="radio-left">
							<input type="radio" name="stilles" value="yes">Ja 
							<input type="radio" name="stilles" value="no">Nei
						</div>	
					</td>
				</tr>
			</tbody>
		</table>	
	</div>		
	<!--joretoy end-->

	<!--betailingsbetingsler start-->
	<div class="row">
		<h3>BETALINGSBETINGELSER</h3>
		<table>
			<thead>
				<th>Salgssum kj??ret??y </th>
				<th>Omregistreringsavgift</th>
				<th>??rsavgift</th>
				<th>KJ??PESUM</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="" name="salgssum">
					</td>					
					<td>
						<input type="" name="omregistreringsavgift">
					</td>					
					<td>
						<input type="" name="arsavgiftText">
					</td>					
					<td>
						<input type="" name="kjopesum">
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
			<thead>
				<th>Kj??pesum</th>
				<th>Fratrekk innskudd</th>
				<th>Fratrekk innbytte</th>
				<th>SUM TIL BETALING</th>
			</thead>
			<tbody>
				<tr>
					<td>
						<input type="" name="kjopesum">
					</td>					
					<td>
						<input type="" name="innskudd">
					</td>					
					<td>
						<input type="" name="innbytte">
					</td>					
					<td>
						<input type="" name="SUM">
					</td>
				</tr>
			</tbody>
		</table>	
			
	</div>		
	<!--betailing end-->
	<!--juridisk sign start-->
	<div class="row">
		<h3>JURIDISK OG SIGNATURER</h3>
		<p>
			Kj??per attesterer med sin signatur at han/hun er kjent med gjeldende lover og forskrifter, og at overst??ende informasjon medf??rer riktighet og er sannferdig ved kontraktens underskrift. Likeledes at kj??per har besiktiget og pr??vekj??rt kj??ret??yet, og har utf??rt sin unders??kelsesplikt til det fulle, samt at alle salgsvilk??r (side 2) er grundig lest, forst??tt og akseptert uten innsigelser eller forbehold. Forbrukerkj??p er regulert etter Lov om forbrukerkj??p (fkjl.) med tillegg av v??re salgsvilk??r der dette kommer til anvendelse. Etter Lov om forbrukerkj??p har TJ Auto rett til ?? utf??re avhjelp ved  en eventuell reklamasjon. TJ Auto m?? s??ledes alltid kontaktes s?? snart det foreligger en reklamasjon, f??r utbedring igangsettes. Kj??per med innbyttekj??ret??y er ??konomisk ansvarlig for eventuelle rettslige mangler ved kj??ret??yet som skulle vise seg i ettertid.
		</p>
	</div>
	<div class="row">
		Sted  og dato
		<input type="date" name="sted" placeholder="">
	</div>	
	<div class="row">
		<div class="sign-one">
			Underskrift kj??per
			<input type="" name="kj??per" placeholder="">
		</div>

		<div class="sign-two">
			Underskrift selger
			<input type="" name="selger" placeholder="">
		</div>
	</div>
	<!--juridisk sign end-->
	<div class="row">
		<ul class="footer-menu">
			<center>
				<li><a><b>POST</b> Postboks  94, 2717 Grua</a></li>
				<li><a><b>BES??K</b> Hadelandsvegen 2113, 2740 Roa</a></li>
		 		<li><a><b>TELEFON</b> 920  28 935</a></li>
				<li><a><b>E-POST</b> post@tjauto.no</a></li>
		 		<li><a><b>NETT</b> www.tjauto.no</a></li>				
			</center>					
		</ul>

	</div>
	<div class="submit">
		<center>
			<button>Export Contract</button>
		</center>
	</div>
	</form>
</div>
</body>
</html>
