<?php


function deleteDirectory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir)) {
        return unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }
    return rmdir($dir);
}

function headWrite($newfile, $buildPath, $cssPath, $jsPath)
{

    if (isset($_POST['head'])) {
        $i = 0;
        foreach ($_POST['head'] as $value) {
            if (array_keys($_POST['head'])[$i] == "metaCheckBox") {
                fwrite($newfile, '  <meta name="abstract" content="" />' . PHP_EOL);
                fwrite($newfile, '  <meta name="description" content="" />' . PHP_EOL);
                fwrite($newfile, '  <meta name="robots" content="index,follow" />' . PHP_EOL);
            }
            if (array_keys($_POST['head'])[$i] == "charsetCheckBox") fwrite($newfile, ' <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . PHP_EOL);
            if (array_keys($_POST['head'])[$i] == "viewCheckBox") fwrite($newfile, ' <meta name="viewport" content="width=device-width, initial-scale=1.0">' . PHP_EOL);

            $i++;
        }
        fwrite($newfile, PHP_EOL);
    }
}

function cssfr($newfile, $buildPath, $cssPath)
{
    if (isset($_POST['cssfr'])) {
        $i = 0;
        foreach ($_POST['cssfr'] as $value) {
            if (array_keys($_POST['cssfr'])[$i] == "bootstrapCss") {
                copy("BuildingsParts/bootstrap/bootstrap-5.1.3/css/bootstrap.min.css", $buildPath . $cssPath . 'css/bootstrap.min.css');
                fwrite($newfile, ' <link href="' . $cssPath . 'css/bootstrap.min.css" rel="stylesheet"/>' . PHP_EOL);
            }
            if (array_keys($_POST['cssfr'])[$i] == "haumburgerCss") {
                copy("BuildingsParts/css/hamburgers.css", $buildPath . $cssPath . 'css/haumburger.min.css');
                fwrite($newfile, ' <link href="' . $cssPath . 'css/haumburger.min.css" rel="stylesheet"/>' . PHP_EOL);
            }
            if (array_keys($_POST['cssfr'])[$i] == "animateCss") {
                copy("BuildingsParts/css/animate-4.1.1.css", $buildPath . $cssPath . 'css/animate-4.1.1.css');
                fwrite($newfile, ' <link href="' . $cssPath . 'css/animate-4.1.1.css" rel="stylesheet"/>' . PHP_EOL);
            }
            if (array_keys($_POST['cssfr'])[$i] == "jqueryUIcss") {
                copy("BuildingsParts/jquery/css/jquery-ui.min.css", $buildPath . $cssPath . 'css/jquery-ui.min.css');
                fwrite($newfile, ' <link href="' . $cssPath . 'css/jquery-ui.min.css" rel="stylesheet"/>' . PHP_EOL);
            }
            $i++;
        }
        fwrite($newfile, PHP_EOL);
    }
}

function jsfr($newfile, $buildPath, $jsPath)
{
    if (isset($_POST['jsfr'])) {
        $i = 0;
        foreach ($_POST['jsfr'] as $value) {

            if (array_keys($_POST['jsfr'])[$i] == "jqueryJs") {
                copy("BuildingsParts/jquery/js/jquery-3.6.0.js", $buildPath . $jsPath . 'js/jquery-3.6.0.js');
                fwrite($newfile, ' <script src="' . $jsPath . 'js/jquery-3.6.0.js" ></script>' . PHP_EOL);
            }
            if (array_keys($_POST['jsfr'])[$i] == "jqueryUIJs") {
                copy("BuildingsParts/jquery/js/jquery-ui.min.js", $buildPath . $jsPath . 'js/jquery-ui.min.js');
                fwrite($newfile, ' <script src="' . $jsPath . 'js/jquery-ui.min.js" ></script>' . PHP_EOL);
            }
            if (array_keys($_POST['jsfr'])[$i] == "bootstrapJs") {
                copy("BuildingsParts/bootstrap/bootstrap-5.1.3/js/bootstrap.min.js", $buildPath . $jsPath . 'js/bootstrap.min.js');
                fwrite($newfile, ' <script src="' . $jsPath . 'js/bootstrap.min.js" ></script>' . PHP_EOL);
            }
            $i++;
        }
        fwrite($newfile, PHP_EOL);
    }
}

if ($_POST['projectName']) {

    deleteDirectory('build/');

    $buildPath = 'build/';
    $dohead = true;
    if (!file_exists($buildPath)) {

        $head = false;
        mkdir($buildPath);
        $buildPath .= $_POST['projectName'] . '/';
        mkdir($buildPath);

        switch ($_POST['projectFolder']) {
            case 'simple':
                mkdir($buildPath . 'css/');
                touch($buildPath . 'css/' . 'temp.css');
                mkdir($buildPath . 'js/');
                touch($buildPath . 'js/' . 'temp.css');

                if (isset($_POST['head']['responsiveCheckBox']) && $_POST['head']['responsiveCheckBox'] == "true")  copy("BuildingsParts/css/responsive.css", $buildPath . 'css/responsive.css');

                $newfile = fopen($buildPath . "simple.html", "w");
                $file = fopen('BuildingsParts/html/simple.html', 'r+');

                while ($read = fgets($file)) {

                    $pat1 = "/<head>/i";
                    $pat2 = "/<\/head>/i";
                    if (preg_match($pat1, $read) == 1) $head = true;
                    if (preg_match($pat2, $read) == 1) $head = false;
                    if ($head) {
                        if ($dohead) {
                            fwrite($newfile, $read);
                            $dohead = false;
                            continue;
                        }

                        headWrite($newfile, $buildPath, '', '');
                        cssfr($newfile, $buildPath, '');
                        jsfr($newfile, $buildPath, '');

                        if (isset($_POST['head']['responsiveCheckBox']) && $_POST['head']['responsiveCheckBox'] == "true") fwrite($newfile, ' <link href="css/responsive.css" rel="stylesheet">' . PHP_EOL);
                        fwrite($newfile, ' <link href="css/style.css" rel="stylesheet">' . PHP_EOL);
                        copy("BuildingsParts/css/basicstyle.css", $buildPath . 'css/style.css');
                    } else {
                        fwrite($newfile, $read);
                    }
                }
                fclose($file);
                break;
            case 'regular':
                mkdir($buildPath . 'app/');
                mkdir($buildPath . 'app/public/');
                mkdir($buildPath . 'app/public/css');
                touch($buildPath . 'app/public/css/' . 'temp.css');
                mkdir($buildPath . 'app/public/js');
                touch($buildPath . 'app/public/js/' . 'temp.js');
                mkdir($buildPath . 'app/public/img');
                touch($buildPath . 'app/public/img/' . 'temp.txt');

                if (isset($_POST['head']['responsiveCheckBox']) && $_POST['head']['responsiveCheckBox'] == "true")  copy("BuildingsParts/css/responsive.css", $buildPath . 'app/public/css/responsive.css');
                $newfile = fopen($buildPath . "simple.html", "w");
                $file = fopen('BuildingsParts/html/simple.html', 'r+');

                while ($read = fgets($file)) {

                    $pat1 = "/<head>/i";
                    $pat2 = "/<\/head>/i";
                    if (preg_match($pat1, $read) == 1) $head = true;
                    if (preg_match($pat2, $read) == 1) $head = false;
                    if ($head) {
                        if ($dohead) {
                            fwrite($newfile, $read);
                            $dohead = false;
                            continue;
                        }

                        headWrite($newfile, $buildPath, '', '');
                        cssfr($newfile, $buildPath, 'app/public/');
                        jsfr($newfile, $buildPath, 'app/public/');

                        if (isset($_POST['head']['responsiveCheckBox']) && $_POST['head']['responsiveCheckBox'] == "true") fwrite($newfile, ' <link href="app/public/css/responsive.css" rel="stylesheet">' . PHP_EOL);
                        fwrite($newfile, ' <link href="app/public/css/style.css" rel="stylesheet">' . PHP_EOL);
                        copy("BuildingsParts/css/basicstyle.css", $buildPath . 'app/public/css/style.css');
                    } else {
                        fwrite($newfile, $read);
                    }
                }
                fclose($file);

                break;

            case 'developed':
                mkdir($buildPath . 'app/');
                mkdir($buildPath . 'app/core');
                touch($buildPath . 'app/core/' . 'temp.txt');
                mkdir($buildPath . 'app/controllers');
                touch($buildPath . 'app/controllers/' . 'temp.txt');
                mkdir($buildPath . 'app/data');
                touch($buildPath . 'app/data/' . 'temp.txt');
                mkdir($buildPath . 'app/helpers');
                touch($buildPath . 'app/helpers/' . 'temp.txt');
                mkdir($buildPath . 'app/logs');
                touch($buildPath . 'app/logs/' . 'temp.txt');
                mkdir($buildPath . 'app/models');
                touch($buildPath . 'app/models/' . 'temp.txt');
                mkdir($buildPath . 'app/settings');
                touch($buildPath . 'app/settings/' . 'temp.txt');
                mkdir($buildPath . 'app/views');
                mkdir($buildPath . 'app/views/public');
                touch($buildPath . 'app/views/public/' . 'temp.txt');
                mkdir($buildPath . 'app/views/private');
                touch($buildPath . 'app/views/private/' . 'temp.txt');
                mkdir($buildPath . 'public/');
                mkdir($buildPath . 'public/css');
                touch($buildPath . 'public/css/' . 'temp.txt');
                mkdir($buildPath . 'public/js');
                touch($buildPath . 'public/js/' . 'temp.txt');
                mkdir($buildPath . 'public/img');
                mkdir($buildPath . 'public/img/upload');
                touch($buildPath . 'public/img/upload/' . 'temp.txt');
                mkdir($buildPath . 'public/img/png');
                touch($buildPath . 'public/img/png/' . 'temp.txt');
                mkdir($buildPath . 'public/img/jpeg');
                touch($buildPath . 'public/img/jpeg/' . 'temp.txt');
                mkdir($buildPath . 'public/img/svg');
                touch($buildPath . 'public/img/svg/' . 'temp.txt');
                mkdir($buildPath . 'public/img/ico');
                touch($buildPath . 'public/img/ico/' . 'temp.txt');
                mkdir($buildPath . 'src/');
                touch($buildPath . 'src/' . 'temp.txt');

                if (isset($_POST['head']['responsiveCheckBox']) && $_POST['head']['responsiveCheckBox'] == "true")  copy("BuildingsParts/css/responsive.css", $buildPath . 'public/css/responsive.css');
                $newfile = fopen($buildPath . "simple.html", "w");
                $file = fopen('BuildingsParts/html/simple.html', 'r+');

                while ($read = fgets($file)) {

                    $pat1 = "/<head>/i";
                    $pat2 = "/<\/head>/i";
                    if (preg_match($pat1, $read) == 1) $head = true;
                    if (preg_match($pat2, $read) == 1) $head = false;
                    if ($head) {
                        if ($dohead) {
                            fwrite($newfile, $read);
                            $dohead = false;
                            continue;
                        }

                        headWrite($newfile, $buildPath, '', '');
                        cssfr($newfile, $buildPath, 'public/');
                        jsfr($newfile, $buildPath, 'public/');

                        if (isset($_POST['head']['responsiveCheckBox']) && $_POST['head']['responsiveCheckBox'] == "true") fwrite($newfile, ' <link href="public/css/responsive.css" rel="stylesheet">' . PHP_EOL);
                        fwrite($newfile, ' <link href="public/css/style.css" rel="stylesheet">' . PHP_EOL);
                        copy("BuildingsParts/css/basicstyle.css", $buildPath . 'public/css/style.css');
                    } else {
                        fwrite($newfile, $read);
                    }
                }
                fclose($file);

                break;
        }
    }
}



$rootPath = realpath('build');


$zip = new ZipArchive();
$zip->open($_POST['projectName'] . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {

    if (!$file->isDir()) {

        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        $zip->addFile($filePath, $relativePath);
    }
}


$zip->close();

/*
if (file_exists($_POST['projectName'] . '.zip')) {
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($_POST['projectName'] . '.Zip')) . ' GMT');
    header('Content-Type: application/force-download');
    header('Content-Disposition: inline; filename="' . $_POST['projectName'] . '.Zip"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($_POST['projectName'] . '.Zip'));
    header('Connection: close');
    readfile($_POST['projectName'] . '.Zip');
}
*/
