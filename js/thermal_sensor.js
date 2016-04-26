// Create a client instance
client_id = "WebThermalSensor" + parseInt(Math.random() * 100, 10);
client = new Paho.MQTT.Client("m11.cloudmqtt.com", 35347, client_id);

// set callback handlers
client.onConnectionLost = onConnectionLost;
client.onMessageArrived = onMessageArrived;
var options = {
    useSSL: true,
    userName: "thermal_sensor",
    password: "thermalsensor",
    onSuccess:onConnect,
    onFailure:doFail
}

// connect the client
client.connect(options);

// called when the client connects
function onConnect() {
    // Once a connection has been made, make a subscription and send a message.
    console.log("onConnect " + client_id);
    client.subscribe("smartaquarium/sensor/temperature/level");
}

function doFail(e){
    console.log(e);
}

// called when the client loses its connection
function onConnectionLost(responseObject) {
    if (responseObject.errorCode !== 0) {
        console.log("onConnectionLost " + client_id + ": "+responseObject.errorMessage);
    }
}

// called when a message arrives
function onMessageArrived(message) {
    console.log("Message arrived on " + client_id + ": " + message.payloadString)
    document.getElementById('temperature').innerHTML = message.payloadString + " ºC";
}
