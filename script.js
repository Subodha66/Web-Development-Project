function validateForm() {
    // Get the value of the name input field
    const firstName = document.getElementById("name").value.trim();

    // Validate Name (allows spaces between words)
    const namePattern = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
    if (!namePattern.test(firstName)) {
        alert("Invalid input for the Name. Please use letters and spaces only.");
        return false;
    }

    // If validation passes
    alert("Form submitted successfully!");
    return true;
}

