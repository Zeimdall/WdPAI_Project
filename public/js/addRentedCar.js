
function rentCar(car_id) {
    fetch("/rentCar", {
        method: "POST",
        credentials: 'same-origin',
        headers: {
            'content-type': 'application/json'
        },
        body: JSON.stringify({
            car_id: car_id
    })
}).then((response) => {
    alert("Congrats! You've rented this car. For more information please contact us.");
    })
}
