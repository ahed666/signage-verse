




var deviceCode;
var ConnectStatus;

document.addEventListener("DOMContentLoaded", function() {
    ConnectStatus=handleConnectionChange();



CheckDeviceCode();
if(deviceCode){


    // window.Echo.channel('refresh-playlist.' + deviceCode)
    // .listen('PlaylistUpdated', (e) => {
    //     console.log(e);
    //     console.log('Playlist updated for device:', e.deviceCode);
    //     // Trigger a refresh or update in your frontend
    // });

    var channel = pusher.subscribe('refresh-playlist-' + deviceCode);
    channel.bind('App\\Events\\PlaylistUpdated', function() {
        console.log();
        console.log('Playlist updated for device:', deviceCode);
        // Trigger a refresh or update in your frontend
    });

}



});




function CheckDeviceCode(){
     deviceCode = getCookie("device_code");
      console.log(deviceCode);
    if (deviceCode) {
        // Device code exists, load data using the code
        loadData(deviceCode);
    } else {
        // Device code doesn't exist, make a request to the server to generate a new code
        generateNewCode();
    }
}

function handleConnectionChange(event) {


}
function handleConnectionOffline(event) {

    var status = navigator.onLine ;

    status==true?  CheckDeviceCode() : console.log("Connection status changed to " + status) ;



    return status;
}

// Check connection status on page load
window.addEventListener('load', handleConnectionChange);

// Listen for online and offline events
window.addEventListener("online",  handleConnectionChange);
window.addEventListener("offline", handleConnectionChange);






function loadData(deviceCode) {
    // Code to load data using the device code
    document.getElementById('result').innerText = `${deviceCode}`;

    console.log("Loading data for device code:", deviceCode);
}

function generateNewCode() {
    // Code to make a request to the server to generate a new code
    console.log("Requesting new device code from server...");
    fetch('/generate-code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.Laravel.csrfToken
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('result').innerText = `PIN: ${data.pin}, Code: ${data.code}`;
        setCookie('device_code', data.code, 365);  // Expires in 1 year
        setCookie('device_pin', data.pin, 365);    // Expires in 1 year

    })
    .catch(error => console.error('Error:', error));
}
