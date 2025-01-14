// Gunakan variabel generalCleaningUrl dari Laravel
document.querySelector('.card.clickable').addEventListener('click', function () {
    if (typeof generalCleaningUrl !== 'undefined') {
      window.location.href = generalCleaningUrl; // Redirect
    } else {
      console.error("URL not defined.");
    }
  });
  