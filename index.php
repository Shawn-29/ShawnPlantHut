<?php
    require_once('errorHandler.php');
    require_once('database.php');
    require_once('view/header.php');
    
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    
    if ($action === NULL) {
	require_once('view/homePage.php');
	require_once('view/footer.php');
	exit;
    }
    
    switch ($action) {
	case 'plantList':
	    
	    $sql = 'SELECT name, growth_type, light_requirement, 
		difficulty, mature_size_description, filename 
		FROM plants INNER JOIN images
		USING(plant_id)
		WHERE filename LIKE "%2%"
		ORDER BY name ASC';
	    
	    $query = MyPDO::instance()->run($sql);
	    
	    $plants = $query->fetchAll();
	    
	    require_once('view/plantList.php');
	    
	    break;
	case 'article':
	    
	    $species = strtolower(filter_input(INPUT_GET, 'species', FILTER_SANITIZE_STRING));
	    
	    $sql = 'SELECT plant_id, name, growth_type, light_requirement,
		    difficulty, mature_size_description, description,
		    growing_advice
		    FROM plants
		    WHERE name = :species
		    LIMIT 1';
	    
	    $plantData = MyPDO::instance()->run($sql, [':species' => $species])->fetch();
	    
	    if ($plantData === FALSE) {
		require_once('view/notFound.php');
		exit;
	    }
	    
	    $plantID = $plantData['plant_id'];
	    
	    $description = str_replace(['[p]', '[/p]'], ['<p class="descriptions">', '</p>'],
		    $plantData['description']);
	    
	    $growingAdvice = str_replace(['[p]', '[/p]'], ['<p class="descriptions">', '</p>'],
		    $plantData['growing_advice']);
	    
	    # get the plant's images
	    $GALLERY_PHOTO_COUNT = 4;
	    
	    $sql = 'SELECT filename
		    FROM images
		    WHERE plant_id = :plantID
		    LIMIT ' . $GALLERY_PHOTO_COUNT;
	    
	    $images = MyPDO::instance()->run($sql,
		    ['plantID' => $plantID])->fetchAll(PDO::FETCH_COLUMN);
	    
	    # get the countries where the plant can be found
	    $sql = 'SELECT country_name
		    FROM countries
		    WHERE country_id IN (
			SELECT country_id
			FROM origins
			WHERE plant_id = :plantID
		    )';
	    
	    $originData = MyPDO::instance()->run($sql,
		    ['plantID' => $plantID])->fetchAll(PDO::FETCH_COLUMN);
	    
	    $countries = implode(', ', $originData);
	    
	    # format each letter in the plant's name to make it tall
	    $nameParts = explode(' ', $plantData['name']);
	    
	    foreach ($nameParts as &$part) {
		$part = "<span class='tall-char'>${part[0]}</span>" .
			substr($part, 1);
	    }
	    
	    $formattedName = implode(' ', $nameParts);
	    
	    require_once('view/article.php');
	    
	    break;
	case 'form':
	    require_once('view/form.php');
	    break;
	case 'growingGuide':
	    require_once('view/growingGuide.php');
	    break;
	case 'index':
	    require_once('view/homePage.php');
	    break;
	default:
	    require_once('view/notFound.php');
	    exit;
    }
    
    require_once('view/footer.php');
?>