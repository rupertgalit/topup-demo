// JavaScript code
document.addEventListener("DOMContentLoaded", function() {
  const paymentOptions = document.querySelectorAll(".payment-option");
  const paymentMethodInput = document.getElementById("payment-method");
  const submitButton = document.querySelector(".submit-button");

  paymentOptions.forEach(function(option) {
    option.addEventListener("click", function() {
      const selectedOption = document.querySelector(".payment-option.selected");

      // Remove the "selected" class from the previously selected option
      if (selectedOption) {
        selectedOption.classList.remove("selected");
      }

      // Add the "selected" class to the clicked option
      this.classList.add("selected");

      // Set the value of the hidden input field to the selected payment method
      paymentMethodInput.value = this.dataset.value;

      // Show or hide the submit button based on the selected payment method
      if (this.dataset.value === "credit-card") {
        submitButton.style.display = "block";
      } else {
        submitButton.style.display = "none";
      }
    });
  });
});
