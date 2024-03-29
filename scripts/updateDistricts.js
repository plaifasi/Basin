function updateDistricts() {
    var provinceSelect = document.getElementById('province');
    var districtSelect = document.getElementById('district');

    // Clear existing options
    districtSelect.innerHTML = '';

    // Get selected province
    var selectedProvince = provinceSelect.value;

    // Add districts based on the selected province
    if (selectedProvince === 'กรุงเทพ') {
        addDistrictOption('ตลิ่งชัน');
        addDistrictOption('บางเขน');
        addDistrictOption('เขตพระนคร');
        // Add more districts as needed
    } else if (selectedProvince === 'จันทบุรี') {
        addDistrictOption('เมืองจันทบุรี');
        addDistrictOption('ท่าหลวง');
        // Add more districts as needed
    } else if (selectedProvince === 'ระยอง') {
        addDistrictOption('เมืองระยอง');
        addDistrictOption('บ้านตะพงนอก');
        // Add more districts as needed
    } else if (selectedProvince === 'ชุมพร') {
        addDistrictOption('เมืองชุมพร');
        addDistrictOption('ท่าแซะ');
        // Add more districts as needed
    }

    function addDistrictOption(districtName) {
        var option = document.createElement('option');
        option.value = districtName;
        option.text = districtName;
        districtSelect.add(option);
    }
}

var filterButton = document.querySelector('.filter');
   // Add click event listener to the filter button
    filterButton.addEventListener('click', function () {
     var filterPopup = document.getElementById('filterPopup');

        // Toggle the visibility of the popup box
        filterPopup.style.display = (filterPopup.style.display === 'none' || filterPopup.style.display === '') ? 'block' : 'none';
    });
