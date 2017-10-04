<html>
  <head>
    <title>Nyheter</title>
    <link rel="stylesheet" href="/css/news.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:300,400|Josefin+Slab|Playfair+Display:700|Material+Icons|Roboto" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#0D47A1" />
  </head>
  <body>
    <h1>Nyheter</h1>
    <div id="news">
      <div>
        <img src="/img/frastavallen/20170724-1.jpg">
        <p id="date">2017-07-24</p>
        <h2>Slåtter på Frästavallen</h2>
        <p>Stor uppslutning på årets slåtter. Drygt 20 personer slöt upp och på en timme så hade vi räfsat upp det slagna gräset</p>
      </div>
    </div>
    <?php
    function get_files($dir)
    {
      $results = array();
      $files = scandir($dir);

      foreach ($files as $key => $value) {
        $path = realpath($dir . '/' . $value);
        if (!is_dir($path)) {
          $results[] = $path;
        } else if ($value != '.' && $value != '..') {
          $results = array_merge(get_files($path), $results);
        }
      }

      return $results;
    }

    function get_title($file) {
      $content = file_get_contents($file);
      $title = preg_match("/<title>(.*)<\/title>/i", $content, $match);
      $title = preg_replace('/\s+/', ' ', $match[1]);
      $title = trim($title);
      return $title;
    }

    function get_date($file) {
      $content = file_get_contents($file);
      $date = preg_match("/<p id=\"date\">(.*)<\/p>/i", $content, $match);
      $date = preg_replace('/\s+/', ' ', $match[1]);
      $date = trim($date);
      return $date;
    }

    function get_text($file) {
      $content = file_get_contents($file);
      $text = preg_match("/<p>((([^ ]+) ?){1,30})[\s\S]*<\/p>/i", $content, $match);
      $text = preg_replace('/\s+/', ' ', $match[1]);
      $text = trim($text);
      return $text;
    }

    $files = get_files(__DIR__ . "/news");
    var_dump($files);
    var_dump(get_title($files[0]));
    var_dump(get_date($files[0]));
    var_dump(get_text($files[0]));
    ?>
  </body>
</html>
