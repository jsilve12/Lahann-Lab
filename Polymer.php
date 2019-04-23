<!DOCTYPE html>
<html lang="en">
	<?php
		include("head.html");
	?>


	<body>

		<div class="site-content">
			<?php
				include("generic/header.html");
			?>

			<div class="page-head" data-bg-image="images/page-head-2.jpg">
				<div class="container">
					<h2 class="page-title">Services</h2>
					<small>Research in the Lahann Lab focuses on surface engineering, advanced polymers, biomimetic, materials, engineered microenvironments, and nano-scale self-assembly.</small>
				</div>
			</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="">
							<h3 class = "research-title">Polymer Brushes for Biomedical Applications</h3>
							<h4>Introduction:</h4>
							<p class = "research-description">Human	pluripotent	stem	cells	(hPSCs)	have	a	host	of	applications	in	tissue	engineering	and	regenerative	medicine.	In spite	of	the	large	therapeutic	impact	of	stem	cells,	their	use	is hindered	in	part	by	the	inability	to	maintain	cells	in	long-term	culture	in	synthetic	environments.	Currently,	long-term	hPSC	culture	requires	an	abundance	of	undefined	factors including natural- and	animal-derived	products.	The	inclusion	of	such	products	results	in	immunogenicity	concerns	and inhibits	clinical	adoption.</p>
							<h4>Technology:</h4>
							<p>We	recently	identified	a	synthetic	polymer,	poly[2- (methacryloyloxy)ethyl	dimethyl-(3-sulfopropyl)ammonium	hydroxide]	(PMEDSAH), capable	of	sustaining	long-term	human embryonic	stem	cell	(hESC)	culture.	This	zwitterionic	hydrogel	is	created	via	surface-initiated	graft	polymerization.	Specifically,	free	radicals	are	created	on	tissue	culture polystyrene	(TCPS)	dishes	by	UV	ozone	plasma	treatment.	The	dishes	are	placed	in	an oxygen	free	reaction	vessel	along	with	the	MEDSAH	monomer	and	solvent	and	the polymerization	reaction	proceeds	for	2.5	hours	at	~76-82°C	(Figure	1).	hESCs	were	grown for	longterm passage	(passage#	≥20)	in	both	defined	media	and	media	void	of	animal products.
</p>
							<img src="images/Polymer.jpg" class = "research-image">
							<div class = "research-image-text">
								<h4>Advantages over Naturally-Derived Matrices:</h4>
								<ol>
									<li>No batch to batch variation</li>
									<li>No immunogenic concerns</li>
									<li>Compatible with multiple cell lines/types</li>
									<li>Compatible with common sterilization techniques Applications</li>
									<li>Tissue engineering/regenerative medicine</li>
									<li>Mechanistic cell or biomaterial studies</li>
								</ol>
								<br>
							</div>
							<h4>Selected Publications:</h4>
							<?php
								Publications(1, $pdo);
							?>
							<h4>Selected Patents:</h4>
							<ul class="research-patents">
								<li>H. Nandivada, T. Eyster, L. Villa, G.D. Smith, J. Lahann. "Hydrogel Coatings for Cell Culture", US patent, US 12/530,126 (Pending), US 12/843,468 (Pending), 2011 </li>
								<li>GD.	Smith,	J.	Lahann,	H.	Nandivada,	T.Eyster,	LG.	VillaDiaz, Methods	and	Compositions	for	Growth	of	Cells	and	Embryonic	Tissue	on	a	Synthetic	Polymer	Matrix, US2011/0033928	A1.</li>
								<li>GD.	Smith,	J.	Lahann,	J.	Ding,	H.	Nandivada,	Methods	and	Compositions	for	Growth	of	Embryonic	Stem	Cells,	US	2010/0068810	A1.</li>
							</ul>
						</div>
					</div>
				</div>


				<div class="fullwidth-block" data-bg-color="#edf2f4">
					<div class="container">
						<div class="subscribe-form">
							<h2>Join our newsletter</h2>
							<form action="#">
								<input type="text" placeholder="Enter your email">
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>

			</main> <!-- .main-content -->

			<?php
				include("generic/footer.html");
			?>
		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>
