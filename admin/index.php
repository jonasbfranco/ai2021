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
        $url = array_filter(explode('/', $_GET['url'] ?? 'log'));
        
        //var_dump($url);
        

        if (file_exists($url[0].'.php')){
            include $url[0].'.php';
        }else{
            include '404.php';
        }

    ?>


     <?php //Exemplo CELKE URL AMIGAVEL
        // $url = (isset($_GET['url'])) ? $_GET['url'] : 'log';
        // $url = array_filter(explode('/', $url));
        // var_dump($url);
        
        // $file = $url[0].'.php';

        // if(is_file($file)){
        //     include $file;
        // }else{
        //     include '404.php';
        // }
        // echo "<pre>";
        // var_dump($file);
        // echo ">br>";
        // var_dump($url);
        // echo "</pre>";
    ?> 

<!-- </body>
</html> -->