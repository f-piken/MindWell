// Function to display appointment data in table
function displayAppointmentData() {
    // Get table body element
    var tbody = document.querySelector('tbody');

    // Clear existing table rows
    tbody.innerHTML = '';

    // Get saved registrations from local storage
    var savedRegistrations = JSON.parse(localStorage.getItem('registrations')) || [];

    // Iterate through each registration data
    savedRegistrations.forEach(function(registrationData) {
        // Create new table row
        var newRow = document.createElement('tr');

        // Create table data for each field
        var idCell = document.createElement('td');
        idCell.textContent = registrationData.id;

        var tanggalCell = document.createElement('td');
        tanggalCell.textContent = registrationData.tanggal;

        var dokterCell = document.createElement('td');
        dokterCell.textContent = registrationData.dokter;

        var namaCell = document.createElement('td');
        namaCell.textContent = registrationData.nama;

        var umurCell = document.createElement('td');
        umurCell.textContent = registrationData.umur;

        var noTlpCell = document.createElement('td');
        noTlpCell.textContent = registrationData.noTlp;

        var tanggalJanjiCell = document.createElement('td');
        tanggalJanjiCell.textContent = registrationData.tanggalJanji;

        var statusCell = document.createElement('td');
        statusCell.textContent = registrationData.status;

        // Append table data to table row
        newRow.appendChild(idCell);
        newRow.appendChild(tanggalCell);
        newRow.appendChild(dokterCell);
        newRow.appendChild(namaCell);
        newRow.appendChild(umurCell);
        newRow.appendChild(noTlpCell);
        newRow.appendChild(tanggalJanjiCell);
        newRow.appendChild(statusCell);

        // Append table row to table body
        tbody.appendChild(newRow);
    });
}

// Call the function to display appointment data when the page loads
window.onload = function() {
    displayAppointmentData();
};
