<?php require_once('header.php'); ?>
<header class="main-header">
    <!-- <h1><span class="tall-char">P</span>hilodendron <span class="tall-char">D</span>avidsonii</h1> -->
    <h1><?php echo($formattedName); ?></h1>
</header>
<section class="container">
    <div class="row no-gutters">
        <div id="contentImages" class="col-md-6 col-sm-12">
            <figure id="photo-gallery">
                <button type="button" id="smallPhoto2" class="thumbnail">
                    <img src="images/<?php echo($images[1]); ?>" alt="" />
                </button>
                <button type="button" id="smallPhoto3" class="thumbnail">
                    <img src="images/<?php echo($images[2]); ?>" alt="" />
                </button>
                <button type="button" id="smallPhoto4" class="thumbnail">
                    <img src="images/<?php echo($images[3]); ?>" alt="" />
                </button>
                <button type="button" id="smallPhoto1" class="thumbnail">
                    <img src="images/<?php echo($images[0]); ?>" alt="" />
                </button>			
                <img id="largePhoto1" class="large-photo" src="images/<?php echo($images[0]); ?>" alt="Photograph of <?php echo($plantData['name']); ?>" />
                <img id="largePhoto2" class="large-photo" src="images/<?php echo($images[1]); ?>" alt="Photograph of <?php echo($plantData['name']); ?>" />
                <img id="largePhoto3" class="large-photo" src="images/<?php echo($images[2]); ?>" alt="Photograph of <?php echo($plantData['name']); ?>" />
                <img id="largePhoto4" class="large-photo" src="images/<?php echo($images[3]); ?>" alt="Photograph of <?php echo($plantData['name']); ?>" />
            </figure>
        </div>			
        <div class="col-md-6 col-sm-12">
            <div class="traits">
                <h3>Origin:</h3>
                <p><?php echo($countries); ?></p>
            </div>
            <div class="traits">
                <h3>Growth Type:</h3>
                <p><?php echo($plantData['growth_type']); ?></p>
            </div>
            <div class="traits">
                <h3>Light Requirement:</h3>
                <p><?php echo($plantData['light_requirement']); ?></p>
            </div>
            <div class="traits">
                <h3>Difficulty:</h3>
                <p><?php echo($plantData['difficulty']); ?></p>
            </div>
            <div class="traits">
                <h3>Mature Leaf Size:</h3>
                <p><?php echo($plantData['mature_size_description']); ?></p>
            </div>
            <div class="traits">
                <h3>Description:</h3>
                <?php echo($description); ?>
            </div>
            <div class="traits">
                <h3>Growing Advice:</h3>
                <?php echo($growingAdvice); ?>
            </div>		
        </div>
    </div>			
</section>
<?php require_once('footer.php'); ?>