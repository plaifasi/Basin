document.addEventListener('DOMContentLoaded', function() {
  const progressSteps = document.querySelectorAll('.progress-step');

  progressSteps.forEach((progressStep, index) => {
      progressStep.addEventListener('click', function() {
          // Remove 'active' class from all steps
          progressSteps.forEach(step => {
              step.classList.remove('active');
          });

          // Add 'active' class to the clicked step and all preceding steps
          for (let i = 0; i <= index; i++) {
              progressSteps[i].classList.add('active');
          }

          const progressId = progressStep.getAttribute('data-progress-id');
          updateProgress(progressId);
      });
  });



  function updateProgress(progressId) {
      // Send an AJAX request to update the progress in the database
      // Use progressId to send the id_progress value to the server
      // Example AJAX request using fetch API:
      fetch('update_progress.php', {
          method: 'POST',
          body: JSON.stringify({ id_progress: progressId }),
          headers: {
              'Content-Type': 'application/json'
          }
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.json();
      })
      .then(data => {
          console.log('Progress updated successfully:', data);
      })
      .catch(error => {
          console.error('Error updating progress:', error);
      });
  }
});









