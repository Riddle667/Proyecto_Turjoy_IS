const selectOrigin = document.getElementById('origins');
const selectDestination = document.getElementById('destinations');
const inputDate = document.getElementById('date');
let availableSeats = 0;

const addOriginsToSelect = (origins) => {
    origins.forEach(origin => {
        const option = document.createElement('option');
        option.value = origin;
        option.text = origin;
        selectOrigin.appendChild(option);
    });
}

const clearSelect = () => {
    while (selectDestination.firstChild) {
        selectDestination.removeChild(selectDestination.firstChild);
    }
}

const addDestinationsToSelect = (destinations) => {
    // Limpiar los registros del campo destinos
    clearSelect();
    // Crear la opción por defecto
    const option = document.createElement('option');
    option.value = "";
    option.text = "Seleccione una opción";
    option.selected = true;
    selectDestination.appendChild(option);
    destinations.forEach(destination => {
        const option = document.createElement('option');
        option.value = destination;
        option.text = destination;
        selectDestination.appendChild(option);
    });
}

const verifySeats = (e) => {
    const destination = selectDestination.value;
    const origin = selectOrigin.value;
    const date = inputDate.value;
    if (date == "" || origin == "" || destination == "") return;
    fetch(`/get/seats/${origin}/${destination}/${date}`)
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            const seats = data.availableSeats;
            availableSeats = seats;
        })
        .catch(error => {
        })
}

const loadDestinations = (e) => {
    const currentValue = selectOrigin.value;
    if (currentValue) {
        fetch(`/get/destinations/${currentValue}`)
            .then(response => response.json())
            .then(data => {
                // Manipula los datos recibidos aquí
                const destinations = data.destinations;
                addDestinationsToSelect(destinations);
            })
            .catch(error => {

            })
    }
    else {
        clearSelect();
        const option = document.createElement('option');
        option.value = "";
        option.text = "Seleccione una opción";
        option.selected = true;
        selectDestination.appendChild(option);
    }
}

const loadOrigins = (e) => {
    fetch('/get/origins')
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            const origins = data.origins;
            addOriginsToSelect(origins);
        })
        .catch(error => {

        })
};

document.addEventListener('DOMContentLoaded', loadOrigins);
selectOrigin.addEventListener('change', loadDestinations);
selectDestination.addEventListener('change', verifySeats);
inputDate.addEventListener('change', verifySeats);
