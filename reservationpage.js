document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const members = document.getElementById('members').value;
    const date = document.getElementById('date').value;

    if (members && date) {
        alert(`Reservation made for ${members} members on ${date}.`);
    } else {
        alert('Please fill out all fields.');
    }
});
