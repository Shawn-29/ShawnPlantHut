<?php require_once('header.php'); ?>
<header class="main-header">
    <h1>
        <span class="tall-char">P</span>lant <span class="tall-char">L</span>ist
    </h1>
    <p class="header-desc">
        This table lists all of the species featured on this web site. Click on a species' name to go to an individiual page describing it.
    </p>
</header>
<div class="table-responsive">
    <table class="plant-table table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Growth Type</th>
                <th>Light Requirement</th>
                <th>Difficulty</th>
                <th>Mature Leaf Size</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plants as $p): ?>
                <?php $link = "?action=article&species={$p['name']}"; ?>
                <tr>
                    <td><a href="<?php echo($link); ?>" title="Go to <?php echo($p['name']); ?>"><img src="images/<?php echo($p['filename']); ?>" alt="" /></a></td>
                    <td><a href="<?php echo($link); ?>"><?php echo($p['name']); ?></a></td>
                    <td><?php echo($p['growth_type']); ?></td>
                    <td><?php echo($p['light_requirement']); ?></td>
                    <td><?php echo($p['difficulty']); ?></td>
                    <td><?php echo($p['mature_size_description']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require_once('footer.php'); ?>