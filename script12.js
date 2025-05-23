 // Get references to all nav links
 const homeLink = document.getElementById("home-link");
 const reportLostLink = document.getElementById("report-lost-link");
 const reportFoundLink = document.getElementById("report-found-link");
 const searchLink = document.getElementById("search-link");

 // Get references to all sections
 const homeSection = document.getElementById("home-section");
 const reportLostSection = document.getElementById("report-lost-section");
 const reportFoundSection = document.getElementById("report-found-section");
 const searchSection = document.getElementById("search-section");

 // Helper function to hide all sections
 function hideAllSections() {
     homeSection.classList.add("hidden");
     reportLostSection.classList.add("hidden");
     reportFoundSection.classList.add("hidden");
     searchSection.classList.add("hidden");
 }

 // Navigation click event listeners
 homeLink.addEventListener("click", () => {
     hideAllSections();
     homeSection.classList.remove("hidden");
 });

 reportLostLink.addEventListener("click", () => {
     hideAllSections();
     reportLostSection.classList.remove("hidden");
 });

 reportFoundLink.addEventListener("click", () => {
     hideAllSections();
     reportFoundSection.classList.remove("hidden");
 });

 searchLink.addEventListener("click", () => {
     hideAllSections();
     searchSection.classList.remove("hidden");
 });

 // Optional: make sure page loads with only the home section visible
 window.addEventListener("DOMContentLoaded", () => {
     hideAllSections();
     homeSection.classList.remove("hidden");
 });