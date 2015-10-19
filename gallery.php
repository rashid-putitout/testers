<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <title> Gallery Test</title>
        <style>
            .gallery-item{
                float: left;
                padding: 1px;
                /*width: 100px;*/
                max-width: 250px;
                height: 100px;
                overflow: hidden;
            }
        </style>
    </head>
    <body style="background: url(images/background.jpg);
    background-size: cover;
    background-attachment: fixed;" >
        <?php 
        $imagesSet = array(
            '100x100','200x100','250x100','150x100','300x100','250x100'
        ); 
        
        $imagesAltSet = array(
            'Good','Bad','First Image here','Great Scenary','Amazing stuff!!!','Lucky guy'
        );
        ?>
        
        <div class="container-fluid">
            <div class="row">
            <?php for($i=1; $i < 50; $i++){ ?>
                <div class="gallery-item">
                    <a href="#" class="">
                        <!-- img src="http://placehold.it/<?php //echo $imagesSet[rand(0, 5)];?>" -->
                        <!-- img src="http://placehold.it/100x100" -->
                        <img src="http://lorempixel.com/<?=  rand(100, 400); ?>/100" title="<?php echo $imagesAltSet[rand(0, 5)]; ?>" alt="<?php echo $imagesAltSet[rand(0, 5)]; ?> " >
                        
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
    </body>
</html>