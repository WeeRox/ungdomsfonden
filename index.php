<!DOCTYPE html>
<html lang="sv">

<head>
  <title>Ungdomsfonden i Gnarp</title>
  <link rel="stylesheet" href="/css/index.css" type="text/css" />
  <link rel="stylesheet" href="/css/news.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:300,400|Josefin+Slab|Playfair+Display:700|Material+Icons|Roboto" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script async src="/js/index.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#0D47A1" />
  <meta charset="UTF-8" />
  <meta name="description" content="Ungdomsfonden i Gnarp har som syfte att stötta barn och ungdomsverksamhet i Gnarp, inom bland annat kultur, idrott, natur och miljö. " />
</head>

<body>
  <div id="content">
    <div class="block" id="about">
      <h1 id="title">Ungdomsfonden i Gnarp</h1>
      <h2>Om oss</h2>
      <p>Ungdomsfonden bildades 1997. Syftet är att stötta allmännyttig verksamhet för barn och ungdom i Gnarp. Inom bland annat kultur, idrott, natur/miljö eller annan barn- och ungdomsverksamhet.</p>
      <p>Styrelsen för Ungdomsfonden har inga arvoden.</p>
      <p>Hittills har Ungdomsfonden i Gnarp stöttat föreningslivet med över 6 miljoner kronor. 19 föreningar har beviljats bidrag. Gnarps ridklubb, Gällsta IK och Kulturstjärnan är exempel på föreningar som har fått stöd.</p>
      <p>Ungdomsfonden i Gnarp är ett alternativ eller komplement till andra fonder vid till exempel dödsfall, testamenten, hyllningar och högtider.</p>
      <a href="#news" class="material-icons">keyboard_arrow_down</a>
    </div>
    <div class="block" id="news">
      <h2>Nyheter</h2>
      <div id="articles">
        <?php
        function get_files($dir)
        {
          $results = array();
          $files = scandir($dir);

          foreach ($files as $key => $value) {
            // on the index page we only want the three first articles
            if (key > 2) {
              break;
            }
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
      <a href="#give" class="material-icons">keyboard_arrow_down</a>
    </div>
    <div class="block" id="give">
      <h2>Skänk pengar</h2>
      <p>Minnes- och hyllningskort finns hos Handelsbanken, Gnarps Blommor och församlingsexpeditionerna i Harmånger och Gnarp. Det går också att hämta hos kassören Lisa B Östman.</p>
      <p>Om du vill lämna ett bidrag så går det bra att göra det via bankgiro 5216-5214</p>
      <a href="#apply" class="material-icons">keyboard_arrow_down</a>
    </div>
    <div class="block" id="apply">
      <h2>Sök pengar</h2>
      <p>
        Alla föreningar i Gnarp som bedriver barn- och ungdomsverksamhet kan som medlem i Ungdomsfonden söka bidrag till sin förening.
        <br />
        Medlemsavgiften är 50 kr/år.
      </p>
      <p>
        Om din förening vill söka bidrag så fyller ni i ansökningsblanketten och skickar den med post till
        <br />
        Ungdomsfonden
        <br />
        c/o Hälsingesylt
        <br />
        Grängsjö 218
        <br />
        82077 Gnarp
        <br />
        eller mailar till lisa@halsingesylt.se
      </p>
      <p>Ansökan ska vara oss tillhanda senast 1 december. </p>
      <div id="download">
        <a href="/doc/Ansökan Ungdomsfonden i Gnarp.pdf" download>Ladda ner ansökningsblankett</a>
      </div>
      <a href="#approved" class="material-icons">keyboard_arrow_down</a>
    </div>
    <div class="block" id="approved">
      <h2>Beviljade bidrag geonom åren</h2>
      <div>
        <table>
          <tr>
            <th>Förening</th>
            <th>Beviljat</th>
          </tr>
          <tr>
            <td>Föreningen Gnarpsviljan</td>
            <td>630 000 kr</td>
          </tr>
          <tr>
            <td>Gnarpsbadens Golfklubb</td>
            <td>3 000 kr</td>
          </tr>
          <tr>
            <td>Gnarps Fiskeområde</td>
            <td>30 000 kr</td>
          </tr>
          <tr>
            <td>Gnarps Gymnastikförening</td>
            <td>22 700 kr</td>
          </tr>
          <tr>
            <td>Gnarps Hembygds- och Fornminnesförening</td>
            <td>3 000 kr</td>
          </tr>
          <tr>
            <td>Gnarps Lekparksförening</td>
            <td>46 500 kr</td>
          </tr>
          <tr>
            <td>Gnarps Ridklubb</td>
            <td>1 588 000 kr</td>
          </tr>
          <tr>
            <td>Gnarps Schackklubb</td>
            <td>140 300 kr</td>
          </tr>
          <tr>
            <td>Kontaktföräldraföreningen Gnarp</td>
            <td>92 000 kr</td>
          </tr>
          <tr>
            <td>Gårdsjöns Badförening</td>
            <td>20 000 kr</td>
          </tr>
          <tr>
            <td>Gällsta IK</td>
            <td>2 056 000 kr</td>
          </tr>
          <tr>
            <td>Hoppskogens IK</td>
            <td>6 000 kr</td>
          </tr>
          <tr>
            <td>IFK Gnarp</td>
            <td>699 000 kr</td>
          </tr>
          <tr>
            <td>IOGT Gnarp</td>
            <td>86 000 kr</td>
          </tr>
          <tr>
            <td>Kulturstjärnan</td>
            <td>852 800 kr</td>
          </tr>
          <tr>
            <td>Nordanstigs Kristna Föräldraförening</td>
            <td>132 000 kr</td>
          </tr>
          <tr>
            <td>Norrfjärns IF</td>
            <td>340 000 kr</td>
          </tr>
          <tr>
            <td>Bågskytteklubben Gnarp</td>
            <td>10 000 kr</td>
          </tr>
          <tr>
            <td>Årskogens IK</td>
            <td>15 000 kr</td>
          </tr>
        </table>
      </div>
      <a href="#contact" class="material-icons">keyboard_arrow_down</a>
    </div>
    <div id="contact">
      <div id="contact-cards">
        <div class="contact-card">
          <p>Sverker Söderström</p>
          <p>Ordförande</p>
          <p>070-697 73 45</p>
          <p><a href="mailto:sverker.soderstrom@telia.com">sverker.soderstrom@telia.com</a></p>
        </div>
        <div class="contact-card">
          <p>Lisa Sjöström</p>
          <p>Sekreterare</p>
          <p>070-304 35 42</p>
          <p><a href="mailto:elisabeth.sjostrom@regiongavleborg.se">elisabeth.sjostrom@regiongavleborg.se</a></p>
        </div>
        <div class="contact-card">
          <p>Lisa B Östman</p>
          <p>Kassör</p>
          <p>070-227 66 15</p>
          <p><a href="mailto:lisa@halsingesylt.se">lisa@halsingesylt.se</a></p>
        </div>
        <div class="contact-card">
          <p>Inga Berglin</p>
          <p>Styrelseledamot</p>
          <p>070-369 09 23</p>
          <p><a href="mailto:inga.berglin@telia.com">inga.berglin@telia.com</a></p>
        </div>
        <div class="contact-card">
          <p>Alf Nordlund</p>
          <p>Styrelseledamot</p>
          <p>070-651 79 21</p>
          <p><a href="mailto:alf.nordlund2016@gmail.com">alf.nordlund2016@gmail.com</a></p>
        </div>
      </div>
      <a href="#about" class="material-icons">keyboard_arrow_up</a>
    </div>
  </div>
</body>
</html>
