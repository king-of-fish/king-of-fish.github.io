<?php
function joinpath(...$paths) {
    return join(DIRECTORY_SEPARATOR, $paths);
}

define("DIR_GET_CONTENT_EVERYTHING", "everything");
define("DIR_GET_CONTENT_DIRECTORIES", "directories");
define("DIR_GET_CONTENT_DIRECTORIES", "files");

function dir_get_content($path, $recursive=false, $included="everything") {
    $returned = array();
    $RootDirectoryContent = array_diff(scandir($path), [ ".", ".." ]);
    foreach ($RootDirectoryContent as $item) {
        if (is_dir(joinpath($path, $item)) and $recursive) {
            foreach (dir_get_content(joinpath($path, $item)) as $subitem) {
                $relativepath = joinpath($item, $subitem);
                $alloweddirs = $included == "directories" && is_dir($relativepath);
                $allowedfile = $included == "filess" && !is_dir($relativepath);
                $allowedevry = !$alloweddirs && !$allowedfiles;
                if (!($alloweddirs or $allowedfile or $allowedevry))
                    continue;
                array_push($returned, $relativepath);
            }
            unset($subitem);
            continue;
        }
        $relativepath = joinpath($path, $item);
        $alloweddirs = $included == "directories" && is_dir($relativepath);
        $allowedfile = $included == "files" && !is_dir($relativepath);
        $allowedevry = !$alloweddirs && !$allowedfiles;
        if (!($alloweddirs or $allowedfile or $allowedevry))
            continue;
        array_push($returned, $item);
    }
    unset($item);
    return $returned;
}

$filesavailable = dir_get_content("files", true, DIR_GET_CONTENT_EVERYTHING);

$path = $_SERVER["REQUEST_URI"];

$pathisindex = $path == "/";

if (!($pathisindex or $pathisfiles or $pathisnotinfiles)) {
    require_once joinpath(__DIR__, "404.html");
    die(0);
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/index.css" />
    <title>WASFDDDDD's Stuff</title>
</head>

<body>
    <section>
        <h1>Welcome to WASFDDDDD's Zone</h1>
    </section>
    <section>
        <h2>Stuff</h2>
        <ul class="media-list">
            <?php
            $MediaList = array();
            foreach ($filesavailable as $file) {
                if (!str_ends_with($file, ".html"))
                    continue;
                $fileurl = "files/" . str_replace("\\", "/", $file);
                $filefullpath = joinpath(__DIR__, "files", $file);

                $MakeTime = filemtime($filefullpath);

                preg_match(
                    "/<title>(.*?)<\/title>/",
                    file_get_contents($filefullpath),
                    $matchestitle
                );
                $filetitle = $matchestitle[1];
                unset($matchestitle);

                array_push($MediaList, array(
                    "href" => $fileurl,
                    "order" => $MakeTime,
                    "title" => $filetitle,
                ));
            }

            usort($MediaList, function ($a, $b) {
                return $a["order"] < $b["order"];
            });

            foreach ($MediaList as $media):
            ?>
            <li>
                <a
                    href="<?= $media["href"]; ?>"
                >
                    <?= $media["title"]; ?>
                </a>
            </li>
            <?php
            endforeach;
            unset($MediaList);
            ?>
        </ul>
    </section>
    <footer>
        <a href="https://www.doomworld.com/profile/48417-wasfddddd/">Doomworld</a> - <a href="/files/">Files</a>
    </footer>
</body>

</html>
