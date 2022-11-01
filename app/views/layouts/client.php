<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="<?php echo __WEB_ROOT__ ?>/public/assets/client/css/style.css">
</head>
<body>
    
<?php 
$this->render('block/header');

// neu trong ham render khong truyen lai data thi se mat data
$this->render($content,$data);
$this->render('block/footer') 
?>

<script></script>

</body>
</html>