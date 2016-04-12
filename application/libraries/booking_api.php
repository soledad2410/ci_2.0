<?php
class Booking_Api 
{
    public $dataPlace;

    public function searchFlightsAction()
    {
        $langcode = (!empty($_SESSION["langcode"]))?$_SESSION["langcode"]:"vi-VN";
        foreach($this->dataPlace as $value)
        {
            if($value->CountryCode == "VN")
            {
                if($langcode == "vi-VN")
                    $v["name"] = $value->Name;
                else
                    $v["name"] = $value->EnglishName;
                $v["code"] = $value->Code;
                $this->tpl->insert_loop("main.fromPlace", "fromPlace", $v);
                $this->tpl->insert_loop("main.toPlace", "toPlace", $v);
            }
        }
        $this->tpl->assign("frmAction", $this->url->action("resultFlights"));
        return $this->view();
    }

    public function quickSearchPlaceAjax()
    {
        if(!empty($this->params["ds"]))
        {
            $ds = $this->params["ds"];
            $html = "";
            foreach($this->dataPlace as $key => $value)
            {
                if(strpos($value->Name, $ds) !== false || strpos($value->Code, $ds) !== false || strpos($value->EnglishName, $ds) !== false)
                {
                    $html .= "<li onclick='";
                    if(@$this->params["key"] == 0)
                        $html .= "ulLiClick($(this))'";
                    elseif(@$this->params["key"] == 1)
                        $html .= "ulLiTClick($(this))'";
                    if($key == 0)
                        $html .= " class='ac_active' ";
                    $html .= ">";
                    $html .= "<a href='javascript:' class='fl'>".$value->Name." (".$value->Code.")</a>";
                    $html .= "<span class='dn codeSearch'>$value->Code</span>";
                    $html .= "<span class='fr'>$value->CountryCode</span>";
                    $html .= "</li>";
                }
            }
            return json_encode(array("success" => true, "html" => $html));
        }
        else
            return json_encode(array("success" => false, "msg" => "Dá»¯ liá»‡u khĂ´ng tá»“n táº¡i!"));
    }

    public function getPlaces()
    {
        $username = "vemaybaytructuyen.com.vn"; $password = "vmbtructuyen@123";		//username and password cá»§a API

        $ch = curl_init();

        $url = 'http://112.213.85.45/AirBook/oapi/airline/Places';

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json' )
        );

        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);    		  //  curl authentication

        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");		//  curl authentication

        $str=  curl_exec($ch);

        curl_close($ch);

        $data = json_decode($str);			// Dá»¯ liá»‡u tráº£ vá» lĂ  kiá»ƒu stdClass Object
        return $data;
    }

    public function resultFlightsAction()
    {
       /* echo "<pre>";
        print_r ($this->params);
        echo "</pre>";
        print_r('Test resultFlightsAction');
        return $this->view();*/
    }

    public function resultFlightsPost()
    {
        echo "<pre>";
        print_r ($this->params);
        echo "</pre>";

        $test = $this->resultFlights($this->params);
        return $this->view();
    }

    public function resultFlights($params =array())
    {
        if(isset( $params['RoundTrip']) && $params['RoundTrip'] == 'on')
            $roundTrip = "true";
        else
            $roundTrip = "false";
        $data_post = '{
            "RoundTrip": '.$roundTrip.',
            "FromPlace": "'.$params['FromPlace'].'",
            "ToPlace": "'.$params['ToPlace'].'",
            "DepartDate": "'.$params['DepartDate'].'T00:00:00.000",
            "ReturnDate": "'.$params['ReturnDate'].'T00:00:00.000",
            "CurrencyType": "VND",
            "Adult": '.$params['Adult'].',
            "Child": '.$params['Child'].',
            "Infant": '.$params['Infant'].',
            "Sources": "VietJetAir"
            }';
       /* $data_post = '{
        "RoundTrip": false,
        "FromPlace": "SGN",
        "ToPlace": "NYC",
        "DepartDate": "2014-08-19T00:00:00.000",
        "ReturnDate": "2014-08-22T00:00:00.000",
        "CurrencyType": "VND",
        "Adult": 1,
        "Child": 0,
        "Infant": 0,
        "Sources": "Abacus"
        }';*/

        //RoundTrip: VĂ© khá»© há»“i náº¿u round trip lĂ  true cáº§n nháº­p chĂ­nh xĂ¡c cáº£ returndate ngÆ°á»£c láº¡i thĂ¬ ko cáº§n
        //ToPlace: Äá»‹a Ä‘iá»ƒm xuáº¥t phĂ¡t cá»§a chuyáº¿n bay
        //FromPlace: Äá»‹a Ä‘iá»ƒm káº¿t thĂºc cá»§a chuyáº¿n bay
        //DepartDate vĂ  ReturnDate: ngĂ y Ä‘i vĂ  ngĂ y trá»Ÿ vá»(cáº§n format chĂ­nh xĂ¡c Ä‘á»‹nh dáº¡ng nhÆ° trĂªn)
        //CurrencyType: loáº¡i tiá»n tá»‡(Máº·c Ä‘á»‹nh lĂ  VNÄ)
        //Adult, Child, Infant: Sá»‘ lÆ°á»£ng ngÆ°á»i lá»›n, tráº» em vĂ  tráº» sÆ¡ sinh

        $username = "vemaybaytructuyen.com.vn"; $password = "vmbtructuyen@123";

        $ch = curl_init();

        $url = 'http://112.213.85.45/AirBook/oapi/airline/Flights/Find?$expand=TicketPriceDetails,Details,TicketOptions';
        // expand thĂªm 3 trÆ°á»ng TicketPriceDetails,Details,TicketOptions (cĂ³ thá»ƒ chá»‰ chá»n 1 hay nhiá»u )
        // TicketPriceDetails : Chi tiáº¿t giĂ¡ Net , thuáº¿ phĂ­ cá»§a ngÆ°á»i lá»›n, tráº» em ...
        // Details : Chi tiáº¿t cĂ¡c cháº·ng dá»«ng
        // TicketOptions : CĂ¡c háº¡ng má»¥c vĂ© khĂ¡c ( náº¿u cĂ³ ), vd VNAirline cĂ³ Economy Save, Economy Standard ...

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json' )
        );

        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);    		  //  curl authentication

        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");		//  curl authentication

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_post);

        $str=  curl_exec($ch);

        curl_close($ch);

        $data = json_decode($str);			// Dá»¯ liá»‡u tráº£ vá» lĂ  kiá»ƒu stdClass Object
        var_dump($data_post);
        var_dump($data->value);

    }
}