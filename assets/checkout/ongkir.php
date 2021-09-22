<?php
    include "../../koneksi.php";
    $api_key = "4aecd64265f0426f99899087c0b058d3";
    
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
?>        

<?php      
        if (isset($_GET['city_destination'])){
            /* $query="SELECT * FROM kota WHERE kota_id='$kota'";
            $result = mysqli_query($db,$query);
            $data = mysqli_fetch_assoc($result); */

            $kota_tujuan = $_GET['city_destination'];
            $kota_asal='419';
            $kurir = 'pos';
            $berat = 25000;

            $ongkir = hitung_ongkir($kota_asal,$kota_tujuan,$kurir,$berat,$api_key);
            $hasil= $ongkir['result']['costs'][1]['cost'][0]['value'];
            echo $hasil;
        } else {
        echo $check['result'];
    }
?>