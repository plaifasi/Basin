
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('#delete-alarm');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var alarmId = this.getAttribute('data-alarm-id');
                deleteAlarm(alarmId);
            });
        });

        function deleteAlarm(alarmId) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Alarm deleted successfully
                        alert(xhr.responseText);
                        // Reload the page or update the alarm list
                    } else {
                        // Error deleting alarm
                        alert('Error: ' + xhr.responseText);
                    }
                }
            };
            xhr.open('POST', 'delete_alarm.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('id_alarm=' + alarmId);
        }
    });

