<?php
/*
        top_ten_image_script - generates the a png chart of the top
        ten most searched movies

        RAD - 
        Team Name: ICA Designs
        Team Members:
            Ivan Ng
            Caspian Maclean
            Andrew Williamson
        Date: 05/11/2021
        Sprint: One
        Task: Make all the pages responsive.
*/

require "connection_script.php";

$stmt = $conn->prepare(
    '
SELECT
    title, average_star_rating
FROM
    `dvd`
WHERE
    1
ORDER BY average_star_rating DESC, 
number_of_star_ratings DESC
LIMIT 10;
    '
);

$stmt->execute();

$rank = 1;
$count = 0;

$max_results = 10;

$search_counts = array_fill(0, $max_results, 0);
$titles = array_fill(0, $max_results, "");
$ranks = array_fill(0, $max_results, 0);

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $search_count = $row["average_star_rating"];

    $titles[$count] = $row["title"];
    $search_counts[$count] = $search_count;
    $ranks[$count] = $rank;

    if ($count == 0) {
        $min = $search_count;
        $max = $search_count;
    } else {
        $min = min($min, $search_count);
        $max = max($max, $search_count);
    }

    $rank++;
    $count++;
}

$conn = null;

$image_width = 800;
$image_height = 384;

$max_width = $image_width / 2;
$min_width = 10;

if ($max == $min) {
    $min_width = $max_width;
    $bar_scale = 0;
} else {
    $bar_scale = ($max_width - $min_width) / ($max - $min);
}

$image = @imagecreate($image_width, $image_height) or
    die("Cannot initialise new GD image");

$background = imagecolorallocate($image, 32, 32, 32);
// colour is arbitrary becaouse it's changed to transparent.
imagecolortransparent($image, $background);

$text_colour = imagecolorallocate($image, 0, 0, 0);
$bar_colour = imagecolorallocate($image, 0, 0, 128);

for ($i = 0; $i < $count; $i++) {
    $width = $max_width;

    $width = $min_width + $bar_scale * ($search_counts[$i] - $min);

    $info = "" . $search_counts[$i] . " - " . $titles[$i];


    $y1 = 40+30*$i;
    imagestring($image, 5, 20+$width, $y1, $info, $text_colour);
    imagefilledrectangle($image, 10, $y1, 10+$width, $y1 + 15, $bar_colour);

}

    // Set header only once we get near the end,
    // so that errors up to here could be reported.
    header("Content-type: image/png");

    // Output the png
    imagepng($image);
    imagedestroy($image);
?>
