<?php
function e($data=array(), $exit=false){
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
  if($exit){
    exit();
  }
}

function getRelativeTime($date, $use_prefix = true)
{
    $date_a_comparer = new DateTime($date);
    $date_actuelle = new DateTime("now");

    $intervalle = $date_a_comparer->diff($date_actuelle);

    $prefixe = '';
    if ($use_prefix) {
        if ($date_a_comparer > $date_actuelle) {
            $prefixe = 'dans ';
        } else {
            $prefixe = 'il y a ';
        }
    }

    $ans = $intervalle->format('%y');
    $mois = $intervalle->format('%m');
    $jours = $intervalle->format('%d');
    $heures = $intervalle->format('%h');
    $minutes = $intervalle->format('%i');
    $secondes = $intervalle->format('%s');

    if ($ans != 0) {
        $relative_date = $prefixe . $ans . ' an' . (($ans > 1) ? 's' : '');
        if ($mois >= 6)
            $relative_date .= ' et demi';
    } elseif ($mois != 0) {
        $relative_date = $prefixe . $mois . ' mois';
        if ($jours >= 15)
            $relative_date .= ' et demi';
    } elseif ($jours != 0) {
        $relative_date = $prefixe . $jours . ' jour' . (($jours > 1) ? 's' : '');
    } elseif ($heures != 0) {
        $relative_date = $prefixe . $heures . ' heure' . (($heures > 1) ? 's' : '');
    } elseif ($minutes != 0) {
        $relative_date = $prefixe . $minutes . ' minute' . (($minutes > 1) ? 's' : '');
    } else {
        $relative_date = $prefixe . ' quelques secondes';
    }
    return $relative_date;
}

function wd_remove_accents($str, $charset = 'utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

    $avec = array("'", "-");
    $sans = array("", "");
    return str_replace($avec, $sans, $str);
}

function newObject()
{
    return new stdClass();
}

function logger($str, $file = "")
{
    if (empty($file)) {
        $file = date("Y-m-d") . ".log";
    }
    $fopen = fopen("logs/" . $file, "a");
    fwrite($fopen, date("Y-m-d H:i:s") . " :: " . $str . "\n");
    fclose($fopen);
}

function to_utf8($string)
{
// From http://w3.org/International/questions/qa-forms-utf-8.html
    if (preg_match('%^(?:
      [\x09\x0A\x0D\x20-\x7E]            # ASCII
    | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
    | \xE0[\xA0-\xBF][\x80-\xBF]         # excluding overlongs
    | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
    | \xED[\x80-\x9F][\x80-\xBF]         # excluding surrogates
    | \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
    | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
    | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
)*$%xs', $string)) {
        return $string;
    } else {
        return iconv('CP1252', 'UTF-8', $string);
    }
}

function str_decode($query)
{
    $return = array();
    foreach (explode('&', $query) as $chunk) {
        $param = explode("=", $chunk);
        if ($param) {
            //printf("La valeur du paramètre \"%s\" est \"%s\"<br/>\n", urldecode($param[0]), urldecode($param[1]));
            $return[urldecode($param[0])] = urldecode($param[1]);
        }
    }
    return $return;
}
function codeigniter_explosion($posts)
{
    $html = '';
    $html .= '<h4>Controller : </h4>';
    $html .= '<pre>';
    foreach ($posts as $k => $v) {
        if ($k !== 'submit') {
            $html .= '$data[\'' . $k . '\'] = "";';
            $html .= '<br />';
        }
    }
    $html .= '<br />';
    $html .= 'if(isset($_POST[\'submit\'])){';
    $html .= '<br />';
    foreach ($posts as $k => $v) {
        if ($k !== 'submit') {
            $html .= "\t" . '$data[\'' . $k . '\'] = $' . $k . ' = $this->input->post("' . $k . '");';
            $html .= '<br />';
        }
    }
    $html .= '<br />';
    foreach ($posts as $k => $v) {
        if ($k !== 'submit') {
            $html .= "\t" . '$this->form_validation->set_rules("' . $k . '", "' . $k . '", "trim|required|min_length[5]|max_length[12]|valid_email|matches[password]|is_unique[users.email]", array(';
            $html .= '<br />';
            $html .= "\t\t" . '"trim"=>"",';
            $html .= '<br />';
            $html .= "\t\t" . '"required"=>"",';
            $html .= '<br />';
            $html .= "\t\t" . '"min_length"=>"",';
            $html .= '<br />';
            $html .= "\t\t" . '"max_length"=>"",';
            $html .= '<br />';
            $html .= "\t\t" . '"valid_email"=>"",';
            $html .= '<br />';
            $html .= "\t\t" . '"matches"=>"",';
            $html .= '<br />';
            $html .= "\t\t" . '"is_unique"=>""';
            $html .= '<br />';
            $html .= "\t" . "));";
            $html .= '<br />';
        }
    }
    $html .= "\t" . 'if ($this->form_validation->run() == FALSE){';
    $html .= '<br />';
    $html .= "\t" . '}else{';
    $html .= '<br />';
    $html .= "\t\t" . ' $data_insert = array(';
    foreach ($posts as $k => $v) {
        if ($k !== 'submit') {
            $html .= '<br />';
            $html .= "\t\t\t" . '"' . $k . '"=>$' . $k . ',';
        }
    }
    $html .= '<br />';
    $html .= "\t\t" . ');';
    $html .= '<br />';
    $html .= "\t" . '}';
    $html .= '<br />';
    $html .= '}';

    $html .= '</pre>';
    return $html;
}
 ?>
