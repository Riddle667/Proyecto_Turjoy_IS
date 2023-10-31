const selectOrigin = document.getElementById('origins');
const selectDestination = document.getElementById('destinations');

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
    option.text = "Seleccione un destino";
    option.selected = true;
    selectDestination.appendChild(option);
    destinations.forEach(destination => {
        const option = document.createElement('option');
        option.value = destination;
        option.text = destination;
        selectDestination.appendChild(option);
    });
}

const loadDestinations = (e) => {
    const currentValue = selectOrigin.value;
    if (currentValue) {
        fetch(`/get/destinations/${currentValue}`)
            .then(response => response.json())
            .then(data => {
                console.log("Inside the function")
                console.log(data);
                // Manipula los datos recibidos aquí
                const destinations = data.destinations;
                console.log(destinations);
                addDestinationsToSelect(destinations);
            })
            .catch(error => {

            })
    }
}

const loadOrigins = (e) => {
    fetch('/get/origins')
        .then(response => response.json())
        .then(data => {
            console.log("Inside the function")
            console.log(data);
            // Manipula los datos recibidos aquí
            const origins = data.origins;
            console.log(origins);
            addOriginsToSelect(origins);
        })
        .catch(error => {

        })
};

document.addEventListener('DOMContentLoaded', loadOrigins);
selectOrigin.addEventListener('change', loadDestinations);
