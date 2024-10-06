
        document.addEventListener('DOMContentLoaded', () => {
            // Select the form and table body elements
            const form = document.querySelector('form');
            const tableBody = document.getElementById('reservation-table-body');
            let reservations = [];

            // Function to add a new reservation
            function addReservation(name, date, time, guests, table) {
                const formData = new FormData();
                formData.append('name', name);
                formData.append('date', date);
                formData.append('time', time);
                formData.append('guests', guests);
                formData.append('table', table);

                fetch('save_reservation.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(() => {
                    const reservation = { name, date, time, guests, table };
                    reservations.push(reservation);
                    updateTable();
                })
                .catch(error => console.error('Error:', error));
            }

            // Function to update the reservation table
            function updateTable() {
                tableBody.innerHTML = '';
                reservations.forEach((reservation, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${reservation.name}</td>
                        <td>${reservation.date}</td>
                        <td>${reservation.time}</td>
                        <td>${reservation.guests}</td>
                        <td>${reservation.table}</td>
                        <td>
                            <button onclick="editReservation(${index})">Edit</button>
                                                       <button onclick="deleteReservation(${index})">Delete</button>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            }

            // Event listener for form submission
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                // Added comment: Removed name field from form submission
                const date = document.getElementById('reservation-date').value; // Fixed: Corrected the ID to match the form
                const time = document.getElementById('reservation-time').value; // Fixed: Corrected the ID to match the form
                const guests = document.getElementById('reservation-guests').value; // Fixed: Corrected the ID to match the form
                const table = document.getElementById('reservation-table').value; // Fixed: Corrected the ID to match the form
                addReservation('', date, time, guests, table); // Added comment: Passing empty string for name
                form.reset();
            });

            // Initial table update
            updateTable();
        });
  
        const boxes = document.querySelectorAll('.box');
        window.addEventListener('scroll', checkBoxes);
        checkBoxes();
        function checkBoxes() {
            const triggerBottom = window.innerHeight / 5 * 4;
            boxes.forEach((box, idx) => {
                const boxTop = box.getBoundingClientRect().top;
                if (boxTop < triggerBottom) {
                    box.classList.add('show');
                } else {
                    box.classList.remove('show');
                }
            });
        }
   