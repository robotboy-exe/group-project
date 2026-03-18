function updateStaticDate() {
        const now = new Date();
        const dateEl = document.getElementById("date");
        const yearEl = document.getElementById("year");
        const copyYearEl = document.getElementById("copyYear");
        if (dateEl) dateEl.textContent = "Date: " + now.toLocaleDateString();
        if (yearEl) yearEl.textContent = "Year: " + now.getFullYear();
        if (copyYearEl) copyYearEl.textContent = now.getFullYear();
      }

      function updateTime() {
        const timeEl = document.getElementById("time");
        if (timeEl)
          timeEl.textContent = "Time: " + new Date().toLocaleTimeString();
      }

      // Run date/time after DOM is ready as well
      document.addEventListener("DOMContentLoaded", function() {
        updateStaticDate();
        updateTime();
        setInterval(updateTime, 1000);
      });