<?php

// Function to make API request
function makeApiRequest($province) {
    // Construct the URL for the API request using the province name
    $url = "https://data.tmd.go.th/nwpapi/v1/forecast/location/daily/at?province={$province}&fields=tc_max,rh&date=2024-03-13&duration=2";

    // Initialize curl
    $curl = curl_init();

    // Set curl options
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjVmMzc1ODdmOWI4Nzk3ZDU0NTY4ODdmOGI3OGVhZDZiZGY3OGE4ZDVjYTY5MTZiM2FlNmE5YzQ0YzY4YmZiYzAxZDUyYmM1MGJlMmU1Yzc0In0.eyJhdWQiOiIyIiwianRpIjoiNWYzNzU4N2Y5Yjg3OTdkNTQ1Njg4N2Y4Yjc4ZWFkNmJkZjc4YThkNWNhNjkxNmIzYWU2YTljNDRjNjhiZmJjMDFkNTJiYzUwYmUyZTVjNzQiLCJpYXQiOjE3MTAyMTIyOTQsIm5iZiI6MTcxMDIxMjI5NCwiZXhwIjoxNzQxNzQ4Mjk0LCJzdWIiOiIzMDcwIiwic2NvcGVzIjpbXX0.guEQvdW3N3k3J4kIchtp25Jg3dmOsAzX2S04xySpP4JpWM8PtxbmiPFSdMib-pm2uyWAdwZM18zzjyXISKXKiPnY-CTbTkjEH6Z3se62YYpU9HaBNZmV6uxPOnak5fHGu4vRyakKYrZIsPv6HiYbejKiaV-xUOIpEQyVIZrxSo00AVOkyxyL8TUhDAIMk67N1fZljes8Klt1DhoC8-vlzIwY9oboVI2vbGDAKHVMfT-n-6u3yAEmXF1phTIjEatt_GQUZZHDONOKnplP3jxXqaWZAkaKdA6n3z4nk9ds4LMD0KOKdEbXaiJQow9GiZc5oJP2TDnukKVM2SynCno6V81FL7PFi1tOArvEBwFRucxgXtjXDYVwFiVlsKVa8FVchkXwp3LpmkdKY9a5CrJ7zEuwVNxdqFKEqxUjS-WzmDTYkaHCzRZNsi9PrqAu6m7Hw8Dqmk9rWk4DmXQ8Qz_NkHUKnjCN503dmusJMS5NOnI2AHFYLXVsmv01ZsPu0M3p1Pp6wgKXaCV5gGblGlwy__ooNRp8KrNP0tt_xWVPGo5xIg2pz50DNwdz6dAFykVdB4NHP2Tzw3LA7meZNbLa8N_dvrZzveqyIvYXsyqrJl4WQtkHz0uFVygY1qX6n0EV5C0RoexD8MmSpDsyFmeSOVmmZbmNcTHd1DxsPOfAIA",
        ),
    ));

    // Execute curl request
    $response = curl_exec($curl);

    // Close curl
    curl_close($curl);

    // Decode JSON response
    $data = json_decode($response, true);

    // Return response
    return $data;
}

// List of provinces
$provinces = array(
    "กรุงเทพมหานคร",
    "กระบี่",
    "กาญจนบุรี",
    "กาฬสินธุ์",
    "กำแพงเพชร",
    "ขอนแก่น",
    "จันทบุรี",
    "ฉะเชิงเทรา",
    "ชลบุรี",
    "ชัยนาท",
    "ชัยภูมิ",
    "ชุมพร",
    "เชียงราย",
    "เชียงใหม่",
    "ตรัง",
    "ตราด",
    "ตาก",
    "นครนายก",
    "นครปฐม",
    "นครพนม",
    "นครราชสีมา",
    "นครศรีธรรมราช",
    "นครสวรรค์",
    "นนทบุรี",
    "นราธิวาส",
    "น่าน",
    "บึงกาฬ",
    "บุรีรัมย์",
    "ปทุมธานี",
    "ประจวบคีรีขันธ์",
    "ปราจีนบุรี",
    "ปัตตานี",
    "พระนครศรีอยุธยา",
    "พะเยา",
    "พังงา",
    "พัทลุง",
    "พิจิตร",
    "พิษณุโลก",
    "เพชรบุรี",
    "เพชรบูรณ์",
    "แพร่",
    "ภูเก็ต",
    "มหาสารคาม",
    "มุกดาหาร",
    "แม่ฮ่องสอน",
    "ยโสธร",
    "ยะลา",
    "ร้อยเอ็ด",
    "ระนอง",
    "ระยอง",
    "ราชบุรี",
    "ลพบุรี",
    "ลำปาง",
    "ลำพูน",
    "เลย",
    "ศรีสะเกษ",
    "สกลนคร",
    "สงขลา",
    "สตูล",
    "สมุทรปราการ",
    "สมุทรสงคราม",
    "สมุทรสาคร",
    "สระแก้ว",
    "สระบุรี",
    "สิงห์บุรี",
    "สุโขทัย",
    "สุพรรณบุรี",
    "สุราษฎร์ธานี",
    "สุรินทร์",
    "หนองคาย",
    "หนองบัวลำภู",
    "อ่างทอง",
    "อำนาจเจริญ",
    "อุดรธานี",
    "อุตรดิตถ์",
    "อุทัยธานี",
    "อุบลราชธานี"
);

// Loop through each province
foreach ($provinces as $province) {
    // Make API request for each province
    $response = makeApiRequest($province);

    // Check if the response is valid
    if (is_array($response)) {
        // Output the response
        echo "Province: $province - Data Found<br>";
    } else {
        // Output if no data found for the province
        echo "Province: $province - No Data Found<br>";
    }
}
?>
