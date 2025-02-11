document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        message: document.getElementById('message').value
    };
    
    fetch('https://script.google.com/macros/s/AKfycbygaRNAuEy1dSpdhTem2WW5uUJP9EY646Lr-jP5Hd6fJtHqWN-B6yE3nES5GwX9Po7x/exec', {
        method: 'POST',
        body: JSON.stringify(formData),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        document.getElementById('myForm').reset();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});