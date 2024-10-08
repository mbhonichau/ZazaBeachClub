// Function to handle form submission
function submitReservation(event) {
    event.preventDefault();

    // Get form values
    const date = document.getElementById('date').value;
    const guests = document.getElementById('guests').value;
    const table = document.getElementById('table').value;

    // Create a new table row
    const tableRow = document.createElement('tr');

    //Create table cells for each form value
    const idCell = document.createElement('td');
    const dateCell = document.createElement('td');
    const guestsCell = document.createElement('td');
    const tableCell = document.createElement('td');

    //Generate a unique ID for the reservation
    const reservationID = Date.now();

    // Set the content of each cell
    idCell.textContent = reservationID;
    dateCell.textContent = date;
    guestsCell.textContent = guests;
    tableCell.textContent = table;

    // Append cells to the table row
    tableRow.appendChild(idCell);
    tableRow.appendChild(dateCell);
    tableRow.appendChild(guestsCell);
    tableRow.appendChild(tableCell);
    
    // Append the table row to the reservation list
    document.querySelector('#reservation-list tbody').appendChild(tableRow);

    // Clear the form fields
    document.querySelector('reservation-form').reset();

}
// Add event listner to the form
document.getElementById('reservation-form').addEventListener('submit', submitReservation)