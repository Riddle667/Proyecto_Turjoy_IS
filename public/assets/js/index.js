const selectOrigin = document.getElementById("origins");
const selectDestination = document.getElementById("destinations");
const inputDate = document.getElementById("date");
const seatsLabel = document.getElementById("seats");
const seatsInput = document.getElementById("seatsInput");
const reservationButton = document.getElementById("reservationButton");
const formReservation = document.getElementById("formReservation");
const baseValue = document.getElementById("baseValue");
const routeId = document.getElementById("routeId");
const payMethod = document.getElementById("payMethod");
let availableSeats = 0;

const toggleFields = (enable) => {
    selectOrigin.disabled = !enable;
    selectDestination.disabled = !enable;
};

const adviseButton = () => {
    if (
        selectOrigin.value == "" ||
        selectDestination.value == "" ||
        inputDate.value == "" ||
        payMethod.value == ""
    ) {
        Swal.fire({
            title: "¡Error!",
            text: "Todos los campos son obligatorios",
            icon: "warning",
            confirmButtonColor: "#FF6B6B",
            confirmButtonText: "Ok",
        });
    } else if (
        seatsInput.value <= 0 ||
        seatsInput.value == "" ||
        seatsInput.value % 1 != 0 ||
        /^0[0-9]+$/.test(seatsInput.value)
    ) {
        Swal.fire({
            title: "¡Error!",
            text: "Debe seleccionar la cantidad de asientos antes de realizar la reserva",
            icon: "warning",
            confirmButtonColor: "#FF6B6B",
            confirmButtonText: "Ok",
        });
    } else if (seatsInput.value > availableSeats) {
        Swal.fire({
            title: "¡Error!",
            text: "No hay servicios disponibles para la ruta seleccionada",
            icon: "warning",
            confirmButtonColor: "#FF6B6B",
            confirmButtonText: "Ok",
        });
    } else {
        const options = { timeZone: "America/Santiago" };
        const date = new Date(inputDate.value.replace(/-/g, "/"));
        const dateFormatted = date.toLocaleDateString("es-ES", options);
        const formattedNumber = new Intl.NumberFormat("es-ES").format(
            seatsInput.value * baseValue.value
        );

        console.log(dateFormatted);
        console.log(payMethod.value);
        Swal.fire({
            title: "¿Estás seguro?",
            text:
                "El total de la reserva entre " +
                selectOrigin.value +
                " y " +
                selectDestination.value +
                " para el día " +
                dateFormatted +
                " es de $" +
                formattedNumber +
                " (" +
                seatsInput.value +
                " asientos) ¿Desea continuar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2ECC71",
            cancelButtonColor: "#FF6B6B",
            confirmButtonText: "Confirmar",
            cancelButtonText: "Volver",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    "¡Reserva exitosa!",
                    "Tus pasajes han sido reservados.",
                    "success"
                );

                setTimeout(() => {
                    formReservation.submit();
                }, 1000);
            }
        });
    }
};

const toggleSeats = (enable) => {
    seatsInput.disabled = !enable;
    if (seatsInput.enable) {
        seatsInput.removeAttribute("placeholder");
    } else {
        seatsInput.setAttribute("placeholder", "Seleccione una opción");
    }
};

const togglePayMethod = (enable) => {
    payMethod.disabled = !enable;
    if (payMethod.enable) {
        payMethod.removeAttribute("placeholder");
    } else {
        payMethod.setAttribute("placeholder", "Seleccione una opción");
    }
};

const verifyFields = () => {
    const date = inputDate.value;
    if (selectOrigin.value == "" || selectDestination.value == "") {
        toggleSeats(false);
        togglePayMethod(false);
    } else {
        toggleSeats(true);
        togglePayMethod(true);
    }

    if (date) {
        toggleFields(true);
    } else {
        toggleFields(false);
    }
};

const addOriginsToSelect = (origins) => {
    origins.forEach((origin) => {
        const option = document.createElement("option");
        option.value = origin;
        option.text = origin;
        selectOrigin.appendChild(option);
    });
};

