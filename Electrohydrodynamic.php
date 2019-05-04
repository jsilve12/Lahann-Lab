<!DOCTYPE html>
<html lang="en">
	<?php
		include("head.html");
	?>


	<body>

		<div class="site-content">
			<?php
				include("generic/header.html");
				include("functions.php");
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
							<h3 class = "research-title">Electrohydrodynamic Co-Jetting of Particles and Fibers</h3>
							<h4>Introduction:</h4>
							<p class = "research-description">Electrohydrodynamic (EHD) co-jetting is a process developed in the Lahann lab for creating anisotropic microto nanometer-sized particles and fibers for use in the next generation of ‘smart’ devices. While standard technologies focus mainly on manipulating particle size and shape, EHD co-jetting explores the newest frontier of particle technologies by not only allowing control over particle size and shape, but also over the distribution of matter within the particles it generates. This enables desired chemical and physical properties to be compartmentalized in a single designer particle. Introducing multiple compartments with different chemical functionalities on a single particle can be employed to maximize particle function, utility, and efficacy.</p>
							<h4>Technology:</h4>
							<p>In short, EHD co-jetting is an economical, scalable, and robust technique for producing polymeric particles or fibers with various compartments. This is achieved by pumping two polymer solutions through parallel capillaries at a laminar flow rate. Upon application of a large electric field, the fluid expelled from the capillaries gets stretched and thinned as it accelerates towards a grounded electrode. During this stretching process, the solvents readily evaporate out of the polymer solution leaving only micro-to-nanometer scale Janus particles on the grounded electrode. Due to the laminar flow rate of the solutions, three, four, or even more distinct compartments can be obtained by using the corresponding number of capillaries running in parallel. By controlling various parameters such as applied electric field, polymer concentration, flow rates, viscosity, and conductivity, a large variety of particle shapes, sizes and surface features can be achieved. At the proper polymer concentrations and viscosities, continuous jets of anisotropic polymer fibers can also be attained, opening a whole new range of potential applications for EHD co-jetting.</p>
							<img src="images/Jetting1.jpg" class = "research-image">
							<div class = "research-image-text">
								<h4>Advantages:</h4>
								<ol>
									<li>Simple instrumentation at low cost</li>
									<li>Adaptable to a wide range of material</li>
									<li>Flexibility in particle shapes and morphologies</li>
									<li>Controllable Particle size over several orders of magnitude</li>
									<li>Scalable</li>
								</ol>
								<br>
							</div>
							<h4>Applications:</h4>
							<p>There is a wide range of applications for particles and fibers generated using EHD co-jetting. Particles (A) and fibers (B) equipped with multiple compartments with independent surface and bulk chemistries could be implemented in such fields as drug delivery and theranostics, tissue engineering, stimuli responsive materials, multiplexed bioassays, smart displays, and colorants. Select examples of such technologies are given below. Spatially controlled cell adhesion, where cells can be selectively adhered to only one compartment of a fiber, has been demonstrated on fibers fabricated using EHD co-jetting. Such a technology may have major implications in the field of tissue engineering and 3D cell culture. Novel shape-shifting particles capable of responding to physiological cues have been developed as delivery vehicles for genetic material. Additionally, other bioactive molecules, multiple therapeutics, and imaging agents can be incorporated into the particles. This enables multiple release kinetics from the same particle, as well as the ability to image the particles within cells and animals. Multicompartmental microcylinders with appropriately designed compartments can undergo defined shape reconfiguration, such as shape-shifting (A and B), bending (C and D), or toggling (D). An interesting aspect of these multicompartmental microcylinders is that compartments can be made of different polymers, which selectively respond to a specific stimulus. If multicompartmental microcylinders are exposed to ultrasound as the external stimulus, irreversible one-way shape-shifting can lead to reconfiguration into near perfect spheres (A). Two-way, reversible shape transitions require multicompartmental microcylinders that are comprised of stimulus-responsive as well as inert compartments (C). If the compartments of the microcylinders are, however, composed of a hydrogel and an organogel, the individual compartments display different swelling responses. This can give rise to fully reversible three-way shape-toggling with well-defined convex-to-concave transitions (D). The controlled reconfiguration of multicompartmental microcylinders constitutes important steps towards the biomimetic development of adaptive materials with potential applications as sensors, actuators, or switchable drug delivery carriers.</p>
							<h4>Selected Publications:</h4>
							<?php
								Publications(1, $pdo);
							?>
							<h4>Selected Patents:</h4>
							<ul class="research-patents">
								<li>J.	Lahann.	"Red	Blood	Cell-Mimetic	Particles",	US	pat,	2010.</li>
								<li>S.	Bhaskar,	S.	Mandal,	J.	Lahann.	"Multicompartmental	Microfiber	Scaffolds	with	Spatially	Guided	Cell	Growth",	2010.</li>
								<li>A.	Kazemi,	J.	Lahann.	"Multi-Phasic	Capsules",	US	12/506,712.</li>
								<li>S.	Bhaskar,	J.	Lahann.	"Biphasic	Biodegradable	Microparticles	with	Controlled	Shapes",	US	12/257,945.</li>
								<li>Kazemi,	J.	Lahann.	"Multi-Phasic	Bioadhesive	NanoObjects as	Biofunctional	Elements	in	Drug	Delivery	Systems",	US	11/763,842,	2010.</li>
								<li>K.H.	Roh,	J.	Lahann.	"Multi-Phasic	Colorants	as	Functional	Elements	in	Paints,	Coatings,	Plastics	or	Displays",	US	12/137,121.</li>
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
