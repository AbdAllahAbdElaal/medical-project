document.addEventListener("DOMContentLoaded", function () {
  const donateBtn = document.querySelector(".donateBtn");
  const statusBox = document.getElementById("formStatus");
  const sections = document.querySelectorAll("section");

  if (donateBtn) {
    donateBtn.addEventListener("click", function () {
      alert("Thank you for your support! Donation system can be added here.");
    });
  }

  if (statusBox) {
    const params = new URLSearchParams(window.location.search);
    const status = params.get("status");

    if (status === "empty") {
      statusBox.className = "alert alert-warning";
      statusBox.textContent = "Please fill in all required fields.";
      statusBox.classList.remove("d-none");
    } else if (status === "invalid-email") {
      statusBox.className = "alert alert-warning";
      statusBox.textContent = "Please enter a valid email address.";
      statusBox.classList.remove("d-none");
    } else if (status === "error") {
      statusBox.className = "alert alert-danger";
      statusBox.textContent = "Sorry, message sending failed. Please try again.";
      statusBox.classList.remove("d-none");
    }
  }

  sections.forEach(function (section) {
    section.classList.add("reveal");
  });

  const revealObserver = new IntersectionObserver(
    function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12 }
  );

  sections.forEach(function (section) {
    revealObserver.observe(section);
  });
});
