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
							<h3 class = "research-title">Vapor-Based Reactive Polymeric Coatings</h3>
							<h4>Introduction:</h4>
							<p class = "research-description">Surface modification of complex substrates has emerged as a key challenge in many applications. In this respect, vaporbased polymer coatings have garnered a lot attention as compared to wet-chemical approaches and are applicable to a diverse range of polymerizations. However, these coatings have been hampered by the lack of anchor groups and reactive functionalities for further surface modification.</p>
							<h4>Technology:</h4>
							<p>We	have	developed	a	novel	vapor-based	surface	modification	technique	using	chemical vapor	deposition	polymerization.	This	deposition	process	creates	a	layer	of	ultra-thin reactive polymeric	film	onto	the	substrates	surfaces.	The	reacting	coatings	are	made	of	poly-p-xyxlene	containing	functional	anchor	moieties.	The	deposition	process	does	not	require the	use	of any	solvents/initiators,	making	it	a	bio-compatible	process	for	various biomedical	applications.	The	coating	typically	has	a	thickness	in	the	nm	to	μm	range	and can	be	applied	to	any surfaces	and	to	complex	3-dimensional	geometries.	Our	custom-built CVD	system	has	also	enabled	us	to	create	polymer	coatings	which	present	multiple functional	groups	simultaneously, as	well	as	polymer	gradients.	We	have	further demonstrated	the	applicability	of	these	coatings	towards	biomimetic	and	spatially-directed	surface	engineering.</p>
							<img src="images/Vapor.jpg" class = "research-image">
							<div class = "research-image-text">
								<h4>Advantages:</h4>
								<ol>
									<li>Solvent-free</li>
									<li>Room-temperature process</li>
									<li>Good adhesion on a wide range of substrates</li>
									<li>Yields pinhole-free conformal coatings</li>
									<li>Provides Chemically reactive functional groups</li>
									<li>Applicable to 3-D and complex geometries</li>
								</ol>
								<br>
								<h4>Applications:</h4>
								<ol>
									<li>Covalent immobilization of ligands</li>
									<li>Click chemistry</li>
									<li>Nanoimprint lithography</li>
									<li>Surfaces with chemical gradients</li>
									<li>Dry-adhesion bonding</li>
									<li>Biomedical	device	coatings	(stents,	grafts,	scaffolds)</li>
									<li>Microfluidic device coating</li>
									<li>Impantable Electronic device coatings</li>
									<li>Cell culture substrates</li>
									<li>Non-fouling surfaces</li>
									<li>Nano-composites</li>
									<li>Initiator coatings for ATRP, etc.</li>
								</ol>
							</div>
							<h4>Selected Publications:</h4>
							<?php
								Publications(1, $pdo);
							?>
							<h4>Selected Patents:</h4>
							<ul class="research-patents">
								<li>Y. Elkasabi, J. Lahann. "CVD Coating with Reactive Composition Gradients", 3783 (Pending)</li>
								<li>H.Y. Chen, H. Nandivada, J. Lahann. "Reactive Coating for Regioselective Surface Modification", US 11/691,210 (Pending).</li>
								<li>Y. Elkasabi, J. Lahann. "Multifunctional CVD Coatings", US 12/054,171 (Pending), 2008.</li>
								<li>H.Y. Chen, J. Lahann. "Dry Adhesive Bonding by CVD Coatings", US 11/756,890 (Pending), 2007.</li>
								<li>J. Lahann, K.F. Jensen, R. Langer. "Reactive Polymer Coatings", US Patent, 2001.</li>
							</ul>
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
