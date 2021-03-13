<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1> -->
    <?php
        $url = (isset($_GET['url'])) ? $_GET['url'] : 'log';
        $url = array_filter(explode('/', $url));
        //var_dump($url);
        
        $file = $url[0].'.php';

        if(is_file($file)){
            include $file;
        }else{
            include '404.php';
        }
        //var_dump($file);
    ?>
<!-- </body>
</html> -->