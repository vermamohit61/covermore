<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use App\Http\Requests ;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DOMDocument;


class VahanController extends Controller
{
  public function show(Request $request) {

    $home_url = 'https://parivahan.gov.in/rcdlstatus/?pur_cd=102';
    $posturl = "https://parivahan.gov.in/rcdlstatus/vahan/rcDlHome.xhtml";
    $reg1 = $request->reg1;

    $reg2 = $request->reg2;

    $ch = curl_init($home_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $result = curl_exec($ch);
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
      parse_str($item, $cookie);
      $cookies = array_merge($cookies, $cookie);
    }
    $jsessionid = trim($cookies["JSESSIONID"]);
    $dom = new DOMDocument("1.0", "utf-8");
    $dom->strictErrorChecking = false;
    $dom->recover = true;
    libxml_use_internal_errors(true);
    $dom->loadHTML($result);
    $dom->preserveWhiteSpace = false;
    $input_tags = $dom->getElementsByTagName('input');
    for ($i = 0; $i < $input_tags->length; $i++) {
      if (is_object($input_tags->item($i))) {
        $name = $value = '';
        $name_o = $input_tags->item($i)->attributes->getNamedItem('name');
        if (is_object($name_o)) {
          $name = $name_o->value;

          $value_o = $input_tags->item($i)->attributes->getNamedItem('value');
          if (is_object($value_o)) {
            $value = $input_tags->item($i)->attributes->getNamedItem('value')->value;
          }

          $post_data[$name] = $value;
        }
      }
    }
    $viewstate = $post_data["javax.faces.ViewState"];

    $buttons = $dom->getElementsByTagName('button');
    $i = 0;
    foreach ($buttons as $button) {
      $id = $button->getAttribute('id');
      if ($i == 1) {
        $first_left_button_id = $id;
      }
      $i = $i + 1;
    }
    $header_value_array = array(
      'Content-Type: application/x-www-form-urlencoded',
      'Host: parivahan.gov.in',
      'Accept: application/xml, text/xml, */*; q=0.01',
      'Accept-Language: en-US,en;q=0.5',
      'Accept-Encoding: gzip, deflate, br',
      'X-Requested-With: XMLHttpRequest',
      'Faces-Request: partial/ajax',
      'Origin: https://parivahan.gov.in',
      'Cookie: JSESSIONID=' . $jsessionid
    );
    $postdata = http_build_query(
      array(
        'javax.faces.partial.ajax' => 'true',
        'javax.faces.source' => $first_left_button_id,
        'javax.faces.partial.execute' => '@all',
        'javax.faces.partial.render' => 'form_rcdl:pnl_show form_rcdl:pg_show form_rcdl:rcdl_pnl',
        $first_left_button_id => $first_left_button_id,
        'form_rcdl' => 'form_rcdl',
        'form_rcdl:tf_reg_no1' => $reg1,
        'form_rcdl:tf_reg_no2' => $reg2,
        'javax.faces.ViewState' => $viewstate
      )
    );
    $opts = array('http' =>
      array(
        'method' => 'POST',
        'header' => $header_value_array,
        'content' => $postdata
      )
    );

    $context = stream_context_create($opts);
    $final_result = file_get_contents($posturl, false, $context);
    $reg_no = trim($this->scrape_out_nimmajji($final_result, "Registration No:"));
    $reg_date = trim($this->scrape_out_nimmajji($final_result, "Registration Date:"));
    $chassis = trim($this->scrape_out_nimmajji($final_result, "Chassis No:"));
    $engineno = trim($this->scrape_out_nimmajji($final_result, "Engine No:"));
    $ownername = trim($this->scrape_out_nimmajji($final_result, "Owner Name:"));
    $vehicleclass = trim($this->scrape_out_nimmajji($final_result, "Vehicle Class:"));
    $fueltype = trim($this->scrape_out_nimmajji($final_result, "Fuel Type:"));
    $fitnessupto = trim($this->scrape_out_nimmajji($final_result, "Fitness Upto:"));
    $insuranceupto = trim($this->scrape_out_nimmajji($final_result, "Insurance Upto:"));
    $fuelnorms = trim($this->scrape_out_nimmajji($final_result, "Fuel Norms:"));
    $roadtaxpaidupto = trim($this->scrape_out_nimmajji($final_result, "Road Tax Paid Upto:"));

    $return_data = array(
      'vehicle_registration_info' => array(
        'regno' => $reg_no,
        'reg_date' => $reg_date,
        'chassis' => $chassis,
        'engineno' => $engineno,
        'ownername' => $ownername,
        'vehicleclass' => $vehicleclass,
        'fueltype' => $fueltype,
        'fitnessupto' => $fitnessupto,
        'insuranceupto' => $insuranceupto,
        'fuelnorms' => $fuelnorms,
        'roadtaxpaidupto' => $roadtaxpaidupto,
      )
    );
    echo json_encode($return_data);
    //return Redirect::to('people/'.$lastName.'/'.$firstName) ;
  }
    
  function scrape_out_nimmajji($html_data_out2, $find) {

    $lines = explode("\n", $html_data_out2);
    $line_number = 0;
    foreach ($lines as $num => $line) {
      if (strpos($line, $find)) {
        return strip_tags($lines[$line_number + 1]);
      } else {
        $line_number += 1;
      }
    }
    return 0;
  }
}