const clearSelect = () => {
    while (selectDestination.firstChild) {
        selectDestination.removeChild(selectDestination.firstChild);
    }
};

const addDestinationsToSelect = (destinations) => {
    // Limpiar los registros del campo destinos
    clearSelect();
    // Crear la opción por defecto
    const option = document.createElement("option");
    option.value = "";
    option.text = "Seleccione una opción";
    option.selected = true;
    selectDestination.appendChild(option);
    destinations.forEach((destination) => {
        const option = document.createElement("option");
        option.value = destination;
        option.text = destination;
        selectDestination.appendChild(option);
    });
};

const verifySeats = (e) => {
    const destination = selectDestination.value;
    const origin = selectOrigin.value;
    const date = inputDate.value;
    if (selectDestination.value == "") {
        toggleSeats(false);
        togglePayMethod(false);
    } else {
        toggleSeats(true);
        togglePayMethod(true);
    }
    if (date == "" || origin == "" || destination == "") return;
    fetch(`/get/seats/${origin}/${destination}/${date}`)
        .then((response) => response.json())
        .then((data) => {
            // Manipula los datos recibidos aquí
            const seats = data.availableSeats;
            availableSeats = seats;
            seatsLabel.textContent = seats + " asientos disponibles";
            seatsInput.setAttribute("max", seats);
            baseValue.value = data.baseValue;
            routeId.value = data.routeId;
            window.resizeSelect2();
        })
        .catch((error) => {});
};

const loadDestinations = (e) => {
    const currentValue = selectOrigin.value;
    seatsLabel.textContent = "";
    if (currentValue) {
        fetch(`/get/destinations/${currentValue}`)
            .then((response) => response.json())
            .then((data) => {
                const destinations = data.destinations;
                addDestinationsToSelect(destinations);
            })
            .catch((error) => {});
    } else {
        clearSelect();
        const option = document.createElement("option");
        option.value = "";
        option.text = "Seleccione una opción";
        option.selected = true;
        selectDestination.appendChild(option);
    }
};

const loadOrigins = (e) => {
    fetch("/get/origins")
        .then((response) => response.json())
        .then((data) => {
            const origins = data.origins;
            addOriginsToSelect(origins);
        })
        .catch((error) => {});
};

formReservation.addEventListener("submit", (e) => {
    e.preventDefault();
    adviseButton();
});

const checkFieldsAndToggleReservationButton = () => {
    if (
        selectOrigin.value === "" ||
        selectDestination.value === "" ||
        inputDate.value === "" ||
        payMethod.value === "" ||
        seatsInput.value === ""
    ) {
        reservationButton.classList.add("opacity-25");
        reservationButton.classList.remove("opacity-100");
        reservationButton.classList.remove("hover:bg-blue-800");
    } else {
        reservationButton.classList.add("opacity-100");
        reservationButton.classList.remove("opacity-25");
        reservationButton.classList.add("hover:bg-blue-800");
    }
};

const handlePayMethodChange = () => {
    checkFieldsAndToggleReservationButton();
};

const observer = new MutationObserver(handlePayMethodChange);

observer.observe(payMethod, { attributes: true, attributeFilter: ["value"] });

document.addEventListener("DOMContentLoaded", loadOrigins);
document.addEventListener("DOMContentLoaded", verifyFields);
document.addEventListener(
    "DOMContentLoaded",
    checkFieldsAndToggleReservationButton
);
inputDate.addEventListener("change", verifySeats);
inputDate.addEventListener("change", verifyFields);
selectOrigin.addEventListener("change", loadDestinations);
selectDestination.addEventListener("change", verifySeats);
reservationButton.addEventListener("click", adviseButton);
selectOrigin.addEventListener("change", checkFieldsAndToggleReservationButton);
selectDestination.addEventListener(
    "change",
    checkFieldsAndToggleReservationButton
);
inputDate.addEventListener("change", checkFieldsAndToggleReservationButton);
seatsInput.addEventListener("change", checkFieldsAndToggleReservationButton);
payMethod.addEventListener("change", checkFieldsAndToggleReservationButton);
