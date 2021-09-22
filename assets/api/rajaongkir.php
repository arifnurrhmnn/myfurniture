<?php
    $api_key = "4aecd64265f0426f99899087c0b058d3";
    
    function get_city($key){
        $data = [
            'status' => false,
            'result' => []
        ]; 
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: ".$key
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            $data['result'] = $err;
        } else {
            $result = json_decode($response, true);
            if ($result['rajaongkir']['status']['code'] == 200){
                $data['status'] = true;
                $data['result'] = $result['rajaongkir']['results'];
            } else {
                $data['result'] = $result['rajaongkir']['status']['description'];
            }
        }
        return $data;
    }

    function hitung_ongkir($kota_asal, $kota_tujuan, $kurir, $berat, $key){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$kota_asal."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ".$key
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            $data['result'] = $err;
        } else {
            $result = json_decode($response, true);
            if ($result['rajaongkir']['status']['code'] == 200){
                $data['status'] = true;
                $data['result'] = $result['rajaongkir']['results'][0];
            } else {
                $data['result'] = $result['rajaongkir']['status']['description'];
            }
        }
        return $data;
    }

    //ambil data kota
    $city = [];
    $check = get_city($api_key);
    if ($check['status']){
        $city = $check['result'];
?>        
        <!-- <form method="GET">
            Kota Asal Pengiriman<br/>
            <select name="kota_asal">
                <?php
                    foreach ($city as $item):
                        echo "<option value='".$item['city_id']."'>".$item['type']." ".$item['city_name']."</option>";
                    endforeach;
                ?>
            </select>
            <br/><br/>
            Kota Tujuan Pengiriman<br/>
            <select name="kota_tujuan">
                <?php
                    foreach ($city as $item):
                        echo "<option value='".$item['city_id']."'>".$item['type']." ".$item['city_name']."</option>";
                    endforeach;
                ?>
            </select>
            <br/><br/>
            Kurir<br/>
            <select name="kurir">
                <option value="jne">JNE</option>
                <option value="pos">POS Indonesia</option>
                <option value="tiki">TIKI</option>
            </select>
            <br/><br/>
            Berat<br/>
            <input type=text name="berat" value=500> gram
            <br/><br/>
            <button type="submit">CEK Ongkir</button>
        </form> -->
<?php      
        if (isset($_GET['kota_asal'])){
            $kota_asal = $_GET['kota_asal'];
            $kota_tujuan = $_GET['kota_tujuan'];
            $kurir = $_GET['kurir'];
            $berat = $_GET['berat'];
            $ongkir = hitung_ongkir($kota_asal,$kota_tujuan,$kurir,$berat,$api_key);
            echo "<pre>";
            print_r($ongkir['result']);
            echo "</pre>";
        }

    } else {
        echo $check['result'];
    }
?>