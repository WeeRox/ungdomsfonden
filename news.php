<html>
  <head>
    <title>Nyheter</title>
    <link rel="stylesheet" href="/css/news.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:300,400|Josefin+Slab|Playfair+Display:700|Material+Icons|Roboto" rel="stylesheet" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#0D47A1" />
  </head>
  <body style="padding: 30px;">
    <h1>Nyheter</h1>
    <div id="articles">
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
        $text .= '...';
        $text .= ' <span class="read-more">Läs mer</span>';
        return $text;
      }

      function get_image($file) {
        $content = file_get_contents($file);
        $image = preg_match("/<img src=\"(.*)\".*\/>/i", $content, $match);
        $image = preg_replace('/\s+/', ' ', $match[1]);
        $image = trim($image);
        return $image;
      }

      $files = get_files(__DIR__ . "/news");
      foreach ($files as $key => $value) {
        echo "<div>";
        echo '<a href="' . str_replace('\\', '/', str_replace(__DIR__, '', $value)) . '">';
        echo '<img src="' . str_replace(__DIR__, '', get_image($value)) . '" />';
        echo '<p id="date">' . get_date($value) . '</p>';
        echo '<h2>' . get_title($value) . '</h2>';
        echo '<p>' . get_text($value) . '</p>';
        echo "</a>";
        echo "</div>";
      }
      ?>
    </div>
  </body>
</html>
